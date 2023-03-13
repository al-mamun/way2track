<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetailTemp extends Model
{
    use HasFactory;
    protected $table = 'w2t_delivery_detail_temp';
    protected $fillable=[
    	'DELIVERY_ID',
    	'SHIPMENT_ID',
    	'CONTAINER_NO',
    	'PO_NO',
    	'ITEM',
    	'DESCRIPTION',
    	'Qty',
    ];
}
