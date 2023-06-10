<?php

namespace App\Http\Controllers;

use App\Mail\FrontMail;
use App\Models\Settings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\SalesOrderHeader;

class MailController extends Controller
{
    public function mail(Request $request)
    {
     
        // $settings = Settings::first();
        // $email = "";
        
       
        // echo "HTML Email Sent. Check your inbox.";   
        
    
        // try{
             $salesOrderInfo = SalesOrderHeader::where('WIP', $request->order_id)->first();
             
            if($request->mode == "sales"){
                
                // $email = $settings->sales_mail ? $settings->sales_mail : "sales@mail.com";

                $data = array(
                     'name'=>"way2track",
                     'from_name'=> $request->name,
                     'from_email'=> $request->customer_email,
                     'from_message'=> $request->message,
                     'email'=> $salesOrderInfo->SALESPERSON_EMAIL,
                     'WIP'=> $request->order_id,
                     'project_name'=> $salesOrderInfo->PROJECT_NAME,
                 );
               
                 Mail::send(['html' => 'mail'], compact('data'), function($message) use ($data) {
                     $message->to($data['email'], 'Devpt')->subject
                        ($data['project_name']);
                     $message->from('info@way2track.com','way2track-WIP-'.$data['WIP']);
                });
            }else {
           
                // $email = $settings->manager_mail ? $settings->manager_mail : "manager@mail.com";
                // $email = $settings->sales_mail ? $settings->sales_mail : "sales@mail.com";
                
                  $data = array(
                     'name'         => "way2track",
                     'from_name'    => $request->name,
                     'from_email'   => $request->customer_email,
                     'from_message' => $request->message,
                     'email'        => $salesOrderInfo->PROJECTMANAGER_EMAIL,
                     'WIP'          => $request->order_id,
                     'project_name'=> $salesOrderInfo->PROJECT_NAME,
                 );
                 
                Mail::send(['html' => 'mail'], compact('data'), function($message) use ($data) {
                 $message->to($data['email'], 'way2track')->subject
                    ($data['project_name']);
                 $message->from('info@way2track.com','way2track-WIP-'.$data['WIP']);
                });
            }

            // Mail::to($email)->send(new FrontMail($request));
            return back()->with([
                'status' => 1,
                'success' => "Your email is send.",
            ]);;
            
        // }catch(Exception $e){

        // }

    }
    
    public function poNumberWiseConfirmGrdMail() {
        
    }
}
