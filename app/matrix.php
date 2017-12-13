<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matrix extends Model
{
    protected $table="matrices";

    protected $fillable = [
    	'row', 'column'
    ];
}
