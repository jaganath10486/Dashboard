<?php
    include 'config1.php';

    $Id = $_SESSION['id'];

    if(!isset($Id))
    {
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
    <style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin-top: 0px;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

.xyz
{
    display: flex;
    justify-content: center;
    flex-direction: column;
    margin-left: 450px;
    padding-top: 200px;
    font-size: 30px;
}

.card
{
  width: 60%;

}


@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
  
}
</style>
</head>
<body>

   <div class="sidebar">
      <a class="active" href="#"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
      <a href="update.php"><i class="fa fa-address-card-o" aria-hidden="true"></i>Update</a>
      <a href="logout.php"><i class="fa fa-envelope" aria-hidden="true"></i>Log Out</a>
   </div>

   <div class="xyz">
       
     <?php
      $query = "SELECT `Email`, `Password`, `Name`, `Phone_no`,  `Id` FROM `user` WHERE Id = '$Id' ";    
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);

      
      echo '<div class="card">
          <h5 class="card-header">Details : </h5>
          <div class="card-body">
              <h4 class="card-title">'.$row['Name'].'</h4>
              <h6 class="card-text">'.$row['Email'].'</h6>
           </div>
      </div>';

     ?>
   </div>
    
</body>
</html>