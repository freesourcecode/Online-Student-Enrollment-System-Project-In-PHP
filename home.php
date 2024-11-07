
<?php
//require_once("includes/initialize.php");
 include("header.php");

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
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="sidebar-nav">
				<div class="panel panel-success">
				
			  		<div class="panel-heading">Login Information</div>
					   <div class="panel-body">	
							<div class="col-xs-12 col-sm-12">
							 <span class="glyphicon glyphicon-user"> </span> <label><?Php echo $_SESSION['ACCOUNT_NAME'];?></label><br/>
							 <span class="glyphicon glyphicon-cog"> </span> <label><?Php echo $_SESSION['ACCOUNT_TYPE'];?></label><br/>
							  <a href="logout.php" class="btn btn-default">Logout <span class="glyphicon glyphicon-log-out"></span></a>
							</div>					            					            		
						</div>
					          
				</div>
			</div>
		</div>
	</div>
<!--/.well --> 
</div><!--container-->
	
	
	<hr>
	<?php include("footer.php") ?>
