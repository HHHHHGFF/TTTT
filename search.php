# HETING
هل صليت على النبي الحبيب اليوم
<?php
// 𝐖𝐄𝐋𝐂𝐎𝐌𝐄 𝐓𝐎 𝐓𝐇𝐄 𝐅𝐈𝐒𝐇𝐈𝐍𝐆 𝐓𝐎𝐎𝐋 𝐀𝐂𝐂𝐎𝐔𝐍𝐓𝐒 𝐏𝐑𝐎𝐆𝐑𝐀𝐌𝐌𝐄𝐃 𝐁𝐘 @CRSTEAANO
$chars = range('a', 'z');
$nums = range(0,9);
$chars = array_merge($chars, $nums);
$i = 0;
$e = 15;
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
$from = 'Search';
$mid = bot('sendMessage',[
		'chat_id'=>$id,
		'text'=>"*Collection From* ~ [ _ $from _ ]\n\n*Status* ~> _ Working _\n*Users* ~> _ ".count(explode("\n", file_get_contents($file)))."_",
	'parse_mode'=>'markdown',
	'reply_markup'=>json_encode(['inline_keyboard'=>[
			[['text'=>'Stop.','callback_data'=>'stopgr']]
		]])
	])->result->message_id;
foreach($words as $word){
foreach($chars as $char){
$word1 = $word."$char";
$word1 = urlencode($word1);
$search = curl_init(); 
curl_setopt($search, CURLOPT_URL, "https://www.instagram.com/web/search/topsearch/?query=$word1"); 
curl_setopt($search, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($search, CURLOPT_ENCODING , "");
curl_setopt($search, CURLOPT_HTTPHEADER, [
				'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
				'accept-language: en-US,en;q=0.9',
				'cache-control: max-age=0',
				'cookie: '.$accounts[$file]['cookies'],
				'user-agent: '.$accounts[$file]['useragent']
			]);
$search = curl_exec($search);
$search = json_decode($search);
$aa = [];
$for = $config['for'];
