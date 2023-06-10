<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderHeader extends Model
{
    protected $table = 'w2t_sales_order_header';
    public $timestamp = true;
}
