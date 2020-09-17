<?php
session_start();
if(isset($_SESSION['admin'])){
  header("Location: dashbord.php");
  die();
} 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashbord Login</title>
  <link rel="shortcut icon" type="image/x-icon" href="../image/logo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}

    input[type=text], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
       display: block;
       float: none;
     }
     .cancelbtn {
       width: 100%;
     }
   }
 </style>
</head>
<body>

  <h2>Admin login</h2>
  <div style="width: 80%; margin: 20px auto;">
    <div class="imgcontainer">
      <img src="image/img_avatar2.png" alt="Avatar" class="avatar" style="width: 200px;">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" id="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

      <button type="submit" onclick="login()">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </div>

</body>
</html>

<script type="text/javascript">
  function login() {
   var username = $("#uname").val();
   var psw = $("#psw").val();
   $.ajax({
    url: "login.php",
    type: "POST",
    data: {
      uname:username,
      psw:psw      
    },
    cache: false,
    success: function(dataResult){
      console.log(dataResult);
      var data = JSON.parse(dataResult);
      console.log(data);
      if(data.status=="valid"){
        window.location.href = "dashbord.php";
      }else{
        alert("Invalid username/password");
      }           
    }
  });
 }
 
</script>
