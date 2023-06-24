<?php
session_start();
$_SESSION["mail"]="";
?>
<html>
	<head>
		<meta charset="UTF-8">
        <title>WELCOME PAGE</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	
    <form action="" method="post">
        <h2>WELCOME TO LUNA HOTEL </h2>
        <div class="cont">
            <input type="email" placeholder="email" name="email">
        </div>
        <div class="cont">
            <input type="password" placeholder="Password" name="password">
        </div>
        <input type="submit" value="Login" name="Login">
        <?php
            include 'config.php';
            if(isset($_POST['Login']))
            {
                $stmt= $conn->prepare(" select * from user ");
                $stmt->execute();
                $res=$stmt->get_result();
                $email=mysqli_real_escape_string($conn,$_POST['email']);
                $password=mysqli_real_escape_string($conn,$_POST['password']);
                $found=0;
                while($row=$res->fetch_assoc())
                {
                    if($email==$row['email'] && $password==$row['password'])
                    {
                        $_SESSION['mail']=$row['email'];
                        if($row['kind']=='admin')
                        {
                            header('location:admin.php');
                        }
                        else if($row['kind']=='guest')
                        {
                            header('location:home.php');
                        }
                        else 
                        {
                            header('location:manager.php');
                        }
                        $found=1;
                    }
                }
                if($found==0)
                {
                    echo "<h1 style=\"color: red;\">INVALID DATA"."<br>";
                }
            }
        ?>
        <a href="sign_up.php" target="_blank">Don't have account?</a>
    </form>

	</body>


</html>