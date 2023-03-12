<?php
require_once "connection.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM signup WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO signup (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        // $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_password=$password;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          
            header("location: signin.php");
            
        }
       
        else{
          echo'<script type="text/JavaScript">';
          echo'alert("Something went wrong... cannot redirect!")';
          echo'</script>';
            
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <style>
        
        body {
          background-image: url("./imgs/5.jpg");
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

    <div class="container">
       <div class="row">
         <div class="col-md-6 mx-auto log1">
         <center><h2><b>Sign up</b></h2><br></center>
           <form action="" method="post">
             Username
             <input type="text" name="username" class="form-control" placeholder="Create Username" required><br>
             Password   
             <input type="password" name="password" class="form-control" id="pass" placeholder="Create Password" required>
             <input type="checkbox" onclick="show()">Show password<br><br>
             Confirm password
             <input type="password" name="confirm_password" class="form-control" id="rpass" placeholder="Re-Enter Password" required onkeyup="myfunction()">
             <p id="r1" ></p>
             <input type="submit" class="btn" name="submit" value="Sign up" style="width:100%;background-color:rgb(0, 0, 0);color:white;font-size:18px;"><br>
             <b><p style="padding-top:10px;color:black;">Already have an account?<a href="signin.php" style="color:rgb(0,0,0);text-decoration:none;"> Login.</a></p></b> 
             
            </form>
          
         </div>

       </div>
     </div>
                
   <script>
     function show(){
    var x = document.getElementById("pass");
    if (x.type === "password") {
    x.type = "text";
    } 
    else {
    x.type = "password";
    }   
    }

     function myfunction(){
                var pass1=document.getElementById("pass").value;
                var pass2=document.getElementById("rpass").value;
                if(pass1==pass2)
                {
                    document.getElementById("r1").innerHTML="Matched";
                    documnet.getElementById("r1").style.color="white";
                    
                }
                else
                {
                    document.getElementById("r1").innerHTML="Not-Matched";
                    documnet.getElementById("r1").style.color="white";
                }
            }
        </script>

   </script>
</body>
</html>

