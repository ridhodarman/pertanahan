<?php 
// The data to be encrypted
$data = 2000000000;

// The encryption key and initialization vector (IV)
$key = 'secret';
$iv = random_bytes(16);
// Encrypt the data using AES-256-CBC
$encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
// Decrypt the data using AES-256-CBC
$decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
// Output the decrypted data
echo $decrypted; // Output: This is a secret message
echo $encrypted; // Output: This is a secret message
?>