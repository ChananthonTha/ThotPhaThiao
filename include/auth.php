<?php
session_start();
if(!isset($_SESSION['user_id'])){
echo "<script>window.open('../index.php','_self')</script>";
};
?>