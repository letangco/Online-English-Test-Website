<?php
include('admin/modules/result/connection.php');
//include('admin/connect.php');
//	session_start();
$username = $_SESSION['login'];
$sql_cls = "SELECT COUNT(CLASS_ID) AS QUANTITY FROM CLASS
					WHERE TEACHER='$username'";
$sql_tst = "SELECT COUNT(TEST.TEST_ID) AS QUANTITY FROM CLASS,TEST
		WHERE CLASS.TEACHER='$username'
		AND CLASS.CLASS_ID=TEST.CLASS_ID";
$query_cls = $conn->prepare($sql_cls);
$query_cls->execute();
$result_cls = $query_cls->fetch(PDO::FETCH_ASSOC);
$query_tst = $conn->prepare($sql_tst);
$query_tst->execute();
$result_tst = $query_tst->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="css/user-managecopy.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<head>
	<title>Manage</title>
</head>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-6 info_">
			<div class="s_tittle"><i>Manage</i></div>
			<ul class="ch-grid">

				<li>
					<div class="ch-item ch-img-2">
						<div class="ch-info">
							<a href="./index.php?click=mn-class&id=13">
								<h3>Class</h3>
							</a>
							<p><?php echo $result_cls["QUANTITY"] ?> classes</p>

						</div>
					</div>
				</li>
				<li>
					<div class="ch-item ch-img-3">
						<div class="ch-info">
							<a href="./index.php?click=mn-test&id=14">
								<h3>Test</h3>
							</a>
							<p> <?php echo $result_tst["QUANTITY"] ?> tests</p>
						</div>
				</li>

			</ul>


		</div>

		<div class="clearfix"></div>
	</div>
</div>