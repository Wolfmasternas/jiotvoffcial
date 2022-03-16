<?php
$p= @file_get_contents("http://localhost/JioTv-Xammp/token.php"); # Change This Path According to Your Server and Folder


# © 2021 Techie Sneh DO NOT EDIT ANYTHING TO KEEP RUNNING


if(@$_REQUEST["key"]!="")
{
	$opts = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: plaYtv/5.8.1 (Linux;Android 9) ExoPlayerLib/2.8.0\r\n" .
		"lbcookie: 300\r\n" .
"devicetype: Kodi\r\n" .
"os: android\r\n" .
"appkey: NzNiMDhlYzQyNjJm\r\n" .
"deviceId: 2f5f4c6443fe0800\r\n" .
"versionCode: 226\r\n" .
"osVersion: 9\r\n" .
"isott: true\r\n" .
"languageId: 6\r\n" .
"uniqueId: 69afb8d1-03a6-4142-a4fb-569ff9766350\r\n" . # Change uniqueId if you chnaged token
"srno: 200206173037\r\n" .
"usergroup: tvYR7NSNn7rymo3F\r\n" .
"channelid: 472\r\n" .
"ssotoken: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWUiOiI2OWFmYjhkMS0wM2E2LTQxNDItYTRmYi01NjlmZjk3NjYzNTAiLCJ1c2VyVHlwZSI6IlJJTHBlcnNvbiIsImF1dGhMZXZlbCI6IjIwIiwiZGV2aWNlSWQiOiJhYmQ4ZTkzYWRiN2Y1ZDU2NjE1ZTA5YTViOTE4NTg4M2VjYzdmMTA0ZmMxNDg3ZGE4MmY2YzEyMzA1ZDY5YmI2Yjk3MjdlMmFlYjIyZmQ0MGNkMDc4ZThhMzUyNjIxYWY0NjJmMzk2MDI1MDUxZTEzZTBkMDE2MmIzZjRhZDU4MyIsImp0aSI6ImE4MjY2MzU3LTA3ZDUtNGM4Ny05MTdkLWJhYzY2ODk3YTFkMCIsImlhdCI6MTY0NzI2NTkyMn0.M3kNL6UvodWkSGyvKCFRgaTWR5CfxpO-RTo2t-TsA0Y\r\n" #Change To Your Details
	    
    ]
];


$cache=str_replace("/","_",$_REQUEST["key"]);

if(!file_exists($cache)){

$context = stream_context_create($opts);
$haystack = file_get_contents("https://tv.media.jio.com/streams_live/"  . $_REQUEST["key"] . $p,false,$context);

}
else
{
$haystack=file_get_contents($cache);

}
echo $haystack;
}


if(@$_REQUEST["ts"]!="")
{
header("Content-Type: video/mp2t");
header("Connection: keep-alive");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Expose-Headers: Content-Length,Content-Range");
header("Access-Control-Allow-Headers: Range");
header("Accept-Ranges: bytes");
	$opts = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: plaYtv/5.3.2 (Linux;Android 5.1.1) ExoPlayerLib/2.3.0/2.3.0\r\n" 


    ]
];

$context = stream_context_create($opts);
$haystack = file_get_contents("http://mumsite.cdnsrv.jio.com/jiotv.live.cdn.jio.com/"  . $_REQUEST["ts"],false,$context);
echo $haystack;

}

# © 2021 Techie Sneh DO NOT EDIT ANYTHING TO KEEP RUNNING
# DON'T CHANGE ANY JIO SERVER LINK and USERAGENT
# DON'T REMOVE CREDITS

?>
