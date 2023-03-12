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
<?php $sal=0;?>
<script>var salary=0;</script>
<!--html code-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" sizes="196x196" href="HireLight.png"/>

    <meta name="viewport" content="width=, initial-scale=1.0">
    <!--including style.css-->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="jobs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin&family=Inter+Tight:wght@300&family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet">


<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<style>
    .card{
        box-shadow:1px 3px 9px -1px rgb(108, 108, 108) ;
        width: 54rem;
        text-align: justify;
        border-radius: 23px;
    }
    .card:hover{
        box-shadow: 1px 3px 9px -1px black;
    }
    @media (max-width: 870px){
        .card{
            width: 21rem;
        }
    }
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
    </style>
</head>

<body style="background-color: #fafafa;">
<script>let page=1;</script>

    <!--bootstrap link n many more-->


    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <form method="get">
    <div class="search-bar">
      <input type="text" placeholder="Enter Skill" id="skill" name="skill"class="inputs" required/>
      <input type="text" placeholder="Enter Location" id="location" name="location" class="inputs" required/>
      <button class="btn btn-primary" id="search-btn" type="submit" onclick="getapi(page)">Search</button>
    </div>
  </form>
    <div class="sort-box">
      <b><label>Select Salary Range</label></b>
      <div class="sort-item">
        <input type="radio" name="salary-sort" id="choice1" onclick="sortSalary(10000)" value="10000"/>
        <label for="choice1">10000-50000</label>
      </div>
      <div class="sort-item">
        <input type="radio" name="salary-sort" id="choice2" onclick="sortSalary(50000)" value="50000"/>
        <label for="choice2">50000-100000</label>
      </div>
      <div class="sort-item">
        <input type="radio" name="salary-sort" id="choice3" onclick="sortSalary(100000)" value="100000"/>
        <label for="choice1">More than 100000</label>
      </div>
  </div>
 <center> 
  <div class="display-text">
        <h1>Find Your Job Here....</h1>
        <img src="./imgs/get-job.svg"/>
  </div>
</center>
    <script>
      function sortSalary(sal)
      {
        let prevElement = document.getElementsByClassName("mainCenter")[0];
        if(prevElement)
        {
            prevElement.remove();
            // console.log(prevElement);
            let val = <?php if(isset($_GET["skill"])){echo '"'.strval($_GET["skill"]).'"';}?>;
            let loc = <?php if(isset($_GET["location"])){echo '"'.strval($_GET["location"]).'"';}?>;
            salary=sal;
            getapi(1,val.toString(),loc.toString(),salary);
        }
      }
       async function getapi(pageno,ski,loc,salary) {
            let displayText=document.getElementsByClassName("display-text")[0];
            if(displayText)
              displayText.remove(); 
            let skill = ski;
            let location = loc;
            console.log(loc);
            if(ski=="")
            {
              skill = document.getElementById("skill");
              document.getElementById("location");
              skill = skill.value.replace(",","%20");
            }
            // else
            // skill=skill.toString();
            // skill=skill.replaceAll(/ /ig,"");
            skill=skill.replaceAll(/,/ig,"%20");
            let nextbutton = document.getElementById("nextbutton");
            if(nextbutton)
            {
                nextbutton.remove();
            }

            if(skill=="")
            {
              return;
            }
            let url = "https://api.adzuna.com/v1/api/jobs/in/search/"+pageno+"?app_id=fab7b12b&app_key=76ae44a562b6388da5181a484f97111e&results_per_page=10&what="+skill+"&where="+location+"&sort_by=date";
            if(salary)
            {
              if(salary==10000)
                url = "https://api.adzuna.com/v1/api/jobs/in/search/"+pageno+"?app_id=fab7b12b&app_key=76ae44a562b6388da5181a484f97111e&results_per_page=10&what="+skill+"&where="+location+"&sort_by=date&salary_min="+salary+"&salary_max="+(salary+50000);
              else
                url = "https://api.adzuna.com/v1/api/jobs/in/search/"+pageno+"?app_id=fab7b12b&app_key=76ae44a562b6388da5181a484f97111e&results_per_page=10&what="+skill+"&where="+location+"&sort_by=date&salary_min="+salary;
            }
            // Storing response
            console.log(url);
            const response = await fetch(url);
            var data = await response.json();
            show(data);
        }

        function show(data) {
            console.log(data);
            let center = createMyEle("center","mainCenter",null,null,null);
            let maindiv = createMyEle("div","row row-cols-1 row-cols-md-1 g-4",null,null,null);
            let col=createMyEle("div","col",null,null,null);
            for (var i = 0, len = data.results.length; i <len; ++i) {
                var r = data.results[i];
                col = createMyEle("div","col","margin-top: 35px;",null,null);
                let card = createMyEle("div", "card", "",null,null);
                let cardbody = createMyEle("div","card-body",null,null,null);
                let b = createMyEle("b",null,null,null,null);
                let b1 = createMyEle("b",null,null,null,null);
                let h5 = createMyEle("h4","card-title","font-family: 'Cabin', sans-serif;",r.title,null);
                let description=r.description;
                let p = createMyEle("p","card-text","font-family: 'Inter Tight', sans-serif;",description,null);
                b.appendChild(h5);
                b1.appendChild(p);
                cardbody.appendChild(b);
                cardbody.appendChild(b1);

                let ul=createMyEle("ul","list-group list-group-flush",null,null,null);
                let company=r.company.display_name;
                let li1 = createMyEle("li","list-group-item",null,"Company:"+r.company.display_name,null);
                let li2 = createMyEle("li","list-group-item",null,"Location:"+r.location.display_name,null);
                let li3 = createMyEle("li","list-group-item",null,"Max Salary:"+r.salary_max,null);
                ul.appendChild(li1);
                ul.appendChild(li2);
                ul.appendChild(li3);

                let newcardbody = createMyEle("div","card-body",null,null,null);
                let button = createMyEle("button", "btn btn-primary",null,"Apply",null);
                let link = createMyEle("a","card-link",null,null,r.redirect_url);
                link.appendChild(button);
                newcardbody.appendChild(link);

                card.appendChild(cardbody);
                card.appendChild(ul);
                card.appendChild(newcardbody);

                col.appendChild(card);
                maindiv.appendChild(col);
            }
            center.appendChild(maindiv);
            let nextBtn = createMyEle("button","btn btn-primary","margin-top:10px","More",null);
            // nextBtn.onclick=getapi(page++);
            let val = <?php if(isset($_GET["skill"])){echo '"'.strval($_GET["skill"]).'"';}?>;
            let loc = <?php if(isset($_GET["location"])){echo '"'.strval($_GET["location"]).'"';}?>;
            nextBtn.setAttribute("onclick", "getapi("+(page++)+",'"+val.toString()+"','"+loc.toString()+"',"+salary+")");
            nextBtn.setAttribute("id","nextbutton");
            center.appendChild(nextBtn);
            document.getElementsByTagName('body')[0].appendChild(center);
        }

        function createMyEle(type,classes,style,text,url)
        {
            let mdiv = document.createElement(type);
            mdiv.className=classes;
            if(style)
                mdiv.style.cssText=style;
            if(text)
                mdiv.innerHTML=text;
            if(url)
                mdiv.href=url;
            return mdiv;
        }
    </script>
    </body>
</html>

<?php
  if(isset($_GET["skill"]))
  {
    $val = strval($_GET["skill"]);
    $loc = strval($_GET["location"]);
    echo '<script>getapi(1,"'.$val.'","'.$loc.'")</script>';
  }      
?>