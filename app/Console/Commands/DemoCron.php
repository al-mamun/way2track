<?php
   
namespace App\Console\Commands;
use App\Models\SalesOrderHeader;   
use App\Models\PoDetails;
use App\Models\PoHeader;
use App\Models\EmailLogs; 
use App\Models\ShipmentHeader;
use App\Models\ShipmentDetail;
use Illuminate\Console\Command;
use DB;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    
        \Log::info("Cron is working fine!");
        
        $this->allPoNoConfirmedExp();
        $this->allPoNoWIPConfirmedExp();
        $this->confirmedETA();
        $this->confirmedETAChange();
        $this->wipSomeItemsReceived();
        
        return "Successfully Send Mail";
        
    //     $salesOrderInfo = DB::table('w2t_sales_order_header')->where('ID', 132)->first();
    //  \Log::info("Cron is working fine!".$salesOrderInfo->ID);
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
    
    private function allPoNoConfirmedExp() {
        // PO No
        $poDetailsNo = PoDetails::where('CONFIRMED_EXF_CHANGE_DATE',date('Y-m-d'))
            ->groupBy('PO_NO')
            ->pluck('PO_NO');

        \Log::info("Cron is working fine!");
        
        foreach($poDetailsNo as $poNoInfo) {
            
            $poDetailsInfo = PoDetails::where('PO_NO', $poNoInfo)
                ->WhereNull('CONFIRMED_EXF')
                ->count();
            
            if($poDetailsInfo == 0) {
                
                $poHeaderInfo    = PoHeader::where('PO_NO', $poNoInfo)->first();
                
                $salesHeaderInfo = SalesOrderHeader::where('WIP', $poHeaderInfo->WIP)->first();
                
                $title = $salesHeaderInfo->PROJECT_NAME.', '. $poNoInfo.' Confirmed GRD';
                
                $body = 'All Lines of PO have Confirmed GRD';
                
                $emailSalePersonEmail = EmailLogs::where('EMAIL', $salesHeaderInfo->SALESPERSON_EMAIL)
                        ->where('DATE',  date('Y-m-d'))
                        ->where('PO_NO',  $poNoInfo)
                        ->where('TYPE',  1)
                        ->where('EMAIL_TYPE',  1)
                        ->first();
                    
                if(empty($emailSalePersonEmail)) {
                    
                   
                    $emailLogInfo = new EmailLogs();
                    $emailLogInfo->PO_NO      = $poNoInfo;
                    $emailLogInfo->EMAIL      = $salesHeaderInfo->SALESPERSON_EMAIL;
                    $emailLogInfo->TITLE      = $title;
                    $emailLogInfo->BODY       = $body;
                    $emailLogInfo->SUBJECT    = $title;
                    $emailLogInfo->DATE       = date('Y-m-d');
                    $emailLogInfo->TYPE       = 1; // All po no confirmed GRD
                    $emailLogInfo->EMAIL_TYPE = 1; // Sales person
                    $emailLogInfo->save();
                    
                     EmailLogs::sendEMailGlobal($salesHeaderInfo->SALESPERSON_EMAIL, $title, $body, $poNoInfo);
                    
                }
                
                $emailProjectmManagerPersonEmail = EmailLogs::where('EMAIL', $salesHeaderInfo->PROJECTMANAGER_EMAIL)
                        ->where('DATE',  date('Y-m-d'))
                        ->where('PO_NO',  $poNoInfo)
                        ->where('TYPE', 1)
                        ->where('EMAIL_TYPE',  2)
                        ->first();
                        
                if(empty($emailProjectmManagerPersonEmail)) {
            
                    $emailLogInfo = new EmailLogs();
                    $emailLogInfo->PO_NO       = $poNoInfo;
                    $emailLogInfo->EMAIL       = $salesHeaderInfo->PROJECTMANAGER_EMAIL;
                    $emailLogInfo->TITLE       = $title;
                    $emailLogInfo->BODY        = $body;
                    $emailLogInfo->SUBJECT     = $title;
                    $emailLogInfo->DATE        = date('Y-m-d');
                    $emailLogInfo->TYPE        = 1; // All po no confirmed GRD
                    $emailLogInfo->EMAIL_TYPE  = 2; // Project manager person
                    $emailLogInfo->save();
                    EmailLogs::sendEMailGlobal($salesHeaderInfo->PROJECTMANAGER_EMAIL, $title, $body, $poNoInfo);
                }
                
            }
        }
       
       
    }
    
    private function allPoNoWIPConfirmedExp() {
        
        // PO No
        $poDetailsNo = PoDetails::where('CONFIRMED_EXF_CHANGE_DATE',date('Y-m-d'))
            ->groupBy('PO_NO')
            ->pluck('PO_NO');
          
        \Log::info("Cron is working fine!");
        
        foreach($poDetailsNo as $poNoInfo) {
            
            
            $poHeaderInfo      = PoHeader::where('PO_NO', $poNoInfo)->first();
             
            $poHeaderInfoPONO  =  PoHeader::where('WIP', $poHeaderInfo->WIP)->pluck('PO_NO');
            
       
            $poDetailsInfo = PoDetails::whereIN('PO_NO', $poHeaderInfoPONO)
                ->WhereNull('CONFIRMED_EXF')
                ->count();
            
            if($poDetailsInfo == 0) {
                
               
                $salesHeaderInfo = SalesOrderHeader::where('WIP', $poHeaderInfo->WIP)->first();
                $title = $salesHeaderInfo->PROJECT_NAME.', '. $poHeaderInfo->WIP.' Confirmed GRD';
                
                $body      = 'All Lines of WIP have Confirmed GRD';
                
                $emailSalePersonEmail = EmailLogs::where('EMAIL', $salesHeaderInfo->SALESPERSON_EMAIL)
                    ->where('DATE',  date('Y-m-d'))
                    ->where('PO_NO',  $poNoInfo)
                    ->where('WIP',   $poHeaderInfo->WIP)
                    ->where('TYPE',  2)
                    ->where('EMAIL_TYPE',  1)
                    ->first();
                    
                if(empty($emailSalePersonEmail)) {
                    
                    EmailLogs::sendEMailGlobal($salesHeaderInfo->SALESPERSON_EMAIL, $title, $body, $poNoInfo);
                    $emailLogInfo = new EmailLogs();
                    $emailLogInfo->PO_NO      = $poNoInfo;
                    $emailLogInfo->WIP        = $poHeaderInfo->WIP;
                    $emailLogInfo->EMAIL      = $salesHeaderInfo->SALESPERSON_EMAIL;
                    $emailLogInfo->TITLE      = $title;
                    $emailLogInfo->BODY       = $body;
                    $emailLogInfo->SUBJECT    = $title;
                    $emailLogInfo->DATE       = date('Y-m-d');
                    $emailLogInfo->TYPE       = 2; //All Lines of WIP have Confirmed GRD
                    $emailLogInfo->EMAIL_TYPE = 1; // Sales person
                    $emailLogInfo->save();
                    
                }
                
                $emailSalePersonEmail = EmailLogs::where('EMAIL', $salesHeaderInfo->PROJECTMANAGER_EMAIL)
                    ->where('DATE',  date('Y-m-d'))
                    ->where('PO_NO',  $poNoInfo)
                    ->where('WIP',   $poHeaderInfo->WIP)
                    ->where('TYPE',  2)
                    ->where('EMAIL_TYPE',  2)
                    ->first();
                    
                if(empty($emailSalePersonEmail)) {
                    
                    EmailLogs::sendEMailGlobal($salesHeaderInfo->PROJECTMANAGER_EMAIL, $title, $body, $poNoInfo);
                    
                    $emailLogInfo = new EmailLogs();
                    $emailLogInfo->PO_NO       = $poNoInfo;
                    $emailLogInfo->EMAIL       = $salesHeaderInfo->PROJECTMANAGER_EMAIL;
                    $emailLogInfo->WIP         = $poHeaderInfo->WIP;
                    $emailLogInfo->TITLE       = $title;
                    $emailLogInfo->BODY        = $body;
                    $emailLogInfo->SUBJECT     = $title;
                    $emailLogInfo->DATE        = date('Y-m-d');
                    $emailLogInfo->TYPE        = 2; // All Lines of WIP have Confirmed GRD
                    $emailLogInfo->EMAIL_TYPE  = 2; // Project manager person
                    $emailLogInfo->save();
                    
                }
               
                
                
            }
        }
       
       
    }
    
    private function confirmedETA() {
        
        // PO No
        $poDetailsNo = ShipmentDetail::whereBetween('CONFIRMED_ETA_CHANGE_DATE',[date('Y-m-d'), date('Y-m-d')])
            ->groupBy('PO_NO')
            ->pluck('PO_NO');
            
    
            
        foreach($poDetailsNo as $poNoInfo) {
            
            $poDetailsInfoConfirmedEta = ShipmentDetail::where('PO_NO', $poNoInfo)
                ->WhereNull('CONFIRMED_ETA')
                ->count();
                
            $poDetailsInfoConfirmedDetailsID= ShipmentDetail::where('PO_NO', $poNoInfo)
                ->Where('PO_DETAILS_ID', 0)
                ->count();
                
            
            if($poDetailsInfoConfirmedEta == 0 && $poDetailsInfoConfirmedDetailsID == 0) {
                
                     $poHeaderInfo    = PoHeader::where('PO_NO', $poNoInfo)->first();
                    
                    $salesHeaderInfo = SalesOrderHeader::where('WIP', $poHeaderInfo->WIP)->first();
                    
                    $title = $salesHeaderInfo->PROJECT_NAME.', '. $poNoInfo.' Confirmed ETA';
                    

                    $body = 'All Lines of WIP have Confirmed ETA';
                    
                    $emailSalePersonEmail = EmailLogs::where('EMAIL', $salesHeaderInfo->SALESPERSON_EMAIL)
                        ->where('DATE',  date('Y-m-d'))
                        ->where('PO_NO',  $poNoInfo)
                        ->where('TYPE',  3)
                        ->where('EMAIL_TYPE',  1)
                        ->first();
                        
                    if(empty($emailSalePersonEmail)) {
                        
                        EmailLogs::sendEMailGlobal($salesHeaderInfo->SALESPERSON_EMAIL, $title, $body, $poNoInfo);
                        
                        $emailLogInfo = new EmailLogs();
                        $emailLogInfo->PO_NO     = $poNoInfo;
                        $emailLogInfo->EMAIL     = $salesHeaderInfo->SALESPERSON_EMAIL;
                        $emailLogInfo->TITLE     = $title;
                        $emailLogInfo->BODY      = $body;
                        $emailLogInfo->SUBJECT   = $title;
                        $emailLogInfo->DATE      = date('Y-m-d');
                        $emailLogInfo->TYPE      = 3; // All po no confirmed GRD
                        $emailLogInfo->EMAIL_TYPE  = 1;
                        $emailLogInfo->save();
                    
                    }
                    
                    $emailSalePersonEmail = EmailLogs::where('EMAIL', $salesHeaderInfo->PROJECTMANAGER_EMAIL)
                        ->where('DATE',  date('Y-m-d'))
                        ->where('PO_NO',  $poNoInfo)
                        ->where('TYPE',  3)
                        ->where('EMAIL_TYPE',  2)
                        ->first();
                        
                    if(empty($emailSalePersonEmail)) {
                        
                        $emailLogInfo = new EmailLogs();
                        $emailLogInfo->PO_NO       = $poNoInfo;
                        $emailLogInfo->EMAIL       = $salesHeaderInfo->PROJECTMANAGER_EMAIL;
                        $emailLogInfo->TITLE       = $title;
                        $emailLogInfo->BODY        = $body;
                        $emailLogInfo->SUBJECT     = $title;
                        $emailLogInfo->DATE        = date('Y-m-d');
                        $emailLogInfo->TYPE        = 3; // All po no confirmed GRD
                        $emailLogInfo->EMAIL_TYPE  = 2;
                        $emailLogInfo->save();
                    
                    
                        EmailLogs::sendEMailGlobal($salesHeaderInfo->PROJECTMANAGER_EMAIL, $title, $body, $poNoInfo);
                    }
                
            }
        }
        
    }
    
    private function confirmedETAChange() {
         // PO No
        $poDetailsNo = ShipmentDetail::where('CONFIRMED_ETA_CHANGE_DATE', date('Y-m-d'))
            ->groupBy('PO_NO')
            ->pluck('PO_NO');
            
       
        foreach($poDetailsNo as $poNoInfo) {
            
            // $poDetailsInfoConfirmedEta = ShipmentDetail::where('PO_NO', $poNoInfo)
            //     ->WhereNull('CONFIRMED_ETA')
            //     ->count();
                
            // $poDetailsInfoConfirmedDetailsID= ShipmentDetail::where('PO_NO', $poNoInfo)
            //     ->Where('PO_DETAILS_ID', 0)
            //     ->count();
                
            
            // if($poDetailsInfoConfirmedEta == 0 && $poDetailsInfoConfirmedDetailsID == 0) {
                
                     $poHeaderInfo    = PoHeader::where('PO_NO', $poNoInfo)->first();
                    
                    $salesHeaderInfo = SalesOrderHeader::where('WIP', $poHeaderInfo->WIP)->first();
                    
                    $title = $salesHeaderInfo->PROJECT_NAME.', '. $poNoInfo.' Confirmed ETA Changes';
                    
                    
                    $body = 'Some Lines Confirmed ETA has changed';
                    
                    $emailSalePersonEmail = EmailLogs::where('EMAIL', $salesHeaderInfo->SALESPERSON_EMAIL)
                        ->where('DATE',  date('Y-m-d'))
                        ->where('PO_NO',  $poNoInfo)
                        ->where('TYPE',  4)
                        ->where('EMAIL_TYPE', 1)
                        ->first();
                        
                    if(empty($emailSalePersonEmail)) {
                        
                    EmailLogs::sendEMailGlobal($salesHeaderInfo->SALESPERSON_EMAIL, $title, $body, $poNoInfo);
                        $emailLogInfo = new EmailLogs();
                        $emailLogInfo->PO_NO       = $poNoInfo;
                        $emailLogInfo->EMAIL       = $salesHeaderInfo->SALESPERSON_EMAIL;
                        $emailLogInfo->TITLE       = $title;
                        $emailLogInfo->BODY        = $body;
                        $emailLogInfo->SUBJECT     = $title;
                        $emailLogInfo->DATE        = date('Y-m-d');
                        $emailLogInfo->TYPE        = 4; // Some Lines Confirmed ETA has changed
                        $emailLogInfo->EMAIL_TYPE  = 1;
                        $emailLogInfo->save();
                    }
                    
                    $emailSalePersonEmail = EmailLogs::where('EMAIL', $salesHeaderInfo->PROJECTMANAGER_EMAIL)
                        ->where('DATE',  date('Y-m-d'))
                        ->where('PO_NO',  $poNoInfo)
                        ->where('TYPE',  4)
                        ->where('EMAIL_TYPE',  2)
                        ->first();
                        
                    if(empty($emailSalePersonEmail)) {
                        
                        EmailLogs::sendEMailGlobal($salesHeaderInfo->PROJECTMANAGER_EMAIL, $title, $body, $poNoInfo);
                        $emailLogInfo = new EmailLogs();
                        $emailLogInfo->PO_NO       = $poNoInfo;
                        $emailLogInfo->EMAIL       = $salesHeaderInfo->PROJECTMANAGER_EMAIL;
                        $emailLogInfo->TITLE       = $title;
                        $emailLogInfo->BODY        = $body;
                        $emailLogInfo->SUBJECT     = $title;
                        $emailLogInfo->DATE        = date('Y-m-d');
                        $emailLogInfo->TYPE        = 4; // Some Lines Confirmed ETA has changed
                        $emailLogInfo->EMAIL_TYPE  = 2;
                        $emailLogInfo->save();
                    
                    }
                    
                    
                   
                
            // }
        }
    }
    
    private function wipSomeItemsReceived() {
        
         $poDetailsNo = ShipmentDetail::whereBetween('SHIPMENT_RECD_CHANGE_DATE', [date('Y-m-d'), date('Y-m-d')])
            ->groupBy('PO_NO')
            ->pluck('PO_NO');
            
       
        foreach($poDetailsNo as $poNoInfo) {
            
            // $poDetailsInfoConfirmedEta = ShipmentDetail::where('PO_NO', $poNoInfo)
            //     ->WhereNull('SHIPMENT_RECD_DATE')
            //     ->count();
                
            // $poDetailsInfoConfirmedDetailsID= ShipmentDetail::where('PO_NO', $poNoInfo)
            //     ->Where('PO_DETAILS_ID', 0)
            //     ->count();
                
            
            // if($poDetailsInfoConfirmedEta == 0 && $poDetailsInfoConfirmedDetailsID == 0) {
                
                    $poHeaderInfo    = PoHeader::where('PO_NO', $poNoInfo)->first();
                    
                    $salesHeaderInfo = SalesOrderHeader::where('WIP', $poHeaderInfo->WIP)->first();
                    
                    $title = $salesHeaderInfo->PROJECT_NAME.', '. $salesHeaderInfo->WIP.' Some Items received';
                    
                  
                    $body = 'Warehouse Receipt of any shipment of a WIP';
                    
                    
                    $emailSalePersonEmail = EmailLogs::where('EMAIL', $salesHeaderInfo->SALESPERSON_EMAIL)
                        ->where('DATE',  date('Y-m-d'))
                        ->where('PO_NO',  $poNoInfo)
                        ->where('TYPE',  5)
                        ->where('EMAIL_TYPE', 1)
                        ->first();
                    
                    if(empty($emailSalePersonEmail)) {
                        
                        EmailLogs::sendEMailGlobal($salesHeaderInfo->SALESPERSON_EMAIL, $title, $body, $poNoInfo);
                        $emailLogInfo = new EmailLogs();
                        $emailLogInfo->PO_NO     = $poNoInfo;
                        $emailLogInfo->EMAIL     = $salesHeaderInfo->SALESPERSON_EMAIL;
                        $emailLogInfo->TITLE     = $title;
                        $emailLogInfo->BODY      = $body;
                        $emailLogInfo->SUBJECT   = $title;
                        $emailLogInfo->DATE      = date('Y-m-d');
                        $emailLogInfo->TYPE      = 5; // All po no confirmed GRD
                        $emailLogInfo->EMAIL_TYPE  = 1;
                        $emailLogInfo->save();  
                    }
                    
                    $emailProjectmManagerPersonEmail = EmailLogs::where('EMAIL', $salesHeaderInfo->PROJECTMANAGER_EMAIL)
                        ->where('DATE',  date('Y-m-d'))
                        ->where('PO_NO',  $poNoInfo)
                        ->where('TYPE',  5)
                        ->where('EMAIL_TYPE', 2)
                        ->first();
                        
                    if(empty($emailProjectmManagerPersonEmail)) {
                            
                        EmailLogs::sendEMailGlobal($salesHeaderInfo->PROJECTMANAGER_EMAIL, $title, $body, $poNoInfo);
                        
                        $emailLogInfo = new EmailLogs();
                        $emailLogInfo->PO_NO     = $poNoInfo;
                        $emailLogInfo->EMAIL     = $salesHeaderInfo->PROJECTMANAGER_EMAIL;
                        $emailLogInfo->TITLE     = $title;
                        $emailLogInfo->BODY      = $body;
                        $emailLogInfo->SUBJECT   = $title;
                        $emailLogInfo->DATE      = date('Y-m-d');
                        $emailLogInfo->TYPE      = 5; // All po no confirmed GRD
                        $emailLogInfo->EMAIL_TYPE  = 2;
                        $emailLogInfo->save();
                    }
                    
                    
                
            // }
        }
    }
        
}