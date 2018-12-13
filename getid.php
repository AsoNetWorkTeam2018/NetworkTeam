<?php
$input1=$_POST["input1"];
$input2=$_POST["input2"];
$output1="id:[".$input1."]";
$output2="pass:[".$input2."]";
if($_SERVER['REQUEST_METHOD']=='POST')
{
echo "post<br />";
}
else if($_SERVER['REQUEST_METHOD']=='GET')
{
echo "get<br />";
}
#echo "$input1<br />";
$log="1243";
$sucs="FALSE";
$ary=array('id'=>$input1,'pass'=>$input2);
$sql=new mysqli("localhost","root","daichi117","testdb");
if($sql->connect_error)
{
echo "$sql->connect_error<br />";
}
else
{
echo "データベースに接続しました<br />";
}

$que="SELECT test3.id FROM test3 WHERE test3.id LIKE '$input1'";
$showque="SELECT id FROM test3";
$result=$sql->query($que);
$showres=$sql->query($showque);
$iti="FALSE";
while($show=$showres->fetch_assoc())
{
if("{$show['id']}"==$input1)
{
 $iti="TRUE";
break;
}
else
{
$iti="FALSE";
}
}

$loginResult=array('OK'=>1,'NG'=>-1);
$retjson=json_encode($loginResult);
print(var_dump($retjson));
$decjson=json_decode($retjson);
#decodeでphp化
#encodeでjson化
#$json=json_encode($ary);
#$p=json_decode($json);
?>

<html>
<h1>確認情報</h1>


<p><?php print($output1); ?></p>
<p><?php print($output2); ?></p>
<body>
<?php if($iti=="TRUE"): ?>
   <p><?php echo "ログイン成功";  ?></p>
   <p><?php print($decjson->{"OK"}); ?></p>
   <form method="post" action="home.php">
   <p><input type="submit"  value="進む"></p>
   <p>初期数<input type="text" name="in"></p>
   </form>
<?php else: ?>
   <p><?php echo "ログイン失敗";  ?></p>
   <form method="post" action="inputform.php">
   <p><input type="submit" value="入力画面に戻る?"></p>
   </form>
<?php endif; ?>

</body>
</html>
