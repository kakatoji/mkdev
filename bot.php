<?php

function url($url){
    $pet="http://universal.mkdevelopmentbackend.de:5005".$url;
    return $pet;
}

function head(){
    $head=[
      "Content-Type"=>"application/json; charset=utf-8",
      "User-Agent"=> "Dalvik/2.1.0 (Linux; U; Android 7.0; Redmi Note 4 MIUI/V11.0.2.0.NCFMIXM)"
      ];
      foreach ($head as $cut => $body){
        $mh[]=$cut.": ".$body;
      }
      return $mh;
  }
function md6($int){
$randomness = array("3","4","7","12","75","23","12","4","7","54","32","23","54","3","12","3","4","7","12","75","23","12","4","7","54","32","25","54","3","12","34","3","23","4","22","12","3");

$numbI = $int*3+6;
$int = ($int*2)+17;

$rnds[] = ":R";
for ($i3=0;$i3<15;$i3+=2){
    $rnds[] = $randomness[$i3]*$int;
}
return implode($rnds);
}
function exip(){
#  $i=shell_exec('ifconfig');
#  if(preg_match('/tun0/i',$i)){
#    echo "\e[1;31mVpn aktif,dilarang keras menggunakan vpn\e[0m\n";
#    exit;
  }
#}
function curl ($url, $post = 0, $httpheader = 0, $proxy = 0){ // url, postdata, http headers, proxy, uagent
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        if($post){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if($httpheader){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        }
        if($proxy){
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        }
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
        }
    }  
function ban(){
  $ban='
 __       __  __              __                     
|  \     /  \|  \            |  \                    
| $$\   /  $$| $$   __   ____| $$  ______  __     __ 
| $$$\ /  $$$| $$  /  \ /      $$ /      \|  \   /  \
| $$$$\  $$$$| $$_/  $$|  $$$$$$$|  $$$$$$\\$$\ /  $$
| $$\$$ $$ $$| $$   $$ | $$  | $$| $$    $$ \$$\  $$ 
| $$ \$$$| $$| $$$$$$\ | $$__| $$| $$$$$$$$  \$$ $$  
| $$  \$ | $$| $$  \$$\ \$$    $$ \$$     \   \$$$   
 \$$      \$$ \$$   \$$  \$$$$$$$  \$$$$$$$    \$ 
 ';
  echo "\e[1;36m".$ban."\e[0m\n";
  echo "\t\t\t\t\t\e[1;35mKAKATOJI\e[0m\n";

}
function war(){
  $ar=array("\e[1;31m","\e[1;32m","\e[1;33m","\e[1;34m","\e[1;35m","\e[1;36m");
  $arr=array_rand($ar);
  return $ar[$arr];
}
function love(){
  echo "~~~~".war()."~~~~~".war()."~~~~".war()."~~~~~".war()."~~~~~".war()."~~~~~".war()."~~~~~".war()."~~~~~~~~".war()."~~~~~".war()."~~~~~~~~~~\e[0m\n";
}
function save($data,$data_post){
    if(!file_get_contents($data)){
      file_put_contents($data,"[]");}
    $json=json_decode(file_get_contents($data),1);
    $arr=array_merge($json,$data_post);
    file_put_contents($data,json_encode($arr,JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES));
  }
function input(){
    $mk=readline("\e[1;31m~>\e[1;32mMkdev\e[1;36m: ");
    $rf=readline("\e[1;31m~>\e[1;32mCode Reff Mkdev\e[1;36m: ");
    $id=readline("\e[1;31m~>\e[1;32mIDMkdev\e[1;36m: ");
    $api=str_replace("\u003d","=",readline("\e[1;31m~>\e[1;32mAPIMkdev\e[1;36m: "));
    $data=[$mk=>["Referal"=>$rf,"ID"=>$id,"Api_key"=>$api]];
    save('config.json',$data);
  
}
function info($api,$id){
    $url=url('/api/User/GetUserInfo');
    $data=json_encode(["API_Key"=>$api,"ID"=>$id]);
    return json_decode(curl($url,$data,head())[1],1);
}
function dail($val1,$api,$ID){
  $url=url('/api/Video/DailyLoginVideo');
  $data = json_encode(["Validation"=>$val1,"API_Key"=>$api,"ID"=>$ID]);
  return json_decode(curl($url,$data,head())[1],1);
}
function hor($val1,$api,$ID){
  $url=url('/api/Video/HourlyVideo');
  $data = json_encode(["Validation"=>$val1,"API_Key"=>$api,"ID"=>$ID]);
  return json_decode(curl($url,$data,head())[1],1);
}
function scrt($validation1,$validation2,$api,$ID){
  $url=url('/api/Scratch/StartScratching');
  $data=json_encode(["Validation"=>$validation1,"Validation2"=>$validation2,"API_Key"=>$api,"ID"=>$ID]);
  return json_decode(curl($url,$data,head())[1],1);
}
function wd($mail,$api,$ID,$amount){
  $url=url('/api/Payout/PayPal');
  $data=json_encode(["EMail"=>$mail,"API_Key"=>$api,"ID"=>$ID,"Amount"=>$amount]);
  return json_decode(curl($url,$data,head())[1],1);
}
  $cr=shell_exec('clear');
  back:
   echo $cr;
   ban();
   love();
   exip();
  echo "\e[1;31m[\e[1;37m1\e[1;31m]\e[1;32mInput akun MKdev\n";
  echo "\e[1;31m[\e[1;37m2\e[1;31m]\e[1;32mRun All akun MKdev\n";
  echo "\e[1;31m[\e[1;37m3\e[1;31m]\e[1;32mSet witdhrawl akun MKdev\n";
  $menu=readline("\e[1;31m~>\e[1;33mpilih:\e[1;36m ");
    switch($menu) {
      case 1:
        echo $cr;
        ban();
        love();
        input();
        echo "\e[1;33mSuksess input Akun MKdev\n";
        sleep(2);
        goto back;
        break;
      case 2:
        echo $cr;
        ban();
        love();
      while(1):
        exip();
        $data=json_decode(file_get_contents('config.json'),1);
        $mail=json_decode(file_get_contents('email.json'),1);
    foreach($data as $head =>$body){
    //echo $head;die();
    $info=info($body['Api_key'],$body['ID']);
    $val1=md5($body['ID']+$info['diamonds']+10);
    $val2=md6($info['diamonds']);
    $dail=dail($val1,$body['Api_key'],$body['ID']);
    $hor=hor($val1,$body['Api_key'],$body['ID']);
    $claim=scrt($val1,$val2,$body['Api_key'],$body['ID']);
    $s=$claim['slot1']+$claim['slot2']+$claim['slot3'];
     if($info['scratches'] != 0){
        echo $head." \e[1;33mDiamond \e[1;36m".$info['diamonds']." \e[1;31m| \e[1;33mscrath \e[1;36m".$info['scratches']." \e[1;31m|\e[1;33m collect \e[1;36m".$s."\e[0m\n";
     }else{
      echo $head." \e[1;31mSedang ngopi\e[0m\n";}
    if($dail['amount'] != 0){
      echo "\e[1;35m success daily reward \e[1;36m".$dail['amount']."\e[0m\n";}
    if($hor['amount'] != 0){
      echo "\e[1;35m success horly reward \e[1;36m".$hor['amount']."\e[0m\n";}
    if($info['diamonds'] >= "4999"){
      $no=5000;
       $wd=wd($mail['email'],$body['Api_key'],$body['ID'],$no);
       if($wd['success'] != 0){
         echo "\e[1;33mSuccess witdhrawl \e[1;36m".$mail['email']."\e[0m\n";
       }else{
         echo "\e[1;32mStatus wd \e[0;31m".$wd['additonalText']."\e[0m\n";
       }
    }
  love();
    }
    endwhile;  
        break;
      case 3:
        echo $cr;
        ban();
        love();
        exip();
        echo "\e[1;31m~>\e[1;32mEmail Paypal\e[0m \e[1;36m";
        $mail=trim(fgets(STDIN));
        $data=["email"=>$mail];
        save('email.json',$data);
        echo "\e[1;33mSukses input email\e[0m\n";
        sleep(2);
        goto back;
        break;
    }
  
