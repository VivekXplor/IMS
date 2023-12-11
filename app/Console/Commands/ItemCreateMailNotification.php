<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Mail;

class ItemCreateMailNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:item-create-mail-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to all users regarding item has been created';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $usersMail = User::select('email')->get();
        $emails = [];
        foreach($usersMail as $mail){
            $emails[] = $mail['email'];
        }

        Mail::send('item_created',[], function($message) use ($emails){
            $message->to($emails)->subject("Regarding Item Creation Cron");
        });
    }
}
