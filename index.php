<?php
$string11= file_get_contents('http://app.kanchaozhou.com/tvradio/Tv/getTvInfo?tv_id=11');
$zhhead = substr($string11,strpos($string11,'czzhpd?sign='));
$zhpd = substr($zhhead,0,55);
$rtmpurl11="rtmp://pili-live-rtmp.czbtv.sobeylive.com/czbtv2019/".$zhpd;
$string12= file_get_contents('http://app.kanchaozhou.com/tvradio/Tv/getTvInfo?tv_id=12');
$gghead = substr($string12,strpos($string12,'czggpd?sign='));
$ggpd = substr($gghead,0,55);
$rtmpurl12="rtmp://pili-live-rtmp.czbtv.sobeylive.com/czbtv2019/".$ggpd;
$inputfile = "channellist.txt";
$file_arr = file($inputfile);
$arr_new = array();
foreach($file_arr as $v){
$a = trim($v);
$a = str_replace("\r\n","",$a);
$a = str_replace("\r","",$a);
$a = str_replace("\n","",$a);
$a = str_replace("%kczzhpdrtmpurl%","$rtmpurl11",$a);
$a = str_replace("%kczggpdrtmpurl%","$rtmpurl12",$a);
$arr_new[] = $a;
}
for($i=0; $i<count($arr_new); $i++)
{
$channelout.=$arr_new[$i].PHP_EOL;
} 
echo $channelout;