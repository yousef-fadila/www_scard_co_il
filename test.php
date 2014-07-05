<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

?>
<?php require('header.php'); ?>
<?php require('config/config.php'); ?>
<?php require('include/Database.php'); ?>
<style>
*{
  direction:ltr;
}
</style>
<p>hello html</p>
<?php
$db = new Database();
$query = "SELECT * FROM customer WHERE (id='5')";
$id = array();
$id[] = '5';
$res = $db->pquery($query , null);

echo '<br/>';
print_r($res);
echo '<br/>';

?>
<p>still alive</p>



<?php require('footer.php'); ?>
