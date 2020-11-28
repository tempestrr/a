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
	$domain = ['wwjmp.com', 'esiix.com', '1secmail.com', '1secmail.net', '1secmail.org'];
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

	echo "Try to register\n";
	$register = post('https://android.swirge.com/requests.php?f=register', 'username='.$username[0].'&email='.$email.'&password='.$password.'&confirm_password='.$password.'&gender='.$gender[$randoms].'&accept_terms=on', $headers);
	if (stripos($register, 'Registration successful!')) {
		echo "Success to register\n";
		echo "Delay 5 seconds\n";
		sleep(5);
		echo "Try to get email verif account\n";
		$getmsg = get('https://www.1secmail.com/api/v1/?action=getMessages&login=argonokurniawan18&domain=wwjmp.com');
		$id = fetch_value($getmsg, '"id":',',"');

		if (stripos($getmsg, 'Account Activation')) {
			echo "Email verification found!\n";
			$readmsg = get('https://www.1secmail.com/api/v1/?action=readMessage&login=argonokurniawan18&domain=wwjmp.com&id='.$id);
			$json = json_decode($readmsg, true);
			$link = fetch_value($json['htmlBody'], '<a href="','" class="btn-primary"');
			echo $final = get($link, $headers);
			echo "\n";
		} else {
			echo "Email not found\n";
		}
	} else {
		echo "Failed to register\n";
	}
}



?>
