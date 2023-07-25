<?php

namespace App\Jobs;

use App\Events\NotifyNewJob;
use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Feed;

class FetchRSS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        event(new NotifyNewJob());
        // $rss = Feed::loadRss('https://larajobs.com/feed');
        // $allNotifications = Notification::all();

        // foreach ($rss->item as $item) {
        //     $guid = $this->getGuid($item->link);
        //     if (!$guid) {
        //         continue;
        //     }

        //     Log::info('FetchNewJobs', ['guid' => $guid]);

        //     if (!$allNotifications->contains('guid', '=', $guid)) {
        //         $notificationModel = new Notification([
        //             'guid' => $guid,
        //             'link' => array_values((array)$item->link)[0] ?? '',
        //             'title' => array_values((array)$item->title)[0] ?? '',
        //             'creator' => array_values((array)$item->{'dc:creator'})[0] ?? '',
        //             'category' => array_values((array)$item->category)[0] ?? '',
        //             'pubDate' => date('Y-m-d H:i:s', strtotime(array_values((array)$item->pubDate)[0])) ?? ''
        //         ]);
        //         $notificationModel->save();
        //     }
        // }

        // if (!empty($notExistsNotifications)) {
        //     $notification = new Notification($client);
        //     $newMessageCount = count($notExistsNotifications);
        //     if ($newMessageCount > 1) {
        //         $notification->title("There are $newMessageCount jobs available !")
        //         ->message('Click to see jobs')
        //         ->show();
        //     } else {
        //         $onlyNotification = $notExistsNotifications[0];
        //         $notification->title($onlyNotification->title)
        //         ->message("Click to see job description!")
        //         ->show();
        //     }
        // }
    }

    public function getGuid($link)
    {
        preg_match('/job\/(\d+)/', $link, $matches);
        return $matches[1] ?? false;
    }
}
