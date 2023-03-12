<?php
include("../include/auth.php");
include("../include/db.php");
$user_id = $_SESSION['user_id'];
?>

<?php
if (isset($_POST['upload'])) {
    $place_name = $_POST['place_name'];
    $place_describe = $_POST['place_describe'];
    $link_map = $_POST['link_map'];
    $link_vdo = $_POST['link_vdo'];
    // $namepic = $_FILES["plc_image"]['name'];
    $contact = $_POST['contact'];
    $query = "INSERT INTO place_data(place_name,place_describe,link_map,link_vdo,contact) 
            VALUES('$place_name','$place_describe','$link_map','$link_vdo','$contact')";
    $result = mysqli_query($con, $query);

    if ($result) {
        // $_SESSION['success'] = "เพิ่มข่าวสารเรียบร้อยแล้ว";
        echo"<script>alert('เพิ่มสถานที่เรียบร้อยแล้ว')</script>";
        header('Location: indexadmin.php');
    } else {
        // $_SESSION['success'] = "เพิ่มข่าวสารยังไม่เรียบร้อยแล้ว";
        echo"<script>alert('เพิ่มสถานที่ยังไม่เรียบร้อยแล้ว')</script>";
        header('Location: add.php');
    }
}else {
    // $_SESSION['success'] = "เพิ่มข่าวสารยังไม่เรียบร้อยแล้ว";
    echo"<script>alert('เพิ่มสถานที่ยังไม่เรียบร้อยแล้ว')</script>";
    header('Location: add.php');
}
?>