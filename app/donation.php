<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donation extends Model
{
    protected $table="donations";

    protected $fillable = [
    	'btc', 'user_id','sent_to','tx_id','send_address', 'receive_address', 'tx_date'
    ];
}
