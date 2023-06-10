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
     
<<<<<<< HEAD
        // $settings = Settings::first();
        // $email = "";
=======
        $settings = Settings::first();
        $email = "";
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        
       
        // echo "HTML Email Sent. Check your inbox.";   
        
    
        // try{
             $salesOrderInfo = SalesOrderHeader::where('WIP', $request->order_id)->first();
             
            if($request->mode == "sales"){
                
<<<<<<< HEAD
                // $email = $settings->sales_mail ? $settings->sales_mail : "sales@mail.com";

                $data = array(
=======
                $email = $settings->sales_mail ? $settings->sales_mail : "sales@mail.com";

                 $data = array(
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                     'name'=>"way2track",
                     'from_name'=> $request->name,
                     'from_email'=> $request->customer_email,
                     'from_message'=> $request->message,
                     'email'=> $salesOrderInfo->SALESPERSON_EMAIL,
                     'WIP'=> $request->order_id,
<<<<<<< HEAD
                     'project_name'=> $salesOrderInfo->PROJECT_NAME,
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                 );
               
                 Mail::send(['html' => 'mail'], compact('data'), function($message) use ($data) {
                     $message->to($data['email'], 'Devpt')->subject
<<<<<<< HEAD
                        ($data['project_name']);
=======
                        ('Sale Person Email');
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                     $message->from('info@way2track.com','way2track-WIP-'.$data['WIP']);
                });
            }else {
           
<<<<<<< HEAD
                // $email = $settings->manager_mail ? $settings->manager_mail : "manager@mail.com";
                // $email = $settings->sales_mail ? $settings->sales_mail : "sales@mail.com";
=======
                $email = $settings->manager_mail ? $settings->manager_mail : "manager@mail.com";
                $email = $settings->sales_mail ? $settings->sales_mail : "sales@mail.com";
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                
                  $data = array(
                     'name'         => "way2track",
                     'from_name'    => $request->name,
                     'from_email'   => $request->customer_email,
                     'from_message' => $request->message,
                     'email'        => $salesOrderInfo->PROJECTMANAGER_EMAIL,
                     'WIP'          => $request->order_id,
<<<<<<< HEAD
                     'project_name'=> $salesOrderInfo->PROJECT_NAME,
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
                 );
                 
                Mail::send(['html' => 'mail'], compact('data'), function($message) use ($data) {
                 $message->to($data['email'], 'way2track')->subject
<<<<<<< HEAD
                    ($data['project_name']);
=======
                    ('Project Manager Email');
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
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
<<<<<<< HEAD
    
    public function poNumberWiseConfirmGrdMail() {
        
    }
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
}
