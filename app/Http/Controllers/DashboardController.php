<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrderDetails;
use App\Models\SalesOrderHeader;

class DashboardController extends Controller
{
    
    public function dashboard() {
         $orderID  = 1;
        $saledOrderHeaders = SalesOrderHeader::where('WIP', $orderID )->first();
        $salesOrderDetails = SalesOrderDetails::where('WIP', $orderID )->get();

        return view('admin.dashboard.index',[
            'saledOrderHeaders' =>  $saledOrderHeaders,
            'salesOrderDetails' =>  $salesOrderDetails,
        ]);
    }
}
