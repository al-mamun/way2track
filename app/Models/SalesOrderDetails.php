<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderDetails extends Model
{
    protected $table = 'w2t_sales_order_detail';
    public $timestamp = true;
}
