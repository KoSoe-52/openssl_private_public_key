<?php
 function create_key() {
    $res = openssl_pkey_new();
    if($res == false) return false;
    openssl_pkey_export($res, $private_key);
    $public_key = openssl_pkey_get_details($res);
    return array('public_key'=>$public_key["key"],'private_key'=>$private_key);
}
$key = create_key();
echo $p= $key["public_key"];
echo "<br/>";
echo $pri= $key["private_key"];
$data = "1,3";
$isvalid = openssl_private_encrypt($data, $crypted ,$pri);	
echo "Data encryption : ".base64_encode($crypted);
echo "<br/>";
   $de = openssl_public_decrypt ($crypted, $decrypted ,$p);	
   echo "Data decryption : ";
     print_r(explode(",",$decrypted)); 
?>