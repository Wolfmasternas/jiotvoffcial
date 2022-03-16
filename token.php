<?php

# © 2021 Techie Sneh DO NOT EDIT ANYTHING TO KEEP RUNNING

# Here I Put Token which Available Publicly I Recommended Use Your Own Token Here 
# For Suppport techiesneh@protonmail.com



$jctBase = "cutibeau2ic";

$ssoToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWUiOiI2OWFmYjhkMS0wM2E2LTQxNDItYTRmYi01NjlmZjk3NjYzNTAiLCJ1c2VyVHlwZSI6IlJJTHBlcnNvbiIsImF1dGhMZXZlbCI6IjIwIiwiZGV2aWNlSWQiOiJhYmQ4ZTkzYWRiN2Y1ZDU2NjE1ZTA5YTViOTE4NTg4M2VjYzdmMTA0ZmMxNDg3ZGE4MmY2YzEyMzA1ZDY5YmI2Yjk3MjdlMmFlYjIyZmQ0MGNkMDc4ZThhMzUyNjIxYWY0NjJmMzk2MDI1MDUxZTEzZTBkMDE2MmIzZjRhZDU4MyIsImp0aSI6ImE4MjY2MzU3LTA3ZDUtNGM4Ny05MTdkLWJhYzY2ODk3YTFkMCIsImlhdCI6MTY0NzI2NTkyMn0.M3kNL6UvodWkSGyvKCFRgaTWR5CfxpO-RTo2t-TsA0Y"; #Change This with your SSOTOKEN 
function tokformat($str)
{
$str= base64_encode(md5($str,true));
return str_replace("\n","",str_replace("\r","",str_replace("/","_",str_replace("+","-",str_replace("=","",$str)))));
}
function generateJct($st, $pxe) 
{
 global $jctBase;
 return trim(tokformat($jctBase . $st . $pxe));
}
function generatePxe() {
return time() + 6000000;
}
function generateSt() {
global $ssoToken;
return tokformat($ssoToken);
}
function generateToken() {
$st = generateSt();
$pxe = generatePxe();
$jct = generateJct($st, $pxe);
return "?jct=" . $jct . "&pxe=" . $pxe . "&st=" . $st;
}

# © 2021 Techie Sneh DO NOT EDIT ANYTHING TO KEEP RUNNING


echo generateToken();
?>
