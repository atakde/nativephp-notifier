<?php

namespace App\Http\Controllers;

use Feed;
use App\Models\Notification as NotificationModel;
use Native\Laravel\Client\Client;
use Native\Laravel\Notification;
use Illuminate\Database\Eloquent\Collection;

class NotificationController extends Controller
{
    public function fetch()
    {
        $rss = Feed::loadRss('https://larajobs.com/feed-test');
        $client = new Client();
        $notExistsNotifications = [];
        $allNotifications = NotificationModel::all();

        foreach ($rss->item as $item) {
            $guid = $this->getGuid($item->link);
            if (!$guid) {
                continue;
            }


            if (!$allNotifications->contains('guid', '=', $guid)) {
                $notificationModel = new NotificationModel([
                    'guid' => $guid,
                    'link' => array_values((array)$item->link)[0] ?? '',
                    'title' => array_values((array)$item->title)[0] ?? '',
                    'creator' => array_values((array)$item->{'dc:creator'})[0] ?? '',
                    'category' => array_values((array)$item->category)[0] ?? '',
                    'pubDate' => array_values((array)$item->pubDate)[0] ?? ''
                ]);
                $notificationModel->save();

                $notExistsNotifications[] = $notificationModel;
            }
        }

        if (!empty($notExistsNotifications)) {
            $notification = new Notification($client);
            $newMessageCount = count($notExistsNotifications);
            if ($newMessageCount > 1) {
                $notification->title("There are $newMessageCount jobs available !")
                ->message('Click to see jobs')
                ->show();
            } else {
                $onlyNotification = $notExistsNotifications[0];
                $notification->title($onlyNotification->title)
                ->message("Click to see job description!")
                ->show();
            }
        }

        return $notExistsNotifications;
    }

    public function getGuid($link) {
        preg_match('/job\/(\d+)/', $link, $matches);
        return $matches[1] ?? false;
    }
}
