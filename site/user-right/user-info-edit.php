<?php
//	include('admin/connect.php');
//	session_start();
	$username = $_SESSION['login'];
	$sql = "SELECT * FROM `account` WHERE username = '$username'";
	$result = $conn->query($sql);
	 $row = $result->fetch_assoc();
	if ($row['role_id'] == 'student') {
		$sql2 = "SELECT * FROM `student` WHERE username = '$username'";
	}
	else 
	{
		$sql2 = "SELECT * FROM `teacher` WHERE username = '$username'";
	}

	 $result2 = $conn->query($sql2);
     $row2 = $result2->fetch_assoc();
?>
<script>
    $(document).ready(function (){
        if ('<?php echo $row2['SEX']?>' === 'Male')
        {
			
            $('#male').prop('checked',true);
        }
        else {
            $('#female').prop('checked',true);
        }
    })
</script>
    <link rel="stylesheet" type="text/css" href="css/user-info-edit.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<head>
	<title>Edit Profiles</title>
</head>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-6 info_">
			<form class="edit-profile" method=POST 
			action='site/user-right/control/edit_Info.php?id=<?php echo $row['username'];?>'>
				<div class="s_tittle"><i><a style="color: #7eb9be" href="./index.php?click=info">Profile</a> > Edit </i></div>
				<div class="ul_basic_info">
					<div class="label_ul"><span class="label_list">Basic Infomation</span></div>
					<ul class="ul_info">
						<li class="li_username row">
							<div class="ul_info_1"><span class="label_info  col-md-4">Username</span></div>
							<input class="form-input col-md-6" type="text" readonly 
								name='txtAccount' value="<?php echo $row['username']; ?>"  >
						</li>
						<li class="li_email row">
							<div class="ul_info_1"><span class="label_info  col-md-4">E-mail</span></div>
							<input name='txtEmail' class="form-input col-md-6" required type="E-mail" value="<?php echo $row2['EMAIL']; ?>"> 
						</li>
						<li class="li_Hoten row">
							<div class="ul_info_1 "><span class="label_info col-md-4">Full name</span></div>
							<input name='txtFullname' class="form-input col-md-6" required type="text" value="<?php echo $row2['FULLNAME']; ?>"  >
						</li>
						<li class="li_birth row">
							<div class="ul_info_1 "><span class="label_info col-md-4">Date of birth</span></div>
							<input name='txtDob' class="form-input col-md-6" type="Date" required value="<?php echo $row2['DOB']; ?>"  >
						</li>
						<li class="li_gender row">
							<div class="ul_info_1 "><span class="label_info col-md-3">Gender</span></div>
						
							<input name='rbSex' class="form-input col-md-2" type="radio" id='male' name="gender" value="male" /><label for='male'>Male</label>
							<input name='rbSex' class="form-input col-md-2" type="radio" id='female' name="gender" value="female"/><label for='female'>Female</label>

						</li>
						<li class="li_addr row">
							<div class="ul_info_1 "><span class="label_info col-md-4">Address</span></div>
							<input name='txtAddr' class="form-input col-md-6" type="text" required value="<?php echo $row2['ADDRESS']; ?>">
						</li>
						<li class="li_phone row">
							<div class="ul_info_1 "><span class="label_info col-md-4">Phone</span></div>
							<input name='txtPhone' class="form-input col-md-6" type="Phone" required value="<?php echo $row2['PHONE']; ?>">
						</li>
					</ul>
				</div>
				<?php
	if ($row['role_id'] == 'teacher')
		{
?>
			<div class="ul_info_4teacher">
					<div class="label_ul"><span class="label_list">About Job</span></div>
					<ul class="ul_info">
						<li class="li_achievement">
							<div class="ul_info_1"><span class="label_info col-md-4">Certificate</span></div>
							<input readonly name='txtCert' class="form-input  col-md-6" type="text" value="<?php echo $row2['CERTIFICATE']; ?>">
						</li>
					</ul>
				</div>
<?php
		}
	?>
				<input type="submit" name="submitChange" class="btn-sub" value="Save">
			</form>
			
		</div>
		<div class="clearfix"></div>
</div>
</div>
