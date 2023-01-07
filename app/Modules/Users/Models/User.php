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
    ];

}// end -:- user
