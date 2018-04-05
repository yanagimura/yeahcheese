<?php
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false) {
?>
<h3>strposが非falseを返しました</h3>
<center><b>あなたはCrhomeを使用しています</b></center>
<?php
} else {
?>
<h3>strposがfalseを返しました</h3>
<center><b>あなたはCrhomeを使用していません</b></center>
<?php
}
?>
