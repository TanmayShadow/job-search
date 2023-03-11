<!--html code-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!--including style.css-->
    <link rel="stylesheet" href="jobs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin&family=Inter+Tight:wght@300&family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet">
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
    .navbar-nav a {
        font-size: 18px;
        color: white;
        text-transform: uppercase;
        font-weight: 500;
        margin-left: 15px;
        padding-top: 20px;
        padding-bottom: 20px;

    }

    .navbar-dark {
        background-color: rgb(80, 31, 126);
    }

    .navbar-dark .navbar-brand {
        color: white;
        font-size: 33px;
        font-weight: 700px;
        padding-top: 3px;
        padding-left: 15px;
    }

    .navbar-dark .navbar-brand:focus,
    .navbar-dark .navbar-brand:hover {
        color: white;

    }

    .navbar-dark .navbar-nav .navbar-link {
        color: white;
    }

    .w-100 {
        height: 100vh;
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



    <!--navbar starts-->
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <b><a class="navbar-brand" href="#home">MemeX</a></b>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="#home">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="#about">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="#explore">JOBS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="feed.php" target="_blank">SKILLUP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="#" data-bs-toggle="modal"
                                    data-bs-target="#out">LOGOUT</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="search-bar">
      <input type="text" placeholder="Enter Skill" id="skill" name="skill"class="inputs"/>
      <input type="text" placeholder="Enter Location" id="location" name="location" class="inputs"/>
      <button class="btn btn-primary" id="search-btn" type="button" onclick="getapi(page)">Search</button>
    </div>
    <script>
       async function getapi(pageno) {
            let skill = document.getElementById("skill");
            let location = document.getElementById("location");
            let nextbutton = document.getElementById("nextbutton");
            if(nextbutton)
            {
                nextbutton.remove();
            }

            skill = skill.value.replace(",","%20");
            if(skill=="")
            {
              alert("Please Enter Your Skill");
              return;
            }
            let url = "https://api.adzuna.com/v1/api/jobs/in/search/"+pageno+"?app_id=fab7b12b&app_key=76ae44a562b6388da5181a484f97111e&results_per_page=10&what="+skill+"&where="+location.value+"&sort_by=date";
            // Storing response
            console.log(url);
            const response = await fetch(url);
            var data = await response.json();
            show(data);
        }

        function show(data) {
            console.log(data);
            let center = createMyEle("center",null,null,null,null);
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
            let nextBtn = createMyEle("button","btn btn-primary",null,"Next",null);
            // nextBtn.onclick=getapi(page++);
            nextBtn.setAttribute("onclick", "getapi("+(page++)+")");
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