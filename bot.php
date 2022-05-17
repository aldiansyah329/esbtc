<?php
error_reporting(0);
$res="\033[0m";
$hitam="\033[0;30m";
$abu2="\033[1;30m";
$putih="\033[0;37m";                                                                                 $putih2="\033[1;37m";
$red="\033[0;31m";
$red2="\033[1;31m";
$green="\033[0;32m";
$green2="\033[1;32m";
$yellow="\033[0;33m";                                                                                $yellow2="\033[1;33m";
$blue="\033[0;34m";
$blue2="\033[1;34m";
$purple="\033[0;35m";
$purple2="\033[1;35m";
$lblue="\033[0;36m";                                                                                 $lblue2="\033[1;36m";
$HITAM="\033[40m";
$MERAH="\033[41m";
$HIJAU="\033[42m";
$KUNING="\033[43m";
$BIRU="\033[44m";                                                                                    $UNGU="\033[45m";
$CYAN="\033[46m";
$PUTIH="\033[47m";
$Off="\033[0m";
include "cfg.php";
system ("clear");

function timer($tmr)
    {
        $timr = time() + $tmr;
        while (true):
	echo "\r                       \r";
            $res = $timr - time();
            if ($res < 1)
            {
                break;
           }
	echo $putih2."├─[".$yellow2."!".$putih2."]".$green2." Wait \033[1;37m" . date('H:i:s', $res);
            sleep(1);
        endwhile;
    }
function eco($str){
foreach(str_split($str) as $ne){
echo $ne;
usleep(20000);
}
echo "\n";
}


function ex($awal,$akhir,$inti,$res){
$a=explode($awal,$res);
$b=explode($akhir,$a[$inti]);
return $b[0];
}

function post($link,$data,$ua){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
  curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
  return curl_exec($ch);
}
function get($link,$ua){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_HEADER,1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
  return curl_exec($ch);
}
if(!file_exists("config.json")){
while("true"){
$api["Uid"]=readline($green2."[!] Input Uid : ".$putih2);
if($api["Uid"]!=""){
break;
}
}
  save("config.json",$api);
}
$uid=json_decode(file_get_contents("config.json"),true)["Uid"];
system("clear");
function save($data,$data_post){
    if(!file_get_contents($data)){
    file_put_contents($data,"[]");}
    $json=json_decode(file_get_contents($data),1);
    $arr=array_merge($json,$data_post);
    file_put_contents($data,json_encode($arr,JSON_PRETTY_PRINT));
}


$ua = array(
"Host: es.btcnewz.com",
"accept: */*",
  );

$link = "https://es.btcnewz.com/user/miner/2?uid=".$uid;
$res = get($link,$ua);
$a = explode('<h4 class="panel-title">ES-Coin Miner For ',$res)[1];
$man=explode('</h4>',$a)[0];
$a = explode('set-cookie: ',$res)[1];
$cok=explode(';',$a)[0];

if($man<=null){
eco($red2."[x] Uid salah...");
system("rm -rf config.json");
exit;
}

eco($putih2."╭─[".$yellow2."•".$putih2."]──────────────────────────────────────────");
eco($putih2."├─[".$yellow2."!".$putih2."] ".$green2."Welcome : ".$putih2.$man);
eco($putih2."├─[".$yellow2."•".$putih2."]──────────────────────────────────────────");
echo $putih2."├─[".$red2."•".$putih2."] ".$yellow2."Mining ~> ".$putih2."121";
for($angka=1;$angka<=1000000000000000000000;$angka++){
$mantap = $angka*121+99;
$ua = array(
"Host: es.btcnewz.com",
"content-length: 0",
"accept: */*",
"user-agent: Mozilla/5.0 (Linux; Android 11; M2103K19G Build/RP1A.200720.011;) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/92.0.4515.131 Mobile Safari/537.36",
"x-requested-with: XMLHttpRequest",
"origin: https://es.btcnewz.com",
"sec-fetch-site: same-origin",
"sec-fetch-mode: cors",
"sec-fetch-dest: empty",
"referer: https://es.btcnewz.com/user/miner/2?uid=".$uid,
"cookie: ".$cok,
"content-type: application/x-www-form-urlencoded",
  );


$link = "https://es.btcnewz.com/user/miner/reward/2?uid=".$uid."&hps=8&as=0&th=".$mantap;
$data = "";
$res = post($link,$data,$ua);
$a = explode('hashes":',$res)[1];
        $kon1=explode(',"',$a)[0];
$a = explode('reward":',$res)[1];
        $rew=explode(',"',$a)[0];
$a = explode('lts":',$res)[1];
        $kon2=explode(',"identifer',$a)[0];
$a = explode('totalHash":',$res)[1];
        $kon3=explode(',"v',$a)[0];
$a = explode('validShares":',$res)[1];
        $kon4=explode(',"',$a)[0];
$a = explode('invalidShares":',$res)[1];
        $kon5=explode('}}',$a)[0];
if ($rew==""){
}else{
$bet1 = number_format($rew,12);
}
if ($kon2==""){
echo "\r                                                       \r";
echo $putih2."├─[".$red2."•".$putih2."] ".$yellow2."Mining ~> ".$putih2.$mantap;
}else{
echo "\r                                                       \r";
eco($putih2."├─[".$green2."•".$putih2."] ".$yellow2."Hashes         : ".$putih2.$kon1);
eco($putih2."├─[".$green2."•".$putih2."] ".$yellow2."Reward         : ".$green2.$bet1);
eco($putih2."├─[".$green2."•".$putih2."] ".$yellow2."ID             : ".$green2.$kon2);
eco($putih2."├─[".$green2."•".$putih2."] ".$yellow2."Total Hash     : ".$purple.$kon3);
eco($putih2."├─[".$green2."•".$putih2."] ".$yellow2."Valid Shares   : ".$green2.$kon4);
eco($putih2."├─[".$green2."•".$putih2."] ".$yellow2."Invalid Shares : ".$red2.$kon5);
eco($putih2."├─[".$yellow2."•".$putih2."]──────────────────────────────────────────");
}



}
