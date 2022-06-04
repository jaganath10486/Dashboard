<?php
  include 'config1.php';
  
  if(isset($Id))
  {
    header('location:dashboard.php');
  }

  if(isset($_POST['Applicant']))
  {
     $email = $_POST['email'];
     $phone_no = $_POST['phone_no'];
     $name = $_POST['name'];
     $pass = $_POST['password'];
     $age = $_POST['age'];
     $query = "INSERT INTO `user`(`Email`, `Password`, `Name`, `Phone_no`, `Age`) VALUES ('$email','$pass','$name','$phone_no','$age')";
     $result = mysqli_query($conn, $query);
     if($result)
     {
       echo "Saved Successufully";
     }
     else
     {
        echo "Error: Could Not able to Excute $sql.".mysqli_error($conn);
     }
    
    }

?>

<!DOCTYPE html>
<html lang = "en">
    <head>
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
                height: 850px;
                width: 600px;
                border: 5px solid whitesmoke;
                margin-left: auto;
                margin-right: auto;
                margin-top: 40px;
            }
            h1
            {
                text-align: center;
                color: green;
                padding: 10px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            #btn
            {
                margin-top: 30px;
                width: 580px;
            }
            .foot
            {
                text-align: center;
                padding: 10px;
            }
            .form-control
            {
                background-color: rgb(255, 255, 255);
            }
            #message 
            {
              display:none;
              background: #f1f1f1;
              color: #000;
              position: static;
              padding: 20px;
              margin-top: 10px;
            }
            #message p 
            {
              padding: 10px 35px;
              font-size: 18px;
            }
    </style>
</head>
<body>
    <div class ="container">
    <h1>Applicant Registration</h1>
 <form method = "POST" id="registration" onsubmit="return formValidation()">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "example@gmail.com" name = "email" required oninvalid="this.setCustomValidity('Enter Email Address')"
        oninput="this.setCustomValidity('')"  />
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputNumber" class="form-label">PhoneNumber</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">+91</span>
        <input type="tel" class="form-control" id="exampleInputnumber" name = "phone_no"  pattern ="[7-9]{1}[0-9]{9}" required oninvalid="this.setCustomValidity('Enter Correct Phone Number')"
         oninput="this.setCustomValidity('')">
      </div>
      <span class="form-text">Format: Phone number with 7-9 and remaing 9 digit with 0-9 Ex:9654321874</span>
    </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName" name = "name" required>
  </div>
  <div class="mb-3">
    <label for="inputPassword5" class="form-label">Age</label>
    <input type="number" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name ="age" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8-20 more characters">
  </div>
  <div class="mb-3">
    <label for="inputPassword5" class="form-label">Password</label>
    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name ="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8-20 more characters">
  </div>
  <div class="mb-3">
    <label for="inputPassword2" class="form-label">Confirm Password</label>
    <input type="password" id="inputPassword2" class="form-control" aria-describedby="passwordHelpBlock" required name = "Cpassword">
    <div id="Cpass_check" class="form-text" style="display: none; color : red;">
      Password and Confirm Password Must should be Match
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name = "Applicant" id = "btn">Submit</button>
  <div class="foot">
    <p>By creating Account you agreed to our <a href="#">Terms and condition</a></p>
    <p><br>Already Register<a href="login.php">Login here</a></p>
  </div>
 </form>
 </div>
  <script>
    // For password Validation
function confirm_password()
{
    var frm  = document.forms['registration'];
    var Cpass = frm['Cpassword'].value;
    var pass = frm['password'].value;
    if(pass != Cpass)
    {
        document.getElementById("Cpass_check").style.display = "block";
        document.getElementById("inputPassword2").style.backgroundColor = "#ffe6ee";
        document.getElementById("inputPassword2").style.borderColor = "#b1395f";
        return false;
    }
}

//main function
function formValidation()
{
    return confirm_password();
}


  </script>
</body>
</html>