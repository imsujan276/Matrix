<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sponsor extends Model
{
	protected $table="sponsors";

    protected $fillable = [
    	'sponsor_id', 'user_id','sponsor_level'
    ];
}
