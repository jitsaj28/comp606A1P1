<?php
    session_start();
    require_once('dbconnection.php');
?>

<!DOCTYPE html>
<html>
<head>
<h3> Reset Password</h3>
</head>


            
        <form action="forgotpass.php" method="post">
        
            
                <input type="text"  name="email" required>
                <input type="password" placeholder="Enter Password" name="password" required>
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
                <button class="sign_up_btn" name="reset" type="submit">Reset Password</button>
            
        </form>
        
        <?php
            if(isset($_POST['reset']))
            {
                $email=$_POST['email'];
                
                $password=$_POST['password'];
                $cpassword=$_POST['cpassword'];
                
                if($password==$cpassword)
                {
                    $encrypt = base64_encode($password);
                    $query = "select * from reg_users where email='$email' ";
                    //echo $query;
                    $query_run = mysqli_query($db,$query);
                    if($query_run){
                        $query1 = "update users set password='$encrypt' where username='$email' ";
                        $query_run = mysqli_query($db,$query1);
                        $p = $row['password'];
                        $pass = base64_decode($p);
                        echo "Hello : ".$pass;
                    }
                }
                              




             } 

                
                else{
                    echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';

                }
            
            
        ?>
        
    </div>
</body>
</html>