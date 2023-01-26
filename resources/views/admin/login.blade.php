<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/layout.css">
    <style>
         #background-video {
            width: 120vw;
            height: 120vh;
            object-fit: cover;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -1;
        }
        .butt {
            border-width:3px;
            border-style:solid;
            border-color:#90ee90;
            opacity: 90%;
        }
        a:link { text-decoration: none; }
        a:visited { text-decoration: none; }
        a:hover { text-decoration: none; }
        a:active { text-decoration: none; }
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px black inset !important;
        }
        input:-webkit-autofill{
            -webkit-text-fill-color: #68f3f8  !important;
        }
        
        
    </style>
</head>

<body>
    <video id="background-video" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
        <source src="videos/bg1.mp4" type="video/mp4">
    </video>

    <div class="container">
        <div class="col-xl-12 d-flex justify-content-center align-items-center form-bg">
            <form action="{{ url('login') }}" method="post">
                @csrf
                <h2 style="color:#68f3f8;opacity:80%;font-weight:1;font-size:15px;font-family:courier new;font-size:20px;">
                Login 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <a type="button" 
                    style="color:	#808080;font-weight:1;font-size:18px;font-family:courier new" href=".">Back</a></h2>
                <p><input style="background-color:black;color:#68f3f8;" 
                    type="text" name="email" placeholder="123@gmail.com"></p>
                <p><input style="background-color:black;color:#68f3f8;" 
                    type="password" name="password" placeholder="123"></p>
                <button class="butt" style="color:#90ee90;opacity:90%;" 
                    type="submit">Login</button>
                <form>
                
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>
        window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")
    </script>
    <script src="js/app.js"></script>
</body>
</html>