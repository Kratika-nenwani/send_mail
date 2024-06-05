<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Mail\DemoMail;
use App\Models\User;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Admissions Open for 2024-25 at Little Millennium Scheme No. 54, Indore',
            'body' => 'Little Millennium',
        ];
        
        $recipients = [
            'kratikanenwani@gmail.com',
            'anshu28007@gmail.com',
            'aayushpatidar04@gmail.com',
        ];
    
        foreach ($recipients as $recipient) {
            Mail::to($recipient)->send(new DemoMail($mailData));
        }
        
        dd('Emails Sent Successfully');
    }
    
    public function updateDeviceToken(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->device_token = $request->token;
        $user->save();

        return response()->json(['Token successfully stored.']);
    }

    public function sendNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();
            
        $serverKey = 'AAAAe9WPZp0:APA91bHxvK427o3hqNJU7j1kLuDvLwp6G19OYIU1YeIl80WF_vOtEU0kIXM0-l10aYB0ZSvVdyuVZoQGLSYlLxKhitax-V7B4wUmAv50FCp63q_wyht3PH0biFqMKVPU4kCw8qdP_rit'; // ADD SERVER KEY HERE PROVIDED BY FCM
    
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => 'Testing',
                "body" => 'Dev. Aayush',  
            ]
        ];
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        
        // Close connection
        curl_close($ch);
        // FCM response
        dd($result);
    }


}
