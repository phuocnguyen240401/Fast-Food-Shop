<?php

namespace App\Jobs;

use App\Mail\OrderShipped;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $email;
    public function __construct($email)
    {
        //
    $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
       //echo($this->email);
       // hàm sendmail này thì trong send phải chứa một đối tượng để gửi mail vì vậy phải tạo một đối tượng là orderShipped bằng new
       // tạo một đối tượng gửi mail bằng cú pháp: php arisan make:mail Ordershipped
       Mail::to($this->email)->send(new OrderShipped());
       // sau khi tạo là phải cấu hình mail để thực hiện được việc gửi mail
    }
}
