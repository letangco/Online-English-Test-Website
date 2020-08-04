<?php
include('admin/modules/result/connection.php');
//include('admin/connect.php');
//	session_start();
	$username = $_SESSION['login'];
	$sql_role = "SELECT * FROM `account` WHERE username = '$username'";
	$query_role = $conn->prepare($sql_role);
	$query_role->execute();
	$result_role = $query_role->fetch(PDO::FETCH_ASSOC);

	if ($result_role['role_id'] == 'student') {
		//$sql = "SELECT * FROM `student` WHERE username = '$username'";
		$sql = "SELECT * FROM COURSE,CLASS, STUDY
				WHERE COURSE.COURSE_ID=CLASS.COURSE_ID AND STUDY.CLASS_ID = CLASS.CLASS_ID
				AND STUDY.USERNAME='$username'
				GROUP by course.COURSE_ID";
	}
	else if ($result_role['role_id'] == 'teacher')
	{
		$sql = "SELECT * FROM COURSE,CLASS 
				WHERE COURSE.COURSE_ID=CLASS.COURSE_ID 
				AND CLASS.TEACHER='$username'
				GROUP by course.COURSE_ID";
	}
	else 
	{
		$sql = "SELECT * FROM COURSE";
	}
		$query = $conn->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
	
?>
<link rel="stylesheet" type="text/css" href="css/user-locopy.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-8 info_">
			<div class="s_tittle"><i>Learning Outcome</i></div>
			<div name='role' role = <?php echo $result_role['role_id'] ; ?>></div>
			<br>
			
		<?php
		if ($row['role_id'] == 'student')
		{
		?>
		<div style="padding: 15px"><a target="_blank" href='index.php?click=chart&id='>View in chart</a></div>
				<div class="choose">
					<label for="">Course</label>
					<select name="course" id="course">
						<option data-tchr="" value="">--choose course--</option>
					<?php
					foreach ($result as $row) {
						echo '<option data-tchr="' . $username . '" value="' . $row["COURSE_ID"] . '">' . $row["COURSE_NAME"] . '</option>';
					}
				?>
				</select>
				</div>
				<div class="table-std" style="overflow:auto; height:400px">
				<table id='list-class'>
					<tr>
						<td>CLASS ID</td>
						<td>CLASS NAME</td>
						<td>RESULT</td>
						<td>RANK</td>
					</tr>
				</table>
			</div>
		<?php
		}
		else if ($row['role_id'] == 'teacher') {
			?>
			
				<div class="choose">
					<label for="">Course</label>
					<select name="course" id="course">
						<option data-tchr="" value="">--choose course--</option>
					<?php
					foreach ($result as $row) {
						echo '<option data-tchr="' . $username . '" value="' . $row["COURSE_ID"] . '">' . $row["COURSE_NAME"] . '</option>';
					}
				?>
				</select>
				</div>
				<div class="table-std" style="overflow:auto; height:400px">
				<table id='list-class'>
					<tr>
						<td>CLASS ID</td>
						<td>CLASS NAME</td>
						<td>EXCELLENT</td>
						<td>GOOD</td>
						<td>AVERAGE</td>
						<td>BELOW AVERAGE</td>
						<td>WEAK</td>
					</tr>
				</table>
			</div>
				<?php
		}	
		else {
			?>
				<div class="choose">
				<label for="">Course</label>
				<select name="course" id="course">
					<option data-tchr="" value="">--choose course--</option>
					<?php
					foreach ($result as $row) {
						echo '<option data-tchr="' . $username . '" value="' . $row["COURSE_ID"] . '">' . $row["COURSE_NAME"] . '</option>';
					}
					?>
				</select>
				</div>
				<div class="table-std" style="overflow:auto; height:380px">
				<table id='list-class'>
					<tr>
						<td>CLASS ID</td>
						<td>CLASS NAME</td>
						<td>EXCELLENT</td>
						<td>GOOD</td>
						<td>AVERAGE</td>
						<td>BELOW AVERAGE</td>
						<td>WEAK</td>
					</tr>
				</table>
			</div>
			<?php
		}
		?>
		
		<script>
			$(document).ready(function($) {
				$('#course').change(function(event) {
					role = $('div[name="role"]').attr('role');
					//alert(role);
					courseId = $('#course').val();
					teacherId = $('#course').find(':selected').data('tchr');
					$.post('site/user-right/ajax-lo-class.php', {
						"courseid": courseId,
						"teacherid": teacherId,
						"role" : role
					}, function(data) {
						$('#list-class').html(data);
						//alert(data);
					})
				})

			})
		</script>

	</div>

	<div class="clearfix"></div>
</div>
</div>