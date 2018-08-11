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
        <title>Form Registrasi</title>
        <!-- <link rel="stylesheet" href="css/normalize.css"> -->
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <!-- <link rel="stylesheet" href="css/main.css"> -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>
    <body>

      <!-- <form action="RestAPI/register.php" method="post"> -->
      <form id="add_register" method="POST">
        <h1>Register</h1>
        
        <fieldset>
          <label for="name">Username:</label>
          <input type="text" id="username" name="username">
          
          <label for="name">Nama Lengkap:</label>
          <input type="text" id="realname" name="realname">
          
          <label for="mail">Email:</label>
          <input type="text" id="email" name="email">

          <label for="mail">No Handphone:</label>
          <input type="text" id="hp" name="hp">
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
          
       </fieldset>

        <button type="submit">Register</button>
       <a href="index.php"> <button type="button" class="btn btn-danger">
                    Login
                  </button></a>
      </form>
		<script type="text/javascript">
       
        
        $(document).ready(function() {

            
				  $('#add_register').submit(function(e){
						data = $('#add_register').serialize();
							$.ajax({
							type: "POST",
							url: "crud/insert.php",
							data: data,
							dataType: "json",
							success: function(result){
							   if(result.success){
								alert(result.msg);
								$('#add_register')[0].reset();
							   }
							}
						});
						e.preventDefault();
					});

        });

        
		

		
		</script>

    </body>
</html>