<?php

class encrypt_decrypt
{

	function encrypt_decrypt($action, $string)
	{
		$output = false;

		$key = 'texto_x';

		$iv = md5(md5($key));

		if( $action == 'encrypt' )
		{
			$output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' )
		{
			$output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
			$output = rtrim($output, "");
		}
		return $output;
	}

}

?>