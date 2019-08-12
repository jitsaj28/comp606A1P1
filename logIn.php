<?php
	session_start();
	require_once('dbconnection.php');
?>

<html>
    <body>
        <form  action="logIn.php" method="post">

            <table align="center">  
  
            <tr>  
                 <td> <label>E-mail</label></td>
                <td> <input type="text" name="email" > </td>
            </tr>
  
            <tr>  
                  <td> <label>Password</label></td>
                  <td> <input type="password" name="password" > </td>
            </tr>

            <tr> <td></td>
                <td> <button type="submit" class="btn" name="logIn" > Login</a></button> </td>
                <td> <a href = forgotpass.php> Forgot password</a> </td>
            </tr>   
  
              </table>
              <button type="submit" class="btn" name="logIn" > Login</a></button>
        </form>

                <?php
                if(isset($_POST['logIn']))
                {
                    @$email = $_POST['email']; 
                    @$password1 = $_POST['password'];       
                    
                       $query = "select * from  reg_user where email='$email' and password= '$password1'";
                    
                    $result = mysqli_query($db, $query);
                    
                    if (mysqli_num_rows($result) > 0) 
                    {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result))
                         {
                            
                              $f_name = $row["f_name"];
                              $l_name = $row["l_name"];
                              $p = $row['password'];
                              $pass3 = base64_decode($p);
                              echo "PASSWORD: ".$pass3;
//-------------------------Creating Session variable for the value to be transmitted to the next page-----------
                            $_SESSION['email']  = $email;
                           
                        }
                    } 
                    else
                   echo '<script type="text/javascript">alert("User Not Registered.. Register first")</script>';
                    
                    
                    mysqli_close($db);


                }
                


                ?>
    </body> 
</html>