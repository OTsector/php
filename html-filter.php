<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>\n ჩანასვლება &lt;br /&gt; ით</title>
</head>
<style type="text/css">
	body { background: #e4ffd6; font-family: Helvetica, Arial, sans-serif; font-size: 14px; }
	textarea { background: #d6fffc; color: #000; border: 1px solid #000; width: 460px; height: 160px; resize: none; font-family: Helvetica, Arial, sans-serif; font-size: 14px;  margin: 12px; padding: 12px; }
	input { background: #dad6ff; color: #000; border: 1px solid #000; width: auto; height: auto; margin: 12px; padding: 12px; }
	.content { width: 500px; margin-left: auto; margin-right: auto; text-align: center; }
	.result { background: #ffd6d6; color: #000; border: 1px solid #000; width: 460px; height: 160px; resize: none;  margin: 12px; padding: 12px; }
	.html { background: #fff; color: #000; border: 1px solid #000; width: 460px; height: 160px; resize: none;  margin: 12px; padding: 12px; }
</style>
<body>
<?php if (!isset($_GET['source'])) { ?>
	<div class="content">

		<h3>\n ჩანასვლება &lt;br /&gt; ით + html კოდის ფილტრაცია</h3>

		<form action="" method="post">
		ტექსტის ფორმა:<br />
		<textarea placeholder="დაწერეთ ტექსტი." name="text"><?php if (isset($_POST['text'])) {echo $_POST['text'];} ?></textarea>
		<input type="submit" name="submit" value="გაგზავნა" \>

		</form>

		შედეგი:<br />
		<div class="result">

		<?php

		if (isset($_POST['submit']) && isset($_POST['text'])) {
			$text = $_POST['text'];
			$text = str_ireplace("\r\n", "<br>", $text); 
			$text = strip_tags($text, '<b><a><font><div><p><hr><i><strong>');
			echo $text;
		}

		?>
		
		</div>
		HTML:<br />
		<div class="html">

		<?php

		if (isset($_POST['submit']) && isset($_POST['text'])) {
			$text = $_POST['text'];
			$text = str_ireplace("\r\n", "<br>", $text); 
			$text = htmlentities($text);
			echo $text;
		}

		?>
		
		</div>

		<p>
		<a href="<?php echo basename(__FILE__, '.php');  ?>.php?source" target="_blank">წყარო</a><br />
		facebook მისამართი: <a href="https://fb.com/offensive-tester" target="_blank"><b><font color="black">OT fluge</font></b></a></p>

	</div>
<?php } ?>
<?php
if (isset($_GET['source'])) {
	$filename = basename(__FILE__, '.php').".php";
	echo show_source($filename);
}
?>
</body>
</html>
