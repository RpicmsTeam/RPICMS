<?php
	include '../secure/aes.php';
	$imputText = "My text to encrypt";
	$imputKey = "dfhrharhaerhaerhaerh";
	$blockSize = 256;
	$aes = new AES($imputText, $imputKey, $blockSize);
	$enc = $aes->encrypt();
	$aes->setData($enc);
	$dec=$aes->decrypt();
	echo "After encryption: ".$enc."<br/>";
	echo "After decryption: ".$dec."<br/>";
?>
