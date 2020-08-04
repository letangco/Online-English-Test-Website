<?php
//include('admin/connect.php');
//	session_start();
$username = $_SESSION['login'];
$sql = "SELECT * FROM `account` WHERE username = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['role_id'] == 'student') {
	$sql2 = "SELECT * FROM `student` WHERE username = '$username'";
} else {
	$sql2 = "SELECT * FROM `teacher` WHERE username = '$username'";
}

$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
?>

<link rel="stylesheet" type="text/css" href="css/user-infom.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<head>
	<title>Profiles</title>
</head>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-6 info_">
			<div class="s_tittle"><i>Profile</i></div>
			<div class="ul_basic_info">
				<div class="label_ul"><span class="label_list">Basic Infomation</span></div>
				<ul class="ul_info">
					<li class="li_username row">
						<div class="ul_info_1"><span class="label_info col-md-5">Username</span></div>
						<div class="ul_info_2"><?php echo $row['username']; ?></div>
					</li>
					<li class="li_email row">
						<div class="ul_info_1"><span class="label_info col-md-5">E-mail</span></div>
						<div class="ul_info_2"><?php echo $row2['EMAIL']; ?></div>
					</li>
					<li class="li_Hoten row">
						<div class="ul_info_1"><span class="label_info col-md-5">Full name</span></div>
						<div class="ul_info_2"><?php echo $row2['FULLNAME']; ?></div>
					</li>
					<li class="li_birth row">
						<div class="ul_info_1"><span class="label_info col-md-5">Date of birth</span></div>
						<div class="ul_info_2"><?php echo $row2['DOB']; ?></div>
					</li>
					<li class="li_gender row">
						<div class="ul_info_1"><span class="label_info col-md-5">Gender</span></div>
						<div class="ul_info_2"><?php echo $row2['SEX']; ?></div>
					</li>
					<li class="li_addr row">
						<div class="ul_info_1"><span class="label_info col-md-5">Address</span></div>
						<div class="ul_info_2"><?php echo $row2['ADDRESS']; ?></div>
					</li>
					<li class="li_phone row">
						<div class="ul_info_1"><span class="label_info col-md-5">Phone</span></div>
						<div class="ul_info_2"><?php echo $row2['PHONE']; ?></div>
					</li>
				</ul>
			</div>

			<?php
			if ($row['role_id'] == 'teacher') {
			?>
				<div class="ul_info_4teacher">
					<div class="label_ul"><span class="label_list">About Job</span></div>
					<ul class="ul_info">

						<li class="li_achievement row">
							<div class="ul_info_1"><span class="label_info col-md-5">Certificate</span></div>
							<div class="ul_info_2"><?php echo $row2['CERTIFICATE']; ?></div>
						</li>

					</ul>
				</div>
			<?php
			}
			?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>