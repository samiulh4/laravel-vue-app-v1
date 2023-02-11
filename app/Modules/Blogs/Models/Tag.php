<?php

namespace App\Modules\Blogs\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'blogs_tags';
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'name',
        'tag_classes',
        'created_by',
        'updated_by',
    ];

}
