<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class LogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $email; //kendimiz tanımladık.
    //public tries=1;//başarısız olursa kaçkez denensin
    public function __construct($email) //$email kendimiz çektik.route içerisinde dispacth ile çektik.
    {
        $this->email=$email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() //kuyruğu ne zaman çalıştırırsak aşağıdaki işlem çalışır
    {
        Log::info($this->email); //kuyrukta ne yapmak istiyoruz. Burda örnek olarak bize gelen email adresini loga bastık . storage\logs\laravel.log dosyası içerisine bu email adresleri kuyruğu çalıştırdığımızda işler. Önce routta yazan adrese gittik .env dosyası içerisinde database yazdığı için ilk olarak database yazdırdık. Daha sonra kuyruğu php artisan queue:work yazdığımızda kuyruk çalıştığı ve storage\logs\laravel.log dosyası içerisine logu yazdık
    }
}
