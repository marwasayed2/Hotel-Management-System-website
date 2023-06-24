<!DOCTYPE html>
<html>
  <head>
    <title>sing_up_in_my_hotel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="css/sign_up_in_hotell.css">

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
              if(strlen($_POST['email'])>0&&strlen($_POST['password'])>0&&strlen($_POST["confrim_pass"])>0)
              {
              if($_POST['password']!=$_POST["confrim_pass"])
              {
                echo "<h1 style=color:red;> password dosn't match confiurm</h1>";
                echo"<br>";
                echo" <h1><a href= sign_up.php> back to registration</a> </h1>";
                die();
              }
              else 
              {
                $email=$_POST['email'];
              $password=$_POST['password'];
              $SELECT="SELECT email From user Where email= ? Limit 1";
                $INSERT="INSERT Into user (email,Password,kind)values(?,?,?)";
                //prepare statement
                $stmt=$conn->prepare($SELECT);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->bind_result($email);
                $stmt->store_result();
                $rnum=$stmt->num_rows;
                if($rnum==0){
                    $stmt->close();
                    $stmt=$conn->prepare($INSERT);
                    // $stmt->bind_param("sssssi",$username,$phone,$email,$password,$confirm);
                    $guest='guest';
                    $stmt->bind_param("sds",$email,$password,$guest);
                    $stmt->execute();
                    $stmt->store_result();
                    echo "<h1 >Registraion Sucssefully</h1>";
                    echo"<br";
                    echo " <h1> welcome $username </h1>";
                    header('location:index.php');
                }else{
                    echo" <h1>Some One Has This Email </h1>";
                    echo"<br";
                    echo " <h1>  </h1>";
                    echo "<h1> $email </h1>";
                    echo" <h1><a href= sign_up.php> NEW Registraion?</a> </h1>";
                }
                $stmt->close();
                $conn->close();
              }
              
              }
              else{
                echo       "<h1 style=color:red;> Registration Incomplete, please fill all data</h1>";
                echo"<br>";
                echo"<h1 > email , password , conifurm password </h1>";
                echo" <h1><a href= sign_up.php> back to registration</a> </h1>";
                die();
                }
              
            }
?>

<div class=".container">
  <div class='#logbox'>
    <!-- <h1>  Create an account </h1> -->
    <form  method="POST" action="">
    <h1>  Create an Account  In Hotel </h1>
      <div>
        <!--name for email-->
        <label for="email"> <h3><span class="error"><?php echo $emailErr;?></span>Email:</h3></label>
          <input class="form-control" type="email" name='email' placeholder="enter your email"/>          

      </div>

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

        <input type="submit" name="submit" value="Sign Up"></input>

  </div>
    </form>
</div>
</div>
</body>
</html>
