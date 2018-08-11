<?php

include "../koneksi.php";
					
						
						$user=$_GET['user'];
	
						$hapus=mysqli_query($konek,"delete from user where username='$user'");
						if($hapus){
							echo "<script>alert('Data Terhapus')
								location.replace('dashboard.php')</script>";
						}else{
							echo "<script>alert('Data Gagal Terhapus')
								location.replace('dashboard.php')</script>";
		}
	
	
						
					
					?>