
<?php
require_once "connection.php";
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location:index.php");
    exit;
}


$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM signup WHERE username = ? and password= ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_password);
    $param_username = $username;

    $param_password=$password;
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    
                    // mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    // if(mysqli_stmt_fetch($stmt))
                    // {
                    //     if(password_verify($password, $hashed_password))
                    //     {
                    //         // this means the password is correct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location:index.php");
                            
                    //     }
                    //     else{
                    //       echo'<script type="text/JavaScript">';
                    //       echo'alert("Enter correct Username/Password")';
                    //       echo'</script>';
                    //     }
                    // }

                }
                else
                    echo "<script>alert('Enter correct username or password');</script>";

    }
}    


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        
        body {
          background-image: url("./imgs/4.jpg");
          background-repeat: no-repeat;
          
        }
        
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--including style.css-->
     <link rel="stylesheet" href="styles.css">
     
    
    

</head>


<body>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

      
    <div class="container">

       <div class="row">
         <div class="col-md-6 mx-auto log" id="signin-form">
            <center>
          
         <center><h2><b>LOGIN</b></h2><br></center>
         <p style="color: #999494;margin-bottom:40px;font-size:18px">Please enter your login and password!</p>
         
           <form action="" method="post">
             <input type="text" name="username" class="form-control textbox" placeholder="Enter Username" style="background: #332d2d;border: 2px solid white;max-width: 24rem;color: white !important;margin-bottom:20px;font-size: 20px;border-radius: 6px;" required><br>
             <input type="password" name="password" class="form-control textbox" id="pass" placeholder="Enter Password" style="background: #332d2d;border: 2px solid white;max-width: 24rem;color: white !important;margin-bottom:20px;font-size: 20px;border-radius: 6px;" required>
             <br><br>
             <input type="submit" class="btn" id="login_btn" name="submit" value="Log in" style="width:100%;color:white;font-size:18px;"><br>
             <b><p style="padding-top:10px;margin-top:20px;">Don't have an account?<a class="loga"href="signup.php" style="color:#007bff;text-decoration:none;"> Sign up.</a></p></b>
             <div>
               
             </div>
        </form>
    </center>
         </div>
       </div>
     </div>

     <script>
    function show() {
    var x = document.getElementById("pass");
    if (x.type === "password") {
    x.type = "text";
    } 
    else {
    x.type = "password";
    }
}
</script>
</body>
</html>
