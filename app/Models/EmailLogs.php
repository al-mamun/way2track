<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\FrontMail;
use App\Models\Settings;

class EmailLogs extends Model
{
    use HasFactory;
    protected $table = 'w2t_email_logs';
    
    static public function sendEMailGlobal($email, $title, $body, $pono) {
        $data = array(
            'name'         => "way2track",
            'from_name'    => $title,
            'from_email'   => $email,
            'from_message' => $body,
            'email'        => $email,
            'WIP'          => $pono,
            'project_name' => $title,
         );
       
        Mail::send(['html' => 'mail.global_template'], compact('data'), function($message) use ($data) {
            $message->to($data['email'], 'Devpt')->subject
                ($data['project_name']);
            $message->from('info@way2track.com',$data['project_name']);
                     
        });
         return 200;
        
    }
  
}
