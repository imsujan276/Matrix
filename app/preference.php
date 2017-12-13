<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preference extends Model
{
    protected $table="preferences";

    protected $fillable = [
    	'skype', 'user_id','phone','email'
    ];
}
