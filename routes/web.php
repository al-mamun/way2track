<?php
 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/role_permission.php';

Route::get('/order/{id}', function () {
    return view('welcome');
});
Route::POST( '/order/comments/delivery', 'App\Http\Controllers\OrderController@orderCommentsDelivery' );

Route::get('/admin_login', 'App\Http\Controllers\LoginController@login');
Route::get('user/login', 'App\Http\Controllers\LoginController@otherUserLogin')->name('login');
Route::get('/socialite/redirect', 'App\Http\Controllers\LoginController@redirectToProvider')->name('socialite.redirect');
Route::get('/callback', 'App\Http\Controllers\LoginController@handleProviderCallback')->name('socialite.callback');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout' );
Route::post('login/custom', 'App\Http\Controllers\LoginController@loginCustom');
Route::get( '/order/{id}', 'App\Http\Controllers\OrderController@orderDetails' );
Route::get( '/generate', 'App\Http\Controllers\OrderController@generateUniqID' );

Route::post('mail', 'App\Http\Controllers\MailController@mail')->name('mail');
$router->group( ['middleware' => 'auth'] , function($router) {

    Route::get( '/dashboard', 'App\Http\Controllers\DashboardController@dashboard' )->name('dashboard');

    Route::get( '/new/order/status', 'App\Http\Controllers\Admin\OrderStatusController@newOrderStatus' );
    Route::post( '/new/order/status/submit', 'App\Http\Controllers\Admin\OrderStatusController@newOrderStatusSubmit' );
    Route::get( '/list/order/status', 'App\Http\Controllers\Admin\OrderStatusController@ListOrderStatus');
    Route::get( '/list/order/status/id/{id}', 'App\Http\Controllers\Admin\OrderStatusController@orderStatusWithId');
    Route::get( '/list/order/status/export', 'App\Http\Controllers\Admin\OrderStatusController@ListOrderStatusExport');
    Route::post( '/list/order/status/filter', 'App\Http\Controllers\Admin\OrderStatusController@ListOrderStatusFilter');
    Route::get( '/sales/send/email/{id}', 'App\Http\Controllers\Admin\OrderStatusController@salesSendEmail' );
    Route::post( '/sales_update', 'App\Http\Controllers\Admin\OrderStatusController@salesUpdate' );
    Route::post( '/sales_details_comments_update', 'App\Http\Controllers\Admin\OrderController@salesDetailsCommentsUpdate' );
    Route::post( '/sales_details_update_list', 'App\Http\Controllers\Admin\OrderController@saledDetailsUpdateList' );
    Route::post( '/single-sales-image-update', 'App\Http\Controllers\Admin\OrderController@singleSalesImageUpdate' );
    
    
    Route::post( '/new/order/status/update/{id}', 'App\Http\Controllers\Admin\OrderStatusController@salesOrderListUpdate' );
    Route::post( '/sales/order/delete/{id}', 'App\Http\Controllers\Admin\OrderStatusController@salesOrderListDelete' );
    Route::get( '/sales/order/list/edit/{id}', 'App\Http\Controllers\Admin\OrderStatusController@salesOrderListEdit' );
    Route::post( '/file_upload_order', 'App\Http\Controllers\Admin\OrderStatusController@fileUpload' );


    Route::get( '/new/order/details', 'App\Http\Controllers\Admin\OrderController@newOrderDetails');
    Route::post( '/sales_details_update', 'App\Http\Controllers\Admin\OrderController@newOrderDetailsUpdate');
    Route::post( '/new/order/details/submit', 'App\Http\Controllers\Admin\OrderController@newOrderDetailsSubmit');
    Route::post( '/new/order/details/submit/temp', 'App\Http\Controllers\Admin\OrderController@newOrderDetailsSubmitTemp');
   
    
    Route::get( '/list/order/edit/{id}', 'App\Http\Controllers\Admin\OrderController@listOrderEdit' );
    Route::post( '/list/order/update/{id}', 'App\Http\Controllers\Admin\OrderController@listOrderUpdate' );
    Route::get( '/list/order/details', 'App\Http\Controllers\Admin\OrderController@listOfOrderDetails' );
    Route::get( '/list/order/details/ajax', 'App\Http\Controllers\Admin\OrderController@listOfOrderDetailsAjax' );
    Route::get( '/list/order/detail/list/{id}', 'App\Http\Controllers\Admin\OrderController@listOfOrderDetailWIPWise' );
    Route::post( '/list/order/details/expected/delivery', 'App\Http\Controllers\Admin\OrderController@listOfOrderDetailsExpecctedDelivery' );
    Route::post( '/list/order/delete/{id}', 'App\Http\Controllers\Admin\OrderController@listOfOrderDetailsDelete' )->name('order.delete');
    Route::post( '/list/order/details/show/{id}', 'App\Http\Controllers\Admin\OrderController@listOfOrderDetailsShow');
    Route::get( '/sales/order/list', 'App\Http\Controllers\Admin\OrderController@dashboard' );
    Route::get( '/userlist', 'App\Http\Controllers\LoginController@userList')->name('admin.user_list');
    
    Route::get( '/new-user-setup', 'App\Http\Controllers\LoginController@userListSetup' );
    Route::post( '/new-user/submit', 'App\Http\Controllers\LoginController@newUserStore' );
    Route::get( '/userlist/edit/{id}', 'App\Http\Controllers\LoginController@userListEdit' );
    Route::post( '/userlist/update/{id}', 'App\Http\Controllers\LoginController@userListUpdate' );
    Route::get( '/userlist/delete{id}', 'App\Http\Controllers\LoginController@userListDelete' )->name('user.delete');
   
    
    Route::get( '/new/purchase/order/header', 'App\Http\Controllers\Admin\PurchaseOrderHeader@create' );
    Route::post( '/new/purchase/order/supplier/list', 'App\Http\Controllers\Admin\PurchaseOrderHeader@supplierList' );
    Route::post( '/new/purchase/order/status/submit', 'App\Http\Controllers\Admin\PurchaseOrderHeader@store' );
    Route::get( '/list/purchase/order/header', 'App\Http\Controllers\Admin\PurchaseOrderHeader@list');
    Route::get( '/list/purchase/order/header/{show}', 'App\Http\Controllers\Admin\PurchaseOrderHeader@listShow');
    Route::get( '/list/purchase/order/header_export', 'App\Http\Controllers\Admin\PurchaseOrderHeader@listExport');
    Route::post( '/list/purchase/order/header/export/search', 'App\Http\Controllers\Admin\PurchaseOrderHeader@listExportSearch');
    Route::post( '/purchase/order/status/update/{id}', 'App\Http\Controllers\Admin\PurchaseOrderHeader@update' );
    Route::post( '/purchase/order/delete/{id}', 'App\Http\Controllers\Admin\PurchaseOrderHeader@delete' )->name('purchase.delete');
    Route::get( '/purchase/order/list/edit/{id}', 'App\Http\Controllers\Admin\PurchaseOrderHeader@edit' );
    Route::post( '/purchase_order_import', 'App\Http\Controllers\Admin\PurchaseOrderHeader@purchasesOrderImport' );
    Route::post( '/purchase_order_import_csv', 'App\Http\Controllers\Admin\PurchaseOrderHeader@purchasesOrderImportCsv' );
    Route::get( '/test/csv', 'App\Http\Controllers\Admin\PurchaseOrderHeader@testcsv' );

    Route::get( '/create/purchase/order/details', 'App\Http\Controllers\Admin\purchaseOrderDetails@create');
    Route::post( '/create/purchase/order/details/submit', 'App\Http\Controllers\Admin\purchaseOrderDetails@store');
    Route::post( '/create/purchase/order/details/submit/temp', 'App\Http\Controllers\Admin\purchaseOrderDetails@importSubmit');
    Route::get( '/list/purchase/order/edit/{id}', 'App\Http\Controllers\Admin\purchaseOrderDetails@edit' );
    // Route::post( '/list/order/update/{id}', 'App\Http\Controllers\Admin\purchaseOrderDetails@listOrderUpdate' );
    Route::post( '/list/purchase/order/update/{id}', 'App\Http\Controllers\Admin\purchaseOrderDetails@Update' );
    Route::get( '/list/purchase/order/details', 'App\Http\Controllers\Admin\purchaseOrderDetails@list' );
    Route::get( '/purchase/order/detail/view/{id}', 'App\Http\Controllers\Admin\purchaseOrderDetails@detailsViewList' );
    Route::post( '/list/purchase/order/details/expected/delivery', 'App\Http\Controllers\Admin\purchaseOrderDetails@listFitler' );
    Route::post( '/purchase_details_update', 'App\Http\Controllers\Admin\purchaseOrderDetails@purchaseUpdate' );
    Route::post( '/purchase_update', 'App\Http\Controllers\Admin\purchaseOrderDetails@purchaseUpdateOfSales' );
     Route::post( '/purchase_details_comments_update', 'App\Http\Controllers\Admin\purchaseOrderDetails@purchaseUpdateOfSalesCopy' );
     
    Route::get( '/list/purchase/order/delete/{id}', 'App\Http\Controllers\Admin\purchaseOrderDetails@delete' )->name('purchase_order.delete');
    Route::post( '/purchase_details_update_list', 'App\Http\Controllers\Admin\purchaseOrderDetails@purchaseDetailsUpdateList');
    // Route::get( '/sales/order/list', 'App\Http\Controllers\Admin\purchaseOrderDetails@dashboard' );
    
    
    
    Route::get( '/import/order', 'App\Http\Controllers\Admin\OrderController@orderImport' );
    // shipment
    Route::get( '/create/shipment', 'App\Http\Controllers\Admin\Shipment\ShipmentController@createShipment');
    Route::post( '/create/shipment/submit', 'App\Http\Controllers\Admin\Shipment\ShipmentController@createShipmentStore');
    Route::get( '/edit/shipment/details', 'App\Http\Controllers\Admin\Shipment\ShipmentController@ShipmentView');
    //  Route::get( '/edit/shipment/detail/token/{token}', 'App\Http\Controllers\Admin\Shipment\ShipmentController@ShipmentViewTemporaryData');
    Route::post( '/list/purchase/order/header/modal', 'App\Http\Controllers\Admin\Shipment\ShipmentController@listPurchaseorderheaderModal');
    Route::post( '/list/purchase/order/assign/shipment', 'App\Http\Controllers\Admin\Shipment\ShipmentController@listPurchaseorderAssignShipment');
    Route::post( '/list/purchase/order/assign/shipment/submit', 'App\Http\Controllers\Admin\Shipment\ShipmentController@listPurchaseorderAssignShipmentSubmit');
    Route::post( '/list/order/delete/temp/{id}', 'App\Http\Controllers\Admin\Shipment\ShipmentController@tempDelete');
    Route::get( '/list/purchase/order/assign/shipment/token/{token}', 'App\Http\Controllers\Admin\Shipment\ShipmentController@listPurchaseorderAssignShipmentTemp');
    
    Route::post( '/list/shipped/single/order/details', 'App\Http\Controllers\Admin\Shipment\ShipmentController@listPurchseOrderDetails');
    Route::get( '/export/shipments', 'App\Http\Controllers\Admin\Shipment\ShipmentController@exportShipmentHeader');
    
    Route::post( '/shipment/details/submit', 'App\Http\Controllers\Admin\Shipment\ShipmentDetailsController@store');
    Route::get( '/edit/shipment/details/{id}', 'App\Http\Controllers\Admin\Shipment\ShipmentController@showShipment');
    Route::post( '/shipment/delete/{id}', 'App\Http\Controllers\Admin\Shipment\ShipmentController@ShipmentDelete');
    // Shipment Details
    Route::get( '/add/shipment/details', 'App\Http\Controllers\Admin\Shipment\ShipmentDetailsController@addShipmenDetails');
    Route::get( '/export/shipment/order', 'App\Http\Controllers\Admin\Shipment\ShipmentDetailsController@exportShipmentOrder');
     
    Route::get( '/export/shipment/order/view/{id}', 'App\Http\Controllers\Admin\Shipment\ShipmentDetailsController@exportShipmentOrderView');
    
    Route::post( '/export/shipment/order/search', 'App\Http\Controllers\Admin\Shipment\ShipmentDetailsController@exportShipmentOrderSearch');
    Route::post( '/export/shipment/order/delete/{id}', 'App\Http\Controllers\Admin\Shipment\ShipmentDetailsController@exportShipmentdelete')->name('export_shipment.delete');
    Route::post( '/shipment_update', 'App\Http\Controllers\Admin\Shipment\ShipmentController@shipmentUpdateInline' );
    Route::post( '/shipment_details_update', 'App\Http\Controllers\Admin\Shipment\ShipmentDetailsController@shipmentUpdateInline' );
    Route::post( '/shipment_details_copy_update', 'App\Http\Controllers\Admin\Shipment\ShipmentDetailsController@shipmentDetailsCopyUPdate' );
    Route::post( '/shipment_details_update_list', 'App\Http\Controllers\Admin\Shipment\ShipmentDetailsController@shipmentDetailsUpdateList' );
    
    // Delivery
    Route::get( '/create/delivery', 'App\Http\Controllers\Admin\Delivery\DeliveryController@createDelivery');
    
    Route::post( '/create/delivery/submit', 'App\Http\Controllers\Admin\Delivery\DeliveryController@createDeliveryStore');
    Route::get( '/edit/delivery/details', 'App\Http\Controllers\Admin\Delivery\DeliveryController@deliveryView');
    Route::get( '/edit/delivery/detail/token/{token}', 'App\Http\Controllers\Admin\Delivery\DeliveryController@deliveryViewTemp');
    Route::get( '/export/deliverys', 'App\Http\Controllers\Admin\Delivery\DeliveryController@exportDelivery');
    Route::get( '/edit/delivery/details/{id}', 'App\Http\Controllers\Admin\Delivery\DeliveryController@deliverySingleView');
    Route::post( '/edit/delivery/details/delete/{id}', 'App\Http\Controllers\Admin\Delivery\DeliveryController@deliveryDelete');
    Route::post( '/export/temp/delivery/details/delete/{id}', 'App\Http\Controllers\Admin\Delivery\DeliveryController@tempDeliveryDelete');
    
    
    Route::post( '/list/delivery/single/order/details', 'App\Http\Controllers\Admin\Delivery\DeliveryController@listDeliveryOrderDetails');
    Route::post( '/list/delivery/order/header/modal', 'App\Http\Controllers\Admin\Delivery\DeliveryController@listPurchaseorderheaderModal');
    Route::post( '/list/delivery/order/assign/shipment', 'App\Http\Controllers\Admin\Delivery\DeliveryController@listPurchaseorderAssignShipment'); 
    Route::post( '/delivery_update', 'App\Http\Controllers\Admin\Delivery\DeliveryController@deliveryUpdateInline' );
    
    
    // Deliver Details
    Route::get( '/add/delivery/details', 'App\Http\Controllers\Admin\Delivery\DeliveryDetailsController@addDeliveryDetails');
    
    Route::post( '/add/delivery/details/submit', 'App\Http\Controllers\Admin\Delivery\DeliveryDetailsController@adddeliveryDetailStore');
    Route::post( '/temp/delivery/details/submit', 'App\Http\Controllers\Admin\Delivery\DeliveryDetailsController@tempdeliveryDetailSubmit');
    Route::get( '/export/delivery/details', 'App\Http\Controllers\Admin\Delivery\DeliveryDetailsController@deliveryDetailsExport');
    Route::post( '/export/delivery/details/search', 'App\Http\Controllers\Admin\Delivery\DeliveryDetailsController@deliveryDetailsExportSearch');
    
    Route::get( '/export/delivery/details/view/{id}', 'App\Http\Controllers\Admin\Delivery\DeliveryDetailsController@deliveryDetailsExportView');
   
    Route::post( '/export/delivery/details/delete/{id}', 'App\Http\Controllers\Admin\Delivery\DeliveryDetailsController@deliveryExportDelete');
    Route::post( '/delivery_details_update', 'App\Http\Controllers\Admin\Delivery\DeliveryDetailsController@deliveryDetailsUpdateInline' );
    Route::post( '/delivery_details_copy_update', 'App\Http\Controllers\Admin\Delivery\DeliveryDetailsController@deliveryDetailsCopyUPdate' );
    Route::post( '/delivery_details_update_list', 'App\Http\Controllers\Admin\Delivery\DeliveryDetailsController@deliveryDetailsUpdateList' );
    
    
});






