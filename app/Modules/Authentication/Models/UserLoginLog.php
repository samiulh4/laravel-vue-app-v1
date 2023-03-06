<?php

namespace App\Modules\Authentication\Models;

use Illuminate\Database\Eloquent\Model;

class UserLoginLog extends Model {

    protected $table = 'users_login_logs';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'user_details',
        'browser_details',
        'error_response',
        'created_at',
        'updated_at',
    ];
}// end -:- UserLoginLog
