<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>change password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="css/cancel.css">

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
              if($_POST['room']>0)
              {
                $room=(int)$_POST['room'];
                $mail=$_SESSION['mail'];
                $stmt=$conn->prepare("select * from room where email=? ");
                $stmt->bind_param("s",$mail);
                $stmt->execute();
                $res=$stmt->get_result();
                $found=0;
                while($row=$res->fetch_assoc())
                {
                    if($row['number']==$room)
                    {
                        $found=1;
                        break;
                    }
                }
                if($found==0)
                {
                    echo"<h1 style=color:red;> it isn't your room";
                }
                else 
                {
                    $stmt->close();
                    $stmt=$conn->prepare("delete from room where number =?");
                    $stmt->bind_param("i",$room);
                    $stmt->execute();
                    $stmt->store_result();
                    echo "<h1 style=color:green;> canceling complete successfully</h1>";
                }
              
              
              }
              else{
                echo       "<h1 style=color:red;> cancel Incomplete, please fill all data</h1>";
                echo"<br>";
                echo"<h1 >room number </h1>";
                echo" <h1><a href= cancel.php> back to cancel</a> </h1>";
                die();
                }
              
            }
?>

<div class=".container">
  <div class='#logbox'>
    <!-- <h1>  Create an account </h1> -->
    <form  method="POST" action="">
    <h1>  Cancel Renservation</h1>
      <div>
        <!--name for password-->
        <i class="login__icon fas fa-lock"></i>
        <label for="room"> <h3><span class="error"></span>Room Num :</h3></label>
        <input class="form-control" type="number" name='room' placeholder="Room Number"/>          

    </div>

<div>
        <button type="submit" name="submit">Cancel</button>
</div>
    </form>
</div>
</div>
</body>
</html>
