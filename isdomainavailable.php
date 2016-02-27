<?php

$DomainList = $argv[1];
$ApiKey = "427e4a2254db4208a5f5b87e74cb20a8";

$xml = file_get_contents("https://api.namecheap.com/xml.response?ApiUser=blackhatcomputers&ApiKey=$ApiKey&UserName=blackhatcomputer&Command=namecheap.domains.check&ClientIp=45.33.75.113&DomainList=$DomainList");

print_r($xml);



