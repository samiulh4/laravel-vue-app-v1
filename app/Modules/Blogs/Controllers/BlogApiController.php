<?php

namespace App\Modules\Blogs\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Blogs\Models\Article;

class BlogApiController extends Controller
{

    public function index(Request $request)
    {
        $limit = 10;
        try{
            $articles = Article::leftJoin('users', 'blogs_articles.created_by', '=', 'users.id')
                ->select('blogs_articles.*', 'users.name as author_name')
                ->orderBy('blogs_articles.id', 'desc');
            $data = $articles->paginate($limit);
            //$data = $articles->get();
            $data->getCollection()->transform(function ($row, $key) {
                $photo = asset($row->photo);
//                if (!\Storage::disk('public')->exists($photo)) {
//                    $photo = asset('assets/common/img/default/default-blog-img.png');
//                }else{
//                    $photo = asset($row->photo);
//                }
                return [
                    'sn' => $key + 1,
                    'id' => $row->id,
                    'title' => $row->title,
                    'context' => \Illuminate\Support\Str::limit($row->context, 150, $end='...'),
                    'photo' =>  $photo,
                    'created_at' => date('Y M d, h:i:s A', strtotime($row->created_at)),
                    'author_name' => $row->author_name,
                ];
            });
            return response()->json([
                "success" => true,
                "status" => 200,
                "articles" => $data,
                "message" => 'All articles get successfully.',
            ]);
        }catch (\Exception $e){
            return response()->json([
                "success" => false,
                "status" => 401,
                "message" => $e->getMessage()
            ]);
        }

    }// end -:- index()
}// end -:- BlogApiController
