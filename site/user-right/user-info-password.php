<link rel="stylesheet" type="text/css" href="css/user-info-password.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

<head>
	<title>Change Password</title>
</head>

<body style="background-size: auto 1700px;">

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-6 info_">
				<form class="change-pass" method=POST action='site/user-right/control/changePass.php?id=<?php echo $row['username']; ?>'>
					<div class="s_tittle"><i><a style="color: #7eb9be" href="./index.php?click=info">Profile</a> > Change Password</i></div>
					<div class="label_ul"><span class="label_notice">It's a good idea to use a strong password that you don't use elsewhere</span></div>
					<ul class="ul_pass">
						<li class="li_current row">
							<div class="ul_info_1"><span class="label_info  col-md-4">Current</span></div>
							<input name='currentPass' id='currentPass' class="form-input col-md-6" required type="Password" oninput=CheckPass()>
							<span id='notice'></span>
						</li>
						<li class="li_new row">
							<div class="ul_info_1"><span class="label_info  col-md-4">New</span></div>
							<input name='newPass' class="form-input col-md-6" required type="Password" id='newPass'>
						</li>
						<li class="li_retype row">
							<div class="ul_info_1 "><span class="label_info col-md-4">Confirm</span></div>
							<input name='retypePass' class="form-input col-md-6" required type="Password" id='retypePass' oninput=CheckRetype()><span id='notice2'></span>
						</li>
					</ul>
					<input id='submitChange' type="submit" class="btn-sub" value="Save">
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</body>
<script>
	function CheckPass() {
		var currentPass = $('#currentPass').val();
		$.ajax({
			type: "POST",
			url: "site/user-right/control/changePass_ajax.php?id=<?php echo $row['username']; ?>",
			data: "currentPass=" + currentPass,
			success: function(response) {
				//alert(response);
				$('#notice').html(response);
			}
		});
	}

	function CheckRetype() {
		var newPass = $('#newPass').val();
		var retypePass = $('#retypePass').val();
		//alert(retypePass);
		if (newPass === retypePass) {
			$('#notice2').html('<span style="color:green">Matched</span>');
		} else {
			$('#notice2').html('<span style="color:red">Error</span>');
		}
	}
</script>