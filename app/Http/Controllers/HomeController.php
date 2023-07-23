<?php

namespace App\Http\Controllers;

use App\Models\Notification as NotificationModel;
use Native\Laravel\Client\Client;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Notification;
use Feed;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notification as NotificationsNotification;

class HomeController extends Controller
{
    public function index()
    {
        $notViewed = NotificationModel::notViewed();
        return view('menu-bar')->with('data', $notViewed);
    }
}
