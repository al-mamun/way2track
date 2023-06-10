<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentDetailTemp extends Model
{
    
    use HasFactory;
    protected $table = 'w2t_shipment_details_temp';
    protected $fillable=[
    	'SHIPMENT_ID',
    	'CONTAINER_NO',
    	'VESSEL',
    	'Qty',
    	'ETD',
    	'ETA',
    	'SUPPLIER',
    	'PO_NO',
    	'WIP',
    	'ITEM',
    	'DESCRIPTION',
    	'COMMENTS',
    	'ACT_EXF_DATE',
    	'MBL_MAWB',
    	'VESSEL_SAILING_DATE',
    	'CONFIRMED_ETA',
    	'SHIPMENT_STATUS',
    ];
}
