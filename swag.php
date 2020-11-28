<?php  

include 'function.php';




while (true) {
	$fake_name = get('https://fakenametool.net/generator/random/id_ID/indonesia');
	preg_match_all('/<td>(.*?)<\/td>/s', $fake_name, $result);

	$name = $result[1][0];
	$user = explode(' ', $name);
	$alamat = $result[1][2];
	$base = ['878', '813', '838', '851', '853'];
	$rand_base = array_rand($base);
	$number = $base[$rand_base].number(8);
	$domain = ['wwjmp.com', 'esiix.com'];
	$rand = array_rand($domain);
	$email = str_replace(' ', '', strtolower($name)).number(2).'@'.$domain[$rand];
	$username = explode('@', $email);
	$password = random(8);



	$page = get('https://android.swirge.com/register?ref=yudhatira');


	$headers = array();
	$headers[] = 'Connection: keep-alive';
	$headers[] = 'Accept: */*';
	$headers[] = 'X-Requested-With: XMLHttpRequest';
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36';
	$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
	$headers[] = 'Origin: https://android.swirge.com';
	$headers[] = 'Sec-Fetch-Site: same-origin';
	$headers[] = 'Sec-Fetch-Mode: cors';
	$headers[] = 'Sec-Fetch-Dest: empty';
	$headers[] = 'Referer: https://android.swirge.com/register?ref=yudhatira';
	$headers[] = 'Accept-Language: id-ID,id;q=0.9';

	$gender = ['male', 'female'];
	$randoms = array_rand($gender);


	echo $register = post('https://android.swirge.com/requests.php?f=register', 'username='.$username[0].'&email='.$email.'&password='.$password.'&confirm_password='.$password.'&gender='.$gender[$randoms].'&accept_terms=on', $headers);
	echo "\n";
}



?>