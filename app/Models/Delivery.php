<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'w2t_delivery_header';
    protected $fillable=[
    	'DELIVERY_ID',
    	'SIZE',
    	'NO_OF_TRUCKS',
    	'VEHICLE_PLATES',
    	'LAST_DESPATCH_TIME',
    	'EXPECTED_DELIVERY',
    	'DELIVERY_STATUS',
    	'DELIVERY_TIME',
    	'DELIVERY_ADDRESS',
    ];
}
