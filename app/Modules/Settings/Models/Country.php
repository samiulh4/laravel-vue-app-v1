<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'nicename',
        'iso2',
        'iso3',
        'numcode',
        'phonecode',
        'created_by',
        'updated_by'
    ];
}// end -:- Country Model
