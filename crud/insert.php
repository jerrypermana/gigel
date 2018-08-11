
<?php
include "../koneksi.php";
//$author = $_POST['author'];
$status = true;
$ret=array(
			'success'=>false,
			'msg'=>'Gagal Register'
		);

        
        

       
        // $lowercase = preg_match('@[a-z]@', $_POST['password']);
        // $number    = preg_match('@[0-9]@', $_POST['password']);
        
        $nama       = $_POST['realname'];
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $hp         = $_POST['hp'];
        $password   = md5($_POST['password']);
        
        $pola_tlp = "^[0-9]+$";
        $polaemail = "^.+@.+\..+$";

    if(!eregi($pola_tlp, $hp)){ 

        $ret['success'] = true;
        $ret['msg'] = "No HP Berupa Harus Angka Ex. 085277772698 \n";


    }else if(!eregi($polaemail, $email)){


        $ret['success'] = true;
        $ret['msg'] = "Format Email Harus Sesuai Ex. ******@gmail.com \n";


    }else if(strlen($_POST['password']) < 8 ) {
        $ret['success'] = true;
        $ret['msg'] = "password minimal 8 karakter";

    }else if( !preg_match("#[a-z]+#", $_POST['password']) ) {
            $ret['success'] = true;
            $ret['msg'] = "Password harus berupa huruf dan angka \n";
   }else{    

    $query=mysqli_query($konek, "INSERT INTO user (realname, username, email, hp, password)
    VALUES('$nama', '$username', '$email', '$hp','$password')");
    $status &= $query;
    
    if($status){
        $ret['success'] = true;
        $ret['msg'] = "Berhasil Menambahkan Data Register \n";
    }
    
}					
echo json_encode($ret);

?>