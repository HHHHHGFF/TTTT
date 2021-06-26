# HETING
هل صليت على النبي الحبيب اليوم
<?php
// 𝐖𝐄𝐋𝐂𝐎𝐌𝐄 𝐓𝐎 𝐓𝐇𝐄 𝐅𝐈𝐒𝐇𝐈𝐍𝐆 𝐓𝐎𝐎𝐋 𝐀𝐂𝐂𝐎𝐔𝐍𝐓𝐒 𝐏𝐑𝐎𝐆𝐑𝐀𝐌𝐌𝐄𝐃 𝐁𝐘 @CRSTEAANO
$accounts = json_decode(file_get_contents('accounts.json'),1);
$config = json_decode(file_get_contents('config.json'),1);
$file = $config['for'];
$id = $config['id'];
$words = explode(' ',$config['words']);
$token = $config['token'];
include 'index.php';
$a = file_exists('a') ? file_get_contents('a') : 'ap';
if($a == 'new'){
	file_put_contents($file, '');
}
$from = 'HashTag';
$mid = bot('sendMessage',[
		'chat_id'=>$id,
		'text'=>"*Collection From* ~ [ _ $from _ ]\n\n*Status* ~> _ Working _\n*Users* ~> _ ".count(explode("\n", file_get_contents($file)))."_",
	'parse_mode'=>'markdown',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
			[['text'=>'Stop.','callback_data'=>'stopgr']]
		]])
	])->result->message_id;
$tag = urlencode($config['words']);
$url = "https://i.instagram.com/api/v1/feed/tag/$tag/?rank_token=caf8d67a-5140-4fcd-a795-e2a9047dc5d9";
$ids = [];
$posts = [];
	$explore = curl_init();
	curl_setopt($explore, CURLOPT_URL, $url);
	curl_setopt($explore, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($explore, CURLOPT_HTTPHEADER, array(
							'Host: i.instagram.com',
							'Connection: keep-alive',
							'X-IG-Connection-Type: WIFI',
							'X-IG-Capabilities: 3Ro=',
							'Accept-Language: ar-AE',
							'Cookie: '.$accounts[$file]['cookies'],
							'User-Agent: '.$accounts[$file]['useragent']
					));
	$res = curl_exec($explore);
	curl_close($explore);
	$json = json_decode($res);
	file_put_contents('tag', json_encode($json,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
	foreach($json->ranked_items as $item){
		if(!in_array($item->id, $posts)){
			$posts[] = $item->id;
		}
