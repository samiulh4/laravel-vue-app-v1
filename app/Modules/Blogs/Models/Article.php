<?php

namespace App\Modules\Blogs\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $table = 'blogs_articles';
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'title',
        'context',
        'photo',
        'created_by',
        'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo('App\Modules\Users\Models\User', 'id', 'created_by');
    }
}
