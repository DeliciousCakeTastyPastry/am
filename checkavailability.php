<?php
$apikey="1kEWUxgdjXb1IExwa84JuovCe7KzsaYO";
$authuserid="632844";
$domainname="";
$tlds="";

$domain=$argv[1];
$array=explode(".", $domain);
$domainname=$array[0];
$tlds=$array[1];

$url="https://test.httpapi.com/api/domains/available.json?auth-userid=" . "$authuserid" . "&api-key=" . "$apikey" . "&domain-name=" . "$domainname" . "&tlds=" . "$tlds";
$r=file_get_contents($url);
$d=json_decode($r, true);
if($d[$domain]['status'] == "available"){
echo "Domain is available to register!";
$available="true";}
else {
echo "Domain is taken!";
$available="false";}
?>
