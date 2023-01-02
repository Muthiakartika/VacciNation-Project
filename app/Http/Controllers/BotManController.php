<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
       // Note nnti kata"nya diubah
        $botman->hears('{message}', function($botman, $message) {
            if ($message == 1) {
               $botman->reply("Status vaksinasi pending berarti request yang anda kirimkan masih belum
               di proses oleh admin rumah sakit yang berkaitan, harap menunggu sekitar 2-3 hari kerja. <br><br>
               Pending vaccination status means that the request you sent has not been processed by the relevant
               hospital admin, please wait around 2-3 working days",['parse_mode'=>'HTML']);
            } elseif($message == 2){
                $botman->reply("Penolakan request vaksinasi berarti anda belum diperbolehkan mendapat
                vaksinasi, alasan penolakan dapat anda lihat beserta email penolakan
                yang dikirimkan ke alamat email anda.<br><br>
               The rejection of a vaccination request means that you have not been allowed to get vaccinated,
               you can see the reasons for the rejection inside the rejection email sent to your email address",['parse_mode'=>'HTML']);
            }elseif($message == 3){
                $botman->reply("Bisa. Anda dapat memilih rumah sakit yang anda inginkan atau memilih
                rumah sakit berdasarkan jarak terdekat dari lokasi anda.<br><br>
               Yes you can. You can choose the healthcare you want or choose a healthcare based on
               the nearest distance from your location",['parse_mode'=>'HTML']);
            }elseif($message == 4){
                $botman->reply("Silahkan hubungin vnsuper2020@gmail.com dengan judul email “HAPUS AKUN - alamat email”
                yang berisikan alasan penghapusan akun untuk menghapus akun anda.<br><br>
               Please contact vnsuper2020@gmail.com with the email subject “DELETE ACCOUNT - email address”
                containing the reasons for deleting your account to delete your account.",['parse_mode'=>'HTML']);
            }elseif($message == 5){
                $botman->reply("Tidak. Anda tidak diperbolehkan mendaftarkan vaksinasi untuk
                orang lain untuk memastikan keamanan data. <br><br>
              No you can not. You are not allowed to request vaccinations for others to assure data safety.",['parse_mode'=>'HTML']);
            }else{
                $botman->reply("Kode Tidak Ditemukan! Silahkan masukan kode yang benar. <br><br>
                Code Not Found! Please enter the correct code");
            }
        });
        $botman->listen();
    }
}
