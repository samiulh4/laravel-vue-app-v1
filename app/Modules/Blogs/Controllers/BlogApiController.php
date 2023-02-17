<?php

namespace App\Modules\Blogs\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use App\Modules\Users\Models\User;
use App\Modules\Blogs\Models\Article;
use App\Modules\Blogs\Models\Tag;


class BlogApiController extends Controller
{

    public function index(Request $request, $page)
    {
        try{
            $limit = 5;
            $offset = $page == 0 ? 0 : $page*$limit;
            $articles = Article::leftJoin('users', 'blogs_articles.created_by', '=', 'users.id')
                ->select('blogs_articles.*', 'users.name as author_name')
                ->orderBy('blogs_articles.id', 'desc')
                ->offset($offset)
                ->limit($limit)
                ->get()
                ->toArray();
            return response()->json([
                "success" => true,
                "status" => 200,
                "articles" => $articles,
                "message" => 'Articles get successfully.',
            ]);
        }catch (\Exception $e){
            return response()->json([
                "success" => false,
                "status" => 401,
                "message" => $e->getMessage()
            ]);
        }

    }// end -:- index()
    public function store(Request $request)
    {
        try{
            $article = Article::firstOrNew(['id' => $request->id]);
            $article->title = $request->title;
            $article->context = $request->context;
            $article->tag_ids = $request->tag_ids;
            if(!empty($request->id)){
                $article->updated_by = Auth::user()->id;
                $article->updated_at = date('Y-m-d H:i:s');
            }else{
                $article->created_by = Auth::user()->id;
                $article->created_at = date('Y-m-d H:i:s');
            }
            if(!empty($request->file('photo'))){
                $image = $request->file('photo');
                $image_name = 'ARTICLE_'.date('Ymd').time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/images/articles';
                $image_db_url =  $image_path.'/'.$image_name;
                $image->move(public_path($image_path),  $image_name);
                $photo_path =  $image_db_url;
                $article->photo = $photo_path;
            }
            if(empty($article->photo)){
                # if file object not found.
                $article->photo =  '/assets/common/img/default/default-blog-img.png';
            }else{
                # if file path found not not exist.
                if (!file_exists(public_path($article->photo))) {
                    $article->photo =  '/assets/common/img/default/default-blog-img.png';
                }
            }
            $article->save();
            $newArticle = Article::leftJoin('users', 'blogs_articles.created_by', '=', 'users.id')
                ->select('blogs_articles.*', 'users.name as author_name')
                ->where('blogs_articles.id', $article->id)
                ->first()
                ->toArray();
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => ' Created Successfully ['.$article->title.']',
                'article' => $newArticle,
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'status' => 401,
                'message' => $e->getMessage(),
            ]);
        }
    }// end -:- store()
    public function details(Request $request, $id)
    {
        try{
            $article = Article::leftJoin('users', 'blogs_articles.created_by', '=', 'users.id')
                ->select('blogs_articles.*', 'users.name as author_name')
                ->where('blogs_articles.id', $id)
                ->first();
                //->toArray();
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => ' Fetched Successfully ['.$article->title.']',
                'article' => $article,
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'status' => 401,
                'message' => $e->getMessage(),
            ]);
        }
    }// end -:- details()
    public function getTags(Request $request)
    {
        try{
            $tags = Tag::orderBy('name', 'asc')->get(['id', 'name']);
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'All tags get successfully.',
                'tags' => $tags,
            ]);
        }catch (\Exception $e){
            return response()->json([
                'success' => false,
                'status' => 401,
                'message' => $e->getMessage(),
            ]);
        }
    }// end -:- getTags()
    public function edit(Request $request, $id)
    {
        try{
            $article = Article::leftJoin('users', 'blogs_articles.created_by', '=', 'users.id')
                ->select('blogs_articles.*', 'users.name as author_name')
                ->where('blogs_articles.id', $id)
                ->first();
            //->toArray();
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => ' Fetched Successfully ['.$article->title.']',
                'article' => $article,
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'status' => 401,
                'message' => $e->getMessage(),
            ]);
        }
    }// end -:- edit()
}// end -:- BlogApiController
