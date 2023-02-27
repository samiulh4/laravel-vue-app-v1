<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'users';
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'name',
        'email',
        'photo',
        'created_by',
        'updated_by',
    ];
    public function articles()
    {
        return $this->hasMany('App\Modules\Blogs\Models\Article', 'created_by', 'id');
    }
}// end -:- user
