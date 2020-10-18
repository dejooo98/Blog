<?php 

$mesage = $_POST['mesage'];
$id = $_POST['id'];

$mysqli = new mysqli('localhost','root','','accounts');
$sql = "UPDATE `user_message` SET `mesage` = '$mesage' WHERE `user_message`.`id` = $id";

$edit = $mysqli->query($sql);

if($edit) {
    header("Location: welcome.php");
}