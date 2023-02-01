<?php

namespace App\Modules\Blogs\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Blogs\Models\Article;

class ArticleController extends Controller
{

    public function ajaxStore(Request $request)
    {
       try{
        $article = new Article();
        $article->title = $request->title;
        $article->context = $request->context;
        if($request->file('photo')){
            $image = $request->file('photo');
            $image_name = 'ARTICLE_'.date('Ymd').time().'.'.$image->getClientOriginalExtension();
            $image_path = 'uploads/images/articles';
            $image_db_url =  $image_path.'/'.$image_name;
            $image->move(public_path($image_path),  $image_name);
            $article->photo =  $image_db_url;
        }
        $article->save();
        return response()->json([
            'status' => true,
            'message' => 'Article Saved Successfully.',
        ]);
       }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
       }
    }// end -:- ajaxStore()
}// end -:- ArticleController
