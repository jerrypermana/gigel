<?php
include "koneksi.php";
session_start();

?>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="css/login.css" rel="stylesheet" id="css">
<script src="js/login.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
<link href="css/login.css" rel="stylesheet" id="css">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <!-- <link rel="stylesheet" href="css/normalize.css"> -->
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <!-- <link rel="stylesheet" href="css/main.css"> -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>
    <body>

      <!-- <form action="RestAPI/register.php" method="post"> -->
      <form  method="POST" name='simpan'  onSubmit='return validasi()' id="test">
        <h1>Halaman Login</h1>
        
        <fieldset>
          <label for="name">Username:</label>
          <input type="text" id="username" name="username">
                    
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
          <a href="register.php" style="align: left;"> Silahkan Register !!! </a>
       </fieldset>
       
        <button type="submit" name="submit" value="Login">Login</button>
        <button type="reset"> Cancel </button>
        
      </form>
      

      <script type='text/javascript'>
                            function validasi(){

                                
								
                                
								 if(simpan.username.value==""){
                                  alert("Username harus di isi");
                                  simpan.username.focus();
                                  return false;
                                }
                                if(simpan.password.value==""){
                                  alert("Password harus di isi");
                                  simpan.password.focus();
                                  return false;
                                }

								
                                return true;
                            }
							
                        </script>
      <?php
			if (isset($_POST ['submit'])){
			function anti_injection($data){

					$filter =stripcslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));

					return $filter;
					}

					$username=anti_injection($_POST['username']);
					$password=anti_injection(md5($_POST['password']));

					$injeksi_username=mysqli_real_escape_string($konek, $username);
					$injeksi_password=mysqli_real_escape_string($konek, $password);
					
	if(!ctype_alnum($injeksi_username) OR !ctype_alnum($injeksi_password)){
		echo"<script>alert('Login Gagal, Silahkan Masukkan Password dan Username dengan benar')
				location.replace('index.php')</script>";
	}else{
		$query ="SELECT * FROM user WHERE username='$username' AND password='$password'";
		$login=mysqli_query($konek,$query);
		$ketemu= mysqli_num_rows($login);
		$r=mysqli_fetch_array($login);

		$query2=mysqli_query($konek,"SELECT * FROM user WHERE username='$username' AND password='$password'");
		$tu=mysqli_fetch_array($query2);
		$t=mysqli_num_rows($query2);
		if($ketemu == 1){

			

			$_SESSION['username'] =$r['username'];
			$_SESSION['password']=$r['password'];
			$_SESSION['realname']=$r['realname'];
		

	
		echo '<script>location.replace("user/dashboard.php")</script>';

		}elseif($t == 1) {

			
      $_SESSION['username']=$tu['username'];
      
      

      
    echo "<script>location.replace('dashboard/dashboard.php')</script>";
  
  }else{

			echo"<script>alert('Login Gagal, Silahkan Masukkan Password dan Username dengan benar')
				location.replace('index.php')</script>";
		}
	}

		
			}
		
		
	
      ?>

    </body>
</html>