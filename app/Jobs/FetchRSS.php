<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchRSS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('worked!');
        $rss = Feed::loadRss('https://larajobs.com/feed-test');
        $client = new Client();

        $notExistsNotifications = new Collection();
        $allNotifications = NotificationModel::all();

        foreach ($rss->item as $item) {
            $guid = $this->getGuid($item->link);
            if (!$guid) {
                continue;
            }

            if (!$allNotifications->contains('guid', $guid)) {
                $notificationModel = new NotificationModel([
                    'guid' => $guid,
                    'link' => $item->link,
                    'title' => $item->title,
                    'creator' => $item->creator,
                    'category' => $item->category,
                    'pubDate' => $item->pubDate
                ]);

                $notificationModel->save();

                $notExistsNotifications->push($notificationModel);
            }
        }

        if ($notExistsNotifications->isNotEmpty()) {
            $notification = new Notification($client);
            $newMessageCount = $notExistsNotifications->count();
            if ($newMessageCount > 1) {
                $notification->title("There are $newMessageCount jobs available !")
                ->message('Click to see jobs')
                ->show();
            } else {
                $onlyNotification = $notExistsNotifications->pop();
                $notification->title($onlyNotification->title)
                ->message("Click to see job description!")
                ->show();
            }
        }

        foreach ($notExistsNotifications as $notify) {
            echo $notify->title . "\n";
        }
    }

    public function getGuid($link) {
        preg_match('/job\/(\d+)/', $link, $matches);
        return $matches[1] ?? false;
    }
}
