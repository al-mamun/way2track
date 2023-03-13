<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetail extends Model
{
    use HasFactory;
    protected $table = 'w2t_delivery_detail';
    protected $fillable=[
    	'DELIVERY_ID',
    	'SHIPMENT_ID',
    	'SHIPMENT_DETAIL_ID',
    	'CONTAINER_NO',
    	'PO_NO',
    	'ITEM',
    	'DESCRIPTION',
    	'Qty',
    ];
}
