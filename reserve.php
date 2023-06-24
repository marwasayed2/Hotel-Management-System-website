<?php
    if (isset($_POST['submit']))
{
              include 'config.php';
              if(strlen($_POST['first'])>0&&strlen($_POST['last'])>0&&strlen($_POST["phone"])>0&&strlen($_POST["mail"])>0&&strlen($_POST["address"])>0&&$_POST["room"]>0&&$_POST["bed"]>0)
              {
                $email=$_POST['mail'];
                $first=$_POST['first'];
                $last=$_POST['last'];
                $phone=$_POST['phone'];
                $address=$_POST['address'];
                $room=$_POST['room'];
                $bed=$_POST['bed'];
                $comment=$_POST['comment'];
                $SELECT="SELECT email From room Where number= ? Limit 1";
                $INSERT="INSERT Into room (email,number,first_name,last_name,phone,address,Num_bed,comment)values(?,?,?,?,?,?,?,?)";
                $stmt=$conn->prepare($SELECT);
                $stmt->bind_param("s", $room);
                $stmt->execute();
                $stmt->bind_result($room);
                $stmt->store_result();
                $rnum=$stmt->num_rows;
                if($rnum==0){
                    $stmt->close();
                    $stmt=$conn->prepare($INSERT);
                    $guest='guest';
                    $stmt->bind_param("sissssis",$email,$room,$first,$last,$phone,$address,$bed,$comment);
                    $stmt->execute();
                    $stmt->store_result();
                    echo "<h1 >Reservation Sucssefully</h1>";
                    echo"<br";
                }else{
                    echo" <h1>Some One reserved this room </h1>";
                    echo"<br";
                    echo " <h1>  </h1>";
                    echo "<h1> $room </h1>";
                    echo" <h1><a href= reserve.php> NEW Reservation?</a> </h1>";
                }
                $stmt->close();
                $conn->close();
              }
              else{
                echo       "<h1 style=color:red;> Reservation Incomplete, please fill all data</h1>";
                echo"<br>";
                echo" <h1><a href= reserve.php> back to registration</a> </h1>";
                die();
                }
              
            }
?>
<html>
    <head>
        <link rel="stylesheet" href="css/reserve.css">
        <title>Hotel Reservation Form</title>
    </head>
    <body>
        <form action="" method="post">
            <h1>Hotel Reservation Form</h1>
            <table>
                <tr>
                    <td><label> First Name</label></td>
                    <td><input type="text" placeholder="Your first name" name="first"></td>
                </tr>
                <tr>
                    <td><label> Last Name</label></td>
                    <td><input type="text" placeholder="Your last name" name="last" ></td>
                </tr>
                <tr>
                    <td><label> Phone Number</label></td>
                    <td><input type="text" placeholder="Your phone number" name="phone"></td>
                </tr>
                <tr>
                    <td><label> E-mail </label></td>
                    <td><input type="email" placeholder="myname@example.com" name="mail"></td>
                </tr>
                <tr>
                    <td><label> Address</label></td>
                    <td><input type="text" placeholder="Your Address" name="address"></td>
                </tr>
                <tr>
                    <td><label> Room's Number</label></td>
                    <td><input  type="number" name="room"></td>
                </tr>
                <tr>
                    <td><label> Number of Beds</label></td>
                    <td><input  type="number" name="bed"></td>
                </tr>
                <tr>
                    <td><label> Comment </label></td>
                    <td colspan="2"><input class="lo" type="text" name="comment"></td>
                </tr>
                <tr>
                    <td ><input class="btn" type="submit" value="Submit" name="submit"></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </body>
</html>