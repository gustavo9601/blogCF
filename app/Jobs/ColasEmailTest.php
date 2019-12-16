<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


use Illuminate\Support\Facades\Mail;
use App\Mail\UserWelcome;

class ColasEmailTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Simulando un envio masivo de emails

        for ($i = 0; $i <= 2; $i++) {


            $user = [
                'name' => 'Gustavo Marquez ' . $i,
                'email' => 'mail' . $i . '@gmail.com'
            ];
            Mail::to($user['email'])->send(new UserWelcome($user));

            sleep(5);  //Generamos un retardo
        }
    }
}
