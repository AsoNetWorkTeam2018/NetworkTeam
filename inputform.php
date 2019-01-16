<?php
if($_SERVER['REQUEST_METHOD']=='GET')
{
echo "nnn <br />";
}

 ?>

<html>
<h1>仮フォーラム</h1>

<p>背景？ </p>
<img src="~/share/back.png">

<h2>入力</h2>
<body>
<form method="get" action="getid.php">

<p>id: <INPUT type="text" name="input1" maxlength="5"></p>
<p>pass:<INPUT type="text" name="input2" maxlength="4"></p>

<p><INPUT type="submit"></p>
</form>
</body>
<p><?php echo "login"; ?></p>
</html>


