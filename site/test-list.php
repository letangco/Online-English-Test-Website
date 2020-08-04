<?php
	//include('admin/connect.php');
	$username = '';
	if (isset($_SESSION['login']))
	{
		$username = $_SESSION['login'];
	}
	$sql_role = "SELECT * FROM `account` WHERE username = '$username'";
	$result_role = $conn->query($sql_role);
	$row_role = $result_role->fetch_assoc();
	$user_role ='';
	if ($row_role['role_id'] == 'admin')
	{
		$user_role ='admin';
		$sql = "SELECT * 
			FROM test"; 
	}
	else if ($row_role['role_id'] == 'student') {
		$sql = "SELECT * 
				FROM test, class
				WHERE TYPE = 'free'
					AND test.CLASS_ID = class.CLASS_ID
				ORDER BY BEGIN DESC"; 
		$sql_ = "SELECT * 
		FROM test,  study, class
						WHERE test.CLASS_ID = class.CLASS_ID 
						AND class.CLASS_ID = study.CLASS_ID
						and TYPE = 'todo'
						and study.USERNAME = '$username'
						AND CURRENT_DATE >= class.BEGIN 
						and CURRENT_DATE <= class.END
						AND test.TEST_ID 
						NOT IN 
						(
							SELECT TEST_ID FROM RESULT
							WHERE TIMES = 2
						) ";
		
		$user_role ='student';
		$result_ = $conn->query($sql_);
	}
	//Hien thi danh sach cai bai test ma giao vien dang day
	else if ($row_role['role_id'] == 'teacher') {
		$sql = "SELECT * 
				FROM test, class
				WHERE test.CLASS_ID = class.CLASS_ID 
				and TEACHER = '$username'
				AND CURRENT_DATE >= class.BEGIN 
                and CURRENT_DATE <= class.END "; 
		$user_role ='teacher';
	}

	else {
		$sql = "SELECT * 
				FROM test
				WHERE TYPE='free' "; 
	}
	$result = $conn->query($sql);
	
?>
	<link rel="stylesheet" type="text/css" href="./css/animate.css">
	<link rel="stylesheet" type="text/css" href="./css/test.css">
	<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="./js/js_test.js"></script>
	<head>
	<title>TEST</title>
</head>	
<div class='content' style='margin-top: 0px'>
	<div name='user_role' user_role='<?php echo $user_role ?>'></div>
    <ul class="menu"> 
			<?php
			if ($user_role == 'admin' ||$user_role == 'teacher' )
			{
					?>
			<li data-type="free">Free Tests</li>
			<li data-type="todo">Todo Tests</li>
			<li data-type="all">All</li>
					<?php
			}
			else if ($user_role == 'student')
			{
				?>
			<li data-type="free">Free Tests</li>
		
			<li id='havent' data-type="havent">Todo Tests</li>
			
					<?php
			}

			?>
		</ul>
	<div class="test-list" style="overflow: auto; height: 500px; width: 1300px">	
<?php
	while ($row = $result->fetch_assoc())
	{	
?>
		<article class="test-listing <?php echo $row['TYPE']; ?> all ">
     			 <a class="test-title" href="index.php?click=test-choosen&id=<?php echo $row['TEST_ID']; ?>">
				  <?php echo $row['TEST_NAME'];?></a>
    			  <div class="test-image">
    				    <a href="index.php?click=test-choosen&id=<?php echo $row['TEST_ID']; ?>">
							<img  src="admin/modules/imgTest/<?php echo $row['IMG'];?>"></a>
    			 </div>
   		</article>
<?php
	}
?>


<?php
if ($user_role == 'student')
{
	
	while ($row_ = $result_->fetch_assoc())
	{	
?>
		<article class="test-listing havent ">
     			 <a class="test-title" href="index.php?click=test-choosen&id=<?php echo $row_['TEST_ID']; ?>">
				  <?php echo $row_['TEST_NAME'];?></a>
    			  <div class="test-image">
    				    <a href="index.php?click=test-choosen&id=<?php echo $row_['TEST_ID']; ?>">
							<img  src="admin/modules/imgTest/<?php echo $row_['IMG'];?>"></a>
    			 </div>
   		</article>
<?php
	}
	}
?>




	</div>
</div>
