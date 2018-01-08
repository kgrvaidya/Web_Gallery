<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  
  <title>Accounts</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="pen-title">
  <h1>Login - Register</h1>
  <h2 id="heading">Invalid Credentials</h2>
</div>
<!-- Form Module-->

<div class="module form-module">
  
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Me</div>
  </div>
  
  <div class="form">
    <h2>Login to your account</h2>
    <form form action="login.php" method="post">
      <input type="text" placeholder="Username" name="Uname">
      <input type="password" name="Pswd" placeholder="Password"/>
      <button>Login</button>
    </form>
  </div>
  
  <div class="form">
    <h2>Create an account</h2>
    <form action="register.php" method="post">
      <input type="text" name="name" placeholder="Name"/>
      <input type="email" name ="email" placeholder="Email Address"/>
	  <input type="password" name="pswd" placeholder="Password"/>
      
      <button>Register</button>
    </form>
  </div>
  <div class="cta"><a href="#">Forgot your password?</a></div>
</div>


  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  

    <script src="js/index.js"></script>

</body>
</html>
