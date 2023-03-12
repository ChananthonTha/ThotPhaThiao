<?php
include("./include/auth.php");
include("./include/db.php");
?>

<?php
$user_email = $_POST['user_email'];
$user_pass = $_POST['user_pass'];
include("./include/db.php");
$query = "SELECT * FROM user WHERE user_email = '$user_email' and user_pass = '$user_pass'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);


if ($row) {

    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['Fname'] = $row['Fname'];
    $_SESSION['Lname'] = $row['Lname'];
    $_SESSION['status'] = $row['status'];
    echo $_SESSION['status'];
    if ($user_email = 'user_email' && $user_pass = 'user_pass') {
        echo "<script>window.open('./member/index.php','_self');</script>";
        //header ("refresh:10 ./member/index.php");
        exit();
    } else {
        echo "<script>alert('รอการอนุมัติจากผู้ดูแลระบบ จะส่งข้อมูลผ่านอีเมลล์','_self')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        exit();
    }
} else {
    echo "<script>alert('อีเมลชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง','_self')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    exit();
}

mysqli_close($con);
?>

