<!DOCTYPE html>
<html lang="en">
<head>
  <title>DMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="assets/layouts/layout4/css/style.css" rel="stylesheet" type="text/css" />
  <style>
  .responsive {
  width: 100%;
  height: auto;
}
#button{
  z-index: 1000;
}
  </style>
</head>
<body class="login-body">

<div class="row">
<div class="col-md-8">
<div class="banner">
<img src="banner3.jpg" class="img-fluid responsive">
</div>
</div>
<div class="col-md-4">
<div class="login-content">
<h3 align="center">Welcome to <br>Delivery Manager</h3>
<form id="form_user" class="login" >

<div class="form-group">
<label for="email">User Name</label>
<input type="text" class="form-control" id="username" autocomplete="" placeholder="Enter UserName" name="username" required>
</div>

<div class="form-group">
<label for="pwd">Password</label>
<input type="password" class="form-control" autocomplete="" id="password" placeholder="Enter password" name="password" required>
</div> 
<div class="submit-button text-center">
<button type="submit" id='button' class="btn login-btn btn-primary">Login</button>
</div>
</form>
</div>
</div>


</div>

</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	
	//url="http://finz.opmovings.com/dm_api/Api/login";
	url="http://localhost/finz/dm_api/Api/login";
	 // $('#form_user').submit(function(e) {
    $(document).on("submit", "#form_user", function(e) {
        e.preventDefault();
    var formdata = $("#form_user").serializeArray();
	var data = {};
	$(formdata ).each(function(index, obj){
    data[obj.name] = obj.value;
	});
    //var formData = JSON.stringify(jQuery('#form_user').serializeArray());
    //alert(formData);
   console.log("data:",data); 
    $.ajax({
       type: "POST",
       url: url,
       data: data,
       success: function(resp)
       {console.log("login:",resp);
      if(resp){
      var status = resp.status;
      var type = resp.user_role;

      if(status=="TRUE" && type == 0 || type == 1 || type == 2){
         // window.location.replace("http://finz.opmovings.com/dashboard.php");
          window.location.replace("http://localhost/finz/overview.php");
        //window.localStorage.setItem("lastname", "Smith");
				window.localStorage.setItem("firstname",resp.login_id);// Retrieve
				//var firstname = window.localStorage.getItem("lastname");
				var firstname = window.localStorage.getItem("firstname");
        // alert(firstname+" "+lastname)
        
      }else if(status=="TRUE" && type == 3){
           window.location.replace("http://localhost/finz/driver_delivery.php");
          window.localStorage.setItem("firstname",resp.login_id);// Retrieve
           var firstname = window.localStorage.getItem("firstname");
      }
			else 
			{
			//	window.location.replace("http://finz.opmovings.com/dashboard.php");
				// window.location.replace("http://localhost/finz/dashboard.php");
        //         window.localStorage.setItem("firstname", resp.login_id);// Retrieve
        //         var firstname = window.localStorage.getItem("firstname");
        alert(resp.message);
			}
          }          
          else {
            alert('Invalid Credentials');
          }
       }
   });
 });
});

</script>
