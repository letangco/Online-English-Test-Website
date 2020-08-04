	<?php
	$username = $_SESSION['login'];
	$sql = "SELECT * FROM `account` WHERE username = '$username'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if ($row['role_id'] == 'student') {
		$sql2 = "SELECT * FROM `student` WHERE username = '$username'";
	} 
	else {
		$sql2 = "SELECT * FROM `teacher` WHERE username = '$username'";
	}

	$result2 = $conn->query($sql2);
	$row2 = $result2->fetch_assoc();
	if (isset($_GET['ac']) && $_GET['ac'] == 'logout') {
		unset($_SESSION['login']);
		header('location: index.php');
	}
	?>
	<link rel="stylesheet" type="text/css" href="css/user-menu.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<div class="container">
		<div class="user_sidebar">
			<div class="s_tittle">
				<img src="admin/modules/uploads/<?php echo $row['AVATAR'] ?>" alt="avata" height="100px" width="100px">
				<strong><?php echo $row2['FULLNAME'] ?></strong>
				<br><br>
			</div>

			<ul class="menu_user">
				<li class="info"><a href="./index.php?click=info"><b>Profile</b></a>
					<ul class="us-item">
						<li><a href="./index.php?click=editPro&id=<?php echo $row['username'] ?>">Edit Profile</a></li>

						<li><a href="./index.php?click=editPass&id=<?php echo $row['username'] ?>">Change Password</a></li>
					</ul>
				</li>

				<?php
				if ($row['role_id'] == 'teacher' || $row['role_id'] =='admin') {
					?>
					<li class="list"><a href="./index.php?click=manage&id=<?php echo $row['username'] ?>"><b>Manage</b></a>
						<ul class="us-item">
							<li><a href="./index.php?click=mn-class&id=<?php echo $row['username'] ?>">Class</a></li>

							<li><a href="./index.php?click=mn-test&id=<?php echo $row['username'] ?>">Test</a></li>
						</ul>
					</li>

				<?php
				}
				?>
				<li class="KQ"><a href="./index.php?click=lo&id=<?php echo $row['username'] ?>"><b>Learning Outcome</b></a>

				</li>



				<li class="logout"><a href="./index.php?click=info&ac=logout"><b>Log Out</b></a></li>
			</ul>
		</div>
	</div>