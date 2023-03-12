
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
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
  <!--including style.css-->
  <link rel="stylesheet" href="styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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


 
    .abt
    {
        background-color: rgb(183, 191, 189);
        margin-top:130px;
        height:100%;
        border-radius:5px;
        
    }
    .abt:hover
    {
        box-shadow:0px 0px 20px rgb(0, 7, 6);
        transition:.4s;
    }
    .abt p{
        font-size:20px;
        padding-left: 10px;
        padding-left: 20px;
        
    }

    .abt h2{
        padding-top:40px;
        margin-left:20px;
        margin-top:0px;
        color:rgb(18, 43, 33);
      }
     
       .sp
       {
        font-weight: 600;
        
       }
       #more {display: none;}

       .mybtn
       {
        text-decoration: none;
        border:none;
        background-color: rgb(183, 191, 189);
        color:rgb(20, 113, 78);
       }

       body {
          background-image: url("./imgs/5.jpg");
          background-repeat: no-repeat;
          background-size: cover;
         
        }
     </style>

</head>

<body>

<!--bootstrap link n many more-->

  
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script>
    function myFunction() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");
    
      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
      }
    }
    </script>
    <script>
  function checkLogin()
  {
    let btn = document.getElementById("loginbtn");
    if(btn.innerHTML=="Login")
    location.replace("./signin.php");
    else
    location.replace("./logout.php");
  }
</script>
    
  
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
          <a class="nav-link mx-2" href="#" target="_blank">SkillUp</a>
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
<!--navbar ends-->


<!--bg img starts-->
<div class="container-fluid">
  <div class="row about" >
    <div class="col-md-8 mx-auto ">
   
       <div class="abt">
          <h2><b>ABOUT US</b></h2>
         <p>
            Welcome to our <span class="sp">HireUp</span> platform with a unique Skill Up feature!
            <br>We are a team of professionals who believe in bridging the gap between job seekers and employers. Our platform is designed to provide job seekers with the necessary tools and resources to enhance their skills and find the right job for them
            <span id="dots">....</span>
            <span id="more">Our Skill Up feature is a cutting-edge tool that helps job seekers to identify their strengths and weaknesses and provide them with customized recommendations to enhance their skills. We understand that learning is a continuous process, and we are committed to helping job seekers stay up-to-date with the latest industry trends and best practices.
             <br>We work closely with employers to understand their requirements and provide them with a pool of qualified candidates who match their needs. Our platform uses advanced algorithms and machine learning to match job seekers with the right job opportunities, ensuring a smooth and efficient hiring process.
             At our platform, we value transparency and accountability, and we are committed to providing an excellent user experience to our clients. We believe that everyone deserves the opportunity to grow and succeed, and we are here to help job seekers and employers achieve their goals.
             Thank you for choosing our platform, and we look forward to helping you Skill Up and achieve your career goals!</span><button onclick="myFunction()" id="myBtn" class="mybtn"><u>Read more</u></button></p>
             
        </div>  
   </div>
</div>
</div>
<!--bg img ends-->
    

     
</body>
</html>

