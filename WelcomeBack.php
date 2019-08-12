<html>
<?php
session_start();
require_once('dbconnection.php');
//------------Accepting Session values into variables---------------------
@$f_name =  $_SESSION['f_name'];
@$l_name = $_SESSION['l_name'];
@$email = $_SESSION['email']; 
@$password = $_SESSION['password'];


if ($_SESSION['email'] =='' )
header( "Location: notfound.php"); 
session_destroy();

?>
    <header>
    <h5 align = "center">Welcome Back <?php echo $f_name?></h5>
    </header>
     <body>
        
    <table align="center">
    <tr>
    <td> <label> Name: </label> </td>
    <td> <?php echo $f_name , "   ", $l_name ?> </td>
    </tr>

    <tr>
    <td> <label> Email: </label> </td>
    <td> <?php echo $email; ?> </td>
    </tr>

    <tr>
    <td> <label> Password: </label> </td>
    <td> <?php echo $password; ?> </td>
    </tr>
    

</table>

     </body>

</html>

