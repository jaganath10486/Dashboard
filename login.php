<?php 
include 'config1.php';

session_start();

  if(isset($_POST['Login1']))
  {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $query = "SELECT `Email`, `Password`, `Name`, `Phone_no`, `Age`, `Id` FROM `user` WHERE Email = '$email' and Password = '$password' ";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      if($row['Email'] == $email && $row['Password'] == $password)
      {
          $_SESSION['id'] = $row['Id']; 
          header("location:dashboard.php");
      }
      else
      {
          echo "Incorrect Password or EmailID";
      }

  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            body
            {
                background-image: url('login.webp');
                background-size: cover;
                background-repeat: no-repeat;
            }
            .container
            {
                box-shadow: 10px 5px 10px lightslategray;
                background-color: white;
                height: 500px;
                width: 500px;
                border: 2px solid whitesmoke;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;   
            }
            .heading
            {
                font-size: 20px;
                padding: 10px;
                text-align: center;
            }
            #btn 
            {
                margin-top: 30px;
                width: 480px;
            }
            .new_user
            {
                padding: 20px;
                text-align: center;
            }
            .form-control
            {
                background-color: rgb(255, 255, 255);
            }
        </style>
    </head>
    <body>
        <div class = "container">
        <div class="heading">
        <h1>Sign In</h1>
        <p>with your email and password</p>    
        </div>
        <form method="POST">
  <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Email address</label>
     <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "email" required oninvalid="this.setCustomValidity('Enter Email Address')"
     oninput="this.setCustomValidity('')"  />
     <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
   </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name = "password" required oninvalid="this.setCustomValidity('Enter Password')"
    oninput="this.setCustomValidity('')"  />
  </div>
  <button type="submit" class="btn btn-primary" name = "Login1" id="btn">Submit</button>
  <div class="new_user">
   <p>New User?</p>
   <p>Create Account <a href="user_reg.php">Sing Up here</a></p>
  </div>
</form>
        </div>
    </body>
</html>