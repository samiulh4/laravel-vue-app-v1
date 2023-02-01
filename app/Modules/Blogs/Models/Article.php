<?php

namespace App\Modules\Blogs\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $table = 'blogs_articles';
    protected $guarded = ['id'];   

}
