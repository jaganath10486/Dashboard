<?php
    include 'config1.php';

    $Id = $_SESSION['id'];

    if(!isset($Id))
    {
        header('location:login.php');
    }

    if(isset($_POST['update']))
    {
        $name = $_POST['name'];
        $phoneno = $_POST['phone_no'];
        $age = $_POST['age'];
        $cgpa = $_POST['cgpa'];
        $quali = $_POST['quali'];

        $query = "UPDATE `user` SET `Name`='$name',`Phone_no`='$phoneno',`Age`='$age',`Qualification`='$quali',`CGPA`='$cgpa' WHERE Id = '$Id' ";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            echo 'Data Updated Successfully';
            header('location:dashboard.php');
        }
        else
        {
            echo 'Data Not Updated';
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>

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

.update_profile
{
    top: 50px;
    margin-left: 300px;
    display: flex;
    justify-content: center;
    flex-direction: column;

}

input
{
    padding: 15px;
    margin: 10px;
}

label
{
    margin-right: 100px;
}

button
{
  margin-top: 50px;
  padding: 10px 15px;
  text-align: center;
  color: white;
  background-color: #1a8cff;
  border: none;
  font-size: 20px;
  cursor: pointer;
  margin-right: 50px;
  border-radius: 6px;
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
      <a  href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
      <a class="active" href="update.php"><i class="fa fa-address-card-o" aria-hidden="true"></i>Update</a>
      <a href="logout.php"><i class="fa fa-envelope" aria-hidden="true"></i>Log Out</a>
   </div>

      <div>
          <?php
            $query = "SELECT `Email`, `Password`, `Name`, `Phone_no`, `Age`, `Qualification`, `CGPA`, `Id` FROM `user` WHERE Id = '$Id' ";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
          ?>
      </div>
      <?php
  
      
        echo "<div class='update_profile'>
          <form method='post' action = ''>
             <label>Name   :</label>
             <input type='text' name = 'name' value=".$row['Name'].">
             <br>
             <label> Age :</label>
             <input type='number' name = 'age' value=".$row['Age'].">
             <br>
             <label>Qualification:</label>
             <input type='text' name = 'quali' value=".$row['Qualification'].">
             <br>
             <label>CGPA    :</label>
             <input type='text' name = 'cgpa' value=".$row['CGPA'].">
             <br>
             <label>Phone_No  :</label>
             <input type='text' name = 'phone_no' value=".$row['Phone_no'].">
             <br>
             <button type='submit' name = 'update'>
             Update Profile
             </button>
             <button type='Reset' name = 'reset'>
             Go Back
             </button>
          </form>
      </div>"
      ?>
     

    </div>


</body>
</html>