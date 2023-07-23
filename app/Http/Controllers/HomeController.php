<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Native\Laravel\Client\Client;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Notification;

class HomeController extends Controller
{
    public function index()
    {
        // $client = new Client();
        // $notification = new Notification($client);
        // $notification->title('Hello from NativePHP')
        //     ->message('This is a detail message coming from your Laravel app.')
        //     ->show();
        MenuBar::show();
        return view('menu-bar');
    }
}
