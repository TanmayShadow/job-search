
<?php
$btn="Login";
session_start();
if(isset($_SESSION['username']))
{
    $btn="Logout";
}
else
{
  $btn="Login";
}
?>

<!--html code-->
<!DOCTYPE html>
<html lang="en">
  <title>HireUp</title>
<head>
  <link rel="icon" type="image/png" sizes="196x196" href="HireLight.png"/>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
  <!--including style.css-->
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

    
    <style>

  /*menubar starts*/
    .navbar-nav a{
    font-size:18px;
    color:rgb(244, 236, 236);
    text-transform:uppercase;
    font-weight:500;
    margin-left:15px;
    padding-top:20px;
    padding-bottom:20px;
    
  }
  
  .navbar-dark {
   background-color:rgb(0, 0, 0);
  }
  .navbar-dark .navbar-brand{
   color:rgb(236, 236, 236);
   font-size:33px;
   font-weight:700px;
   padding-top:3px;
   padding-left:15px;
  }
  .navbar-dark .navbar-brand:focus,
  .navbar-dark .navbar-brand:hover{
   color:white;

  }
  .navbar-dark .navbar-nav .navbar-link{
   color:rgb(246, 238, 238);
  }
  .w-100{
   height:100vh;
  }
  

  /*responsive css*/
  @media screen and(max-width:200px) {
    
  
  }   
  /*menubar ends*/        


 /*background img & text*/

 .bg-image{
 background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.4)), url(./imgs/img1.jpg);
 background-size: cover;
 background-position: center;
 background-repeat:no-repeat;
 height: 500px;
 position: relative;
 
 } 
 .mydesc
    {
      width: 500px;      
      color: #fff;
      padding:50px;
      position:absolute;
      top:25%;
      left:50%;
      transform: translate(-50%,-25%);
      text-align: center;
      font-size:20px;
    }
    
    /*cards for introduction*/

    .mycard
    {
      background-color:rgb(206, 214, 212);
      padding: 20px;
      text-align: center;
      margin-top: 15px;
      color:rgb(86, 13, 134);
    }

    .mycard:hover{
   box-shadow:0px 0px 20px rgb(0, 7, 6);
   transition:.4s;
   }
   .mycard span{
     font-size:30px;
     color:green;
     padding-right:8px;  
   }
   .mycard h3{
       text-align:center;
       color:rgb(15, 4, 22);
       padding-top:0px;

   }
   .mycard p{
      color:black;
   }

   .f {
          padding-top:15px;
          color:rgb(86, 13, 134);
        }
        .dwnld{
        background-color:rgb(80,31,126);
        border: none;
        color:white;
        text-align:center;
        padding-top:8px;
        text-decoration: none;
        display: inline-block;
        font-size:20px;
        margin-top:25px;
        cursor: pointer;
        height:80px;
        width:70%;
        border-radius:22px;
        
        }
        .dwnld:hover{
          text-decoration:none;
          background-color:white;
          color:rgb(80,31,126);;
        }
      
  
  
   /*about & feature 3rd div*/

    /*about*/
    .abt{
        height:250px;
        margin-top:60px;
        background-color:rgb(254, 254, 254);
        
          
      }
      .abt p{
       padding-left:20px;
       padding-top:15px;
       color:rgb(12, 11, 11);
       font-size:18px;
      }
      .abt h2{
        margin-left:20px;
        margin-top:0px;
        color:rgb(18, 43, 33);
      }
      .abt span{
        color:rgba(38, 132, 29, 0.976);
      }
      .abt h6{
       margin-top:20px;
       margin-left:20px;
       color:rgb(11, 10, 10);
      }
      h6::after
      {
       content:" ";
       display:inline-block;
       background-color:rgb(10, 9, 9);
       height:2px;
       width:120px;
       margin-bottom:5px; 
       }

       
 

          /*social media icon*/

          .social{
            
           padding:9%;
            
            
           }

           
          

.fa {
  border-radius: 25px;
  padding: 07px;
  font-size: 20px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 20px 5px;
}

.fa:hover {
    opacity: 0.7;
    color:black;
}

.fa-facebook {
  background: #f0f2f3;
  color: rgb(38, 61, 121);
  text-align: center;
}

.fa-linkedin {
  background: #f0f2f3;
  color: rgb(60, 73, 171);
}

.fa-youtube {
  background: #f0f2f3;
  color: rgb(160, 36, 36);
}

.fa-instagram {
  background: #f0f2f3;
  color: rgb(163, 66, 163);
}

.fa-twitter {
  background: #f0f2f3;
  color: rgb(65, 156, 208);
}

.cprt{
  margin-left: 25px;
  margin-top:100px;
  padding-top: 20px;
  font-size: 15px;
  text-align: center;
  

}


          


 /*for last space 7th div*/
 .space{
    width:100%;
    background-color:white;
    height:40px;
    margin-top:80px;
   }

     </style>

</head>

<body>

<!--bootstrap link n many more-->

  
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


  
<!--navbar starts-->
<div class="container-fluid">
    <div class="row">
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <b><a class="navbar-brand" href="#home">HireUp</a></b>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link mx-2" href="./index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="./about.php">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="./jobs.php">JOBS</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link mx-2" onclick="checkLogin()" target="_blank" id="loginbtn"><?php echo $btn; ?></a>
        </li>
      </ul>
</div>
</div>
 </nav>
</div>
</div>
<script>
  function checkLogin()
  {
    let btn = document.getElementById("loginbtn");
    if(btn.innerHTML=="Login")
      location.href = "./signin.php";
    else
      location.href = "./logout.php";
  }
</script>
<!--navbar ends-->


<!--bg img starts-->
<div class="container-fluid">
  <div class="row bg-image" id="home">
   <div col-md-12>
   <div class="mydesc">
          <div style="font-size:45px;">Find Job </div>
          <div style="font-size:22px;">Find the career you deserve</div>
          <div style="font-size:17px;margin-top:10px;">Your job search starts and ends with us.</div>
        </div>  
   </div>
</div>
</div>
<!--bg img ends-->
    

 <!--introdyctory part-->
<div class="container">
    <div class="row pt-5 pb-5">
      <div class="col-md-4 col-sm-6">
        <div class="mycard">
        <h3><span>&check;</span>WELCOME</h3>
           <p>Hireup was founded by with the very simple objectives:-Make job search easy and comprehensive for job seekers. Offer a clutter free, ad free, spam free, unobtrusive job search experience. FindMyJob is

            is one of the best Job search websites in India.</p>
        </div>

      </div>
      <div class="col-md-4 col-sm-6">
        <div class="mycard">
        <h3><span>&check;</span>CAREER</h3>
           <p>The site contains all types of jobs and helps an individual to find out the job of his or her choice relevant to his or her area of study, which help the students as well as the career builders by providing detailed information on various career options.</p>

      </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="mycard">
        <h3><span>&check;</span>BUILDERS</h3>
           <p>You can search for relevant jobs in your city and locality. Reach out to millions of job offers by posting your resume and creating alerts for free. It will help customize your personal search results and find a desired job.</p>
      </div>
      </div>
    </div>
  </div>
<!--what is meme,animaton,emoji ends-->

<footer class="bg-dark text-center text-white" style="margin-top: 20px;">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/tanmay-shindkar/" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/TanmayShadow" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="#/">HIREUP</a>
  </div>
  <!-- Copyright -->
</footer>
    <!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>
</html>

