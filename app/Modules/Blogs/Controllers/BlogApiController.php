<?php

namespace App\Modules\Blogs\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use App\Modules\Users\Models\User;
use App\Modules\Blogs\Models\Article;


class BlogApiController extends Controller
{

    public function index(Request $request)
    {
        $limit = 10;
        try{
            $articles = Article::leftJoin('users', 'blogs_articles.created_by', '=', 'users.id')
                ->select('blogs_articles.*', 'users.name as author_name')
                ->orderBy('blogs_articles.id', 'desc')
                ->offset(0)
                ->limit(2)
                ->get();
            $data = [];
            foreach ($articles as $key => $article){
                $photo = asset($article->photo);
                array_push($data, [
                    'id' => $article->id,
                    'title' => $article->title,
                    'context' => \Illuminate\Support\Str::limit($article->context, 150, $end='...'),
                    'photo' =>  $photo,
                    'created_at' => date('Y M D, h:i:s A', strtotime($article->created_at)),
                    'author_name' => $article->author_name,
                ]); //end -:- array push
            }
            return response()->json([
                "success" => true,
                "status" => 200,
                "articles" => $data,
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
            $user = Auth::user();
            if($request->file('photo')){
                $image = $request->file('photo');
                $image_name = 'ARTICLE_'.date('Ymd').time().'.'.$image->getClientOriginalExtension();
                $image_path = 'uploads/images/articles';
                $image_db_url =  $image_path.'/'.$image_name;
                $image->move(public_path($image_path),  $image_name);
                $photo_path =  $image_db_url;
            }else{
                $photo_path =  '/assets/common/img/default/default-blog-img.png';
            }
            $article = Article::create([
                'title' => $request->title,
                'context' => $request->context,
                'created_by' => Auth::user()->id,
                'photo' => $photo_path,
            ]);
            $article->save();
            $newArticle = Article::leftJoin('users', 'blogs_articles.created_by', '=', 'users.id')
                ->select('blogs_articles.*', 'users.name as author_name')
                ->where('blogs_articles.id', $article->id)
                ->first();
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
}// end -:- BlogApiController
