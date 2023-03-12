<?php

    $Fname  = $_POST['Fname'];
    $Lname  = $_POST['Lname'];
    $user_email = $_POST['user_email'];
    $user_pass  = $_POST['user_pass'];
    $user_pass2 = $_POST['user_pass2'];

    //check user_pass >8
    if(strlen($user_pass) < 7 or strlen($user_pass2) < 7){
        echo"<script>alert('กรุณาใส่รหัสผ่านอย่างน้อย 8 ตัว')</script>";
        echo"<script>window.open('register.php','_self')</script>";
        exit();
    }
     //check user_pass and user_pass ตรงกัน
    elseif($user_pass<>$user_pass2){
        echo"<script>alert('กรุณาใส่รหัสผ่านทั้งสองให้ตรงกัน:$user_pass and $user_pass2')</script>";
        echo"<script>window.open('register.php','_self')</script>";
        exit();
    }
    //create user email have repeate
    include("./include/db.php");
    $check_email = "select * from user where user_email='$user_email'";
	$run_email = mysqli_query($con,$check_email);
	$check = mysqli_num_rows($run_email);
	if($check==1){
        echo "<script>alert('อีเมลนี้มีผู้ใช้แล้ว, กรุณาลองใช้อีเมลอื่น!')</script>";
        echo "<script>window.open('register.php','_self')</script>";
        exit();
    }
    $user_name = $Fname."_".$Lname;
    $query = "INSERT INTO user(Fname,Lname,user_pass,user_email)
            VALUES('$Fname','$Lname','$user_pass','$user_email')";
    $result = mysqli_query($con,$query);
    if($result){
        echo "<script>alert('สมัครสมาชิกเรียบร้อยแล้ว')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        exit();
    }
?>


