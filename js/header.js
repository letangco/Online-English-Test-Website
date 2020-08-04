$(function()
{
	$('#btnLogin').on('click', function (e) {
		$('#modalLoginForm').show();
	});

	$('#btnSubmit').on('click', function (e) {
		var username = $('#username').val();
		var password = $('#password').val();
		e.preventDefault();
	$.ajax({
		type: "POST",
		url: "site/login.php",
		data: {
			"username": username,
			"password": password
		},
		success: function (response) {
			//alert(response);
			//html += '<a href ="./index.php?click=info"></a>';
			$('#signed').html(response);	
			//$('#modalLoginForm').hide();

		}
	});
});
})
 