<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>change password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="css/update.css">

</head>
<header>
</header>
<body>
<?php
$nameErr = $phoneErr = $confrimErr = $emailErr =$passwordErr= "";
$name = $phone = $confrimpass=$password = $datea = $email = "";


if (isset($_POST['submit']))
{
              include 'config.php';
              if(strlen($_POST['password'])>0&&strlen($_POST["confrim_pass"])>0)
              {
              if($_POST['password']!=$_POST["confrim_pass"])
              {
                echo "<h1 style=color:red;> password dosn't match confiurm</h1>";
                echo"<br>";
                echo" <h1><a href= update.php> back to update</a> </h1>";
                die();
              }
              else 
              {
                $pass=$_POST['password'];
                $mail=$_SESSION['mail'];
                $stmt=$conn->prepare("update user set password= ? where email= ? ");
                $stmt->bind_param("ss", $pass,$mail);
                $stmt->execute();
                echo "<h1 style=color:green;> update complete successfully</h1>";
              }
              
              }
              else{
                echo       "<h1 style=color:red;> update Incomplete, please fill all data</h1>";
                echo"<br>";
                echo"<h1 >password , conifurm password </h1>";
                echo" <h1><a href= update.php> back to update</a> </h1>";
                die();
                }
              
            }
?>

<div class=".container">
  <div class='#logbox'>
    <!-- <h1>  Create an account </h1> -->
    <form  method="POST" action="">
    <h1>  change password </h1>
      <div>
        <!--name for password-->
        <i class="login__icon fas fa-lock"></i>
        <label for="password"> <h3><span class="error"> <?php echo $passwordErr;?></span>Password:</h3></label>
          <input class="form-control" type="password" name='password' placeholder="Choose a password"/>          

      </div>

  <div>
        <!--name for  confrim password-->
        <label for="confrim_pass"> <h3><span class="error"> <?php echo $confrimErr;?></span> Confirm password:</h3></label>
          <input class="form-control" type="password" name='confrim_pass' placeholder="confirm  a password"/>          

      </div>
<div>

        <input type="submit" name="submit">Update</input>

  </div>
    </form>
</div>
</div>
</body>
</html>
