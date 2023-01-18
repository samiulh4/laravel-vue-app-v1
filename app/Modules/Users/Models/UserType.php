<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model {
    protected $table = 'users_type';
    protected $guarded = ['id'];   
    protected $fillable = [
        'name'
    ];
}// end -:- user