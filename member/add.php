<?php
include("../include/db.php");
include("../include/auth.php");
$sql = "SELECT * FROM user";
$result = mysqli_query($con, $sql);
$user_id = $_SESSION['user_id'];
$row = mysqli_fetch_array($result);
?>
<?php
$status = $_SESSION['status'];
if ($status == "MEMBER") {
  echo "<script>window.open('index.php','_self');</script>";
}else{

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Thot Pha Thiao</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="../images/bear.png" type="image/x-icon">
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
					<a href="indexadmin.php"><img src="./images/home.png" class="img-fluid"></a>
					&nbsp;&nbsp;
					<a class="navbar-brand" href="indexadmin.php">Thot Pha Thiao</a>
					<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="ค้นหา..." aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>
					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php
								$Fname = $_SESSION['Fname'];
								$Lname = $_SESSION['Lname'];
								?>
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "$Fname" . "&nbsp" . "&nbsp" . "$Lname"; ?></span>
								<img class="img-profile rounded-circle" src="./images/user.png">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									ล็อกเอาท์
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a class="btn btn-primary" href="../logout.php">Logout</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Topbar -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h1 class="h3 mb-0 text-gray-800">เพิ่มสถานที่ท่องเที่ยว</h1>
					</div>
					<form class="user" action="addok.php" method="post">
						<div class="con">
							<label for="place_name" style="margin-top: 10px;">ชื่อสถานที่:</label>
							<input type="text" class="form-control" name="place_name" id="place_name" required style="margin-bottom:5px;" />
							<label for="place_describe" style="margin-top: 10px;">รายละเอียด:</label>
							<textarea rows="4" cols="50" class="form-control" name="place_describe" id="place_describe" required style="margin-bottom:5px;"></textarea>
							<label for="link_map" style="margin-top: 10px;">ลิงค์ Google map:</label>
							<input type="text" class="form-control" name="link_map" id="link_map" required style="margin-bottom:5px;" />
							<label for="link_vdo" style="margin-top: 10px;">ลิงค์วิดีโอ:</label>
							<input type="text" class="form-control" name="link_vdo" id="link_vdo" required style="margin-bottom:5px;" />
							<!-- <label for="uploadfile" style="margin-top: 10px;">รูปภาพ:</label>
							<input type="file" class="form-control" name="uploadfile" id="uploadfile" required style="margin-bottom:5px;" /> -->
							<label for="contact" style="margin-top: 10px;">ติดต่อ:</label>
							<input type="text" class="form-control" name="contact" id="contact" required style="margin-bottom:5px;" />
							<hr class="sidebar-divider d-none d-md-block" />
							<input type="submit" class="btn btn-primary btn-block" name="upload" id="upload" value="ยืนยัน" />
						</div>
					</form>
				</div>
			</div>
		</div>

		<style>
			.con {
				padding-left: 20px;
				padding-right: 20px;
				padding-bottom: 20px;
			}
		</style>
		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="js/demo/chart-area-demo.js"></script>
		<script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>