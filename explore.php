# HETING
هل صليت على النبي الحبيب اليوم
<?php
// 𝐖𝐄𝐋𝐂𝐎𝐌𝐄 𝐓𝐎 𝐓𝐇𝐄 𝐅𝐈𝐒𝐇𝐈𝐍𝐆 𝐓𝐎𝐎𝐋 𝐀𝐂𝐂𝐎𝐔𝐍𝐓𝐒 𝐏𝐑𝐎𝐆𝐑𝐀𝐌𝐌𝐄𝐃 𝐁𝐘 @CRSTEAANO
date_default_timezone_set('Asia/Baghdad');
if(!file_exists('config.json')){
	$token = readline('Enter Token: ');
	$id = readline('Enter Id: ');
	file_put_contents('config.json', json_encode(['id'=>$id,'token'=>$token]));
	
} else {
		  $config = json_decode(file_get_contents('config.json'),1);
	$token = $config['token'];
	$id = $config['id'];
}

if(!file_exists('accounts.json')){
    file_put_contents('accounts.json',json_encode([]));
}
include 'index.php';
try {
	$callback = function ($update, $bot) {
		global $id;
		if($update != null){
		  $config = json_decode(file_get_contents('config.json'),1);
		  $config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
      $accounts = json_decode(file_get_contents('accounts.json'),1);
			if(isset($update->message)){
				$message = $update->message;
				$chatId = $message->chat->id;
				$text = $message->text;
				if($chatId == $id){
					if($text == '/haa'){
              $bot->sendMessage([
                  'chat_id'=>$chatId,
                  'text'=>"- - HELLO ACTIVATION BY HAA🍯
 ↯Tele↯.                     ↯CH↯
 :-  @E_5_O              :-  @IIQQTQ  .",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'- Add Account .','callback_data'=>'login']],
                          [['text'=>'- Grab Settings .','callback_data'=>'grabber']],
                          [['text'=>'- Start Check .','callback_data'=>'run'],['text'=>'- Stop Check .','callback_data'=>'stop']],
						  [['text'=>'- Tool Status .','callback_data'=>'status']],
						  [['text'=>'- 𝙳𝚎𝚟𝚎𝚕𝚘𝚙𝚎𝚛 𝚌𝚑𝚊𝚗𝚗𝚎𝚕 𝄋 .','url'=>'T.me/E_5_O']],
                      ]
                  ])
              ]);   
