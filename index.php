
<?php require_once("includes/initialize.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>KCC-Automated Registrar System</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<!-- Custom styles for this template -->
<link href="offcanvas.css" rel="stylesheet">

</head>
<body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">KCC-Regstrar System</a>
        </div>

       
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    </div>
<?php
 if (logged_in()) {
?>
   <script type="text/javascript">
            window.location = "home.php";
    </script>
    <?php
}
include("banner.php") ?>

<?php
if (isset($_POST['btnlogin'])) {
    //form has been submitted1
    
    $uname = trim($_POST['uname']);
    $upass = trim($_POST['pass']);
    
    $h_upass = sha1($upass);
    //check if the email and password is equal to nothing or null then it will show message box
    if ($uname == '' OR $upass == '') {
?>    <script type="text/javascript">
                alert("Invalid Username and Password!");
                </script>
            <?php
        
    } else {
		//it creates a new objects of member
        $user = new User();
		//make use of the static function, and we passed to parameters
		$res = $user::AuthenticateUser($uname, $h_upass);
		//then it check if the function return to true
		if($res == true){
			?>   <script type="text/javascript">
					//then it will be redirected to home.php
					window.location = "index.php";
				</script>
			<?php
		
		
		} else {
?>    <script type="text/javascript">
                alert("Username or Password Not Registered! Contact Your administrator.");
                window.location = "index.php";
                </script>
        <?php
        }
        
    }
} else {
    
    $email = "";
    $upass = "";
    
}

?>

<div class="container">
		
		<div class="col-xs-12 col-sm-9">
			<div class="rows">
				<div class="well">
					<fieldset>
						<legend><h4 class="text-center">VISION</h4></legend>
							<p>The Kabankalan Catholic College is an educative and evangelizing community, 
							fostering the values of love, life, justice, and care for creation, 
							an agent of societal transformation and builder of God’s kingdom.</p>
					</fieldset>	
					<fieldset>
						<legend><h4 class="text-center">MISSION</h4></legend>
							<p>The KCC exists to provide quality education and holistic formation to the youth of the Diocese,
							 having a preferential option for the poor, in a Christ-centered environment that cultivates academic
							  excellence and continuous learning.</p>
					</fieldset>	

					
				</div>
			</div>
		</div>
		<!--/span--> 
		<?php include("sidebar.php") ?>
		</div>
	<!--/row-->
	
	<hr>
	<?php include("footer.php") ?>
