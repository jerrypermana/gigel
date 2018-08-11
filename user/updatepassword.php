<?php
session_start();
include "../koneksi.php";
if(!isset($_SESSION['username'])){
	 header("Location: ../index.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GIGEL.ID</title>
    <link href="../configboot/css/style.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../css/login.css" rel="stylesheet" id="css"> -->
    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">GIGEL.ID</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                
                        <li class="divider"></li>
                        <li><a href="../logout.php"> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="dashboard.php"> Dashboard</a>

                        </li>
                        <li>
                            <a href="updatepassword.php"> Update Password</a>

                        </li>
					    
					

                     

           
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form">
                    </br>
                    </br>
                   
						<center> 
                       
                        <form onKeyUp="highlight(event)" onClick="highlight(event)" name="form" id="form" class="form-horizontal form-bordered" action="" onsubmit="return cek(this)" method="post">
	
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Password Lama</label>
                            <div class="col-sm-5">
                            <input type="password" class="form-control" name="p_lama" id="p_lama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Password Baru:</label>
                            <div class="col-sm-5">
                            <input type="password" class="form-control" name="p_baru" id="p_baru">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Konfirmasi Password Baru:</label>
                            <div class="col-sm-5">
                            <input type="password" class="form-control" name="p_lagi" id="p_lagi"  >
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-5">
                            <button type="submit" name='update' class='btn btn-primary'>Update</button>
							<button type="reset" class="btn btn-danger">Cancel</button>
							</div>
                            </div>
                        </div>
                        </form>
                        </table>
	<script type="text/javascript">
		function cek(form){
		var lama = form.p_lama.value;
		var baru = form.p_baru.value;
		var lagi = form.p_lagi.value;
        var max  = form.p_baru.value.length;
		if(lama==""){
		alert('mohon isi password lama!');
		return false;
		}
        // if(form.p_baru.value.length < 8 ){

        //     alert('Password Harus Minimal 8 Karakter!');
        //     return false;
        //     // { return (ereg("^([[:alpha:]]&[[:digit:]])+$",$str)); }
        // }
        if(!form.p_baru.value.match(/^(?=.*\d)(?=.*[a-z])[0-9a-z]{8,}$/)){

            alert('Password harus berupa huruf dan angka & Minimal 8 Karakter!');
		    return false;


        }
		if(baru==""){
		alert('mohon isi password baru!');
		return false;
		}
		if(lagi==""){
		alert('ulangi ketik password baru!');
		return false;
		}
        
		if(baru!=lagi){
		alert('Password baru tidak cocok,\nCek ulang password baru Anda!');
		return false;
		}
		return true;
		}

	</script>				
	<?php
    

	if(isset($_POST['update'])){
	
	$lama = md5($_POST['p_lama']);
	$baru = md5($_POST['p_baru']);
	
	
	
		$query = mysqli_query($konek,"SELECT password FROM user WHERE username='$_SESSION[username]'");
        $r=mysqli_fetch_array($query);	
        
       if ($r['password']==$lama) {
        
            $sql=mysqli_query($konek,"UPDATE user SET password='$baru' WHERE username='$_SESSION[username]'");
				
			echo "<script>alert('User Berhasil Di Edit')</script>";
		}else{
			echo "<script>alert('User Gagal Di Edit')</script>";
		
		}
	}
?>	
						
                   </div>




                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

