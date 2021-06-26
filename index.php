# HETING
هل صليت على النبي الحبيب اليوم
<?php
function status($for){
    if($for == '1'){
        $x = exec('screen -S mails1 -Q select . ; echo $?');
    } elseif($for == '2'){
        $x = exec('screen -S mails2 -Q select . ; echo $?');
    }
    if($x == '0'){
        return 'Running.';
    } else {
        return 'Stopped.';
    }
    
    
  
}




function checkMail($mail){
$mail = strtolower($mail);
        if(mb_substr($mail, -10) === '@gmail.com'){
            return checkGmail($mail);
        } elseif(preg_match('/(live|hotmail|outlook)\.(.*)/', $mail)){
            return checkHotmail(newURL(),$mail);
        } elseif(strpos($mail, 'yahoo.com')){
            return checkYahoo($mail);
        } elseif(preg_match('/(mail|bk|yandex|inbox|list)\.(ru)/i', $mail)){
            return checkRU($mail);
        } elseif(strpos($mail, 'aol.com')){
            	return checkAol($mail);
        } else {
            return false;
            
        }
}
function bot($method,$datas=[]){
    global $token;
$url = "https://api.telegram.org/bot".$token."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
