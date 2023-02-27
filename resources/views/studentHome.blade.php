<!DOCTYPE html>
<head>
    <style>
        body{
            background-image:url('images/studentBack2.jpg');
            background-size:cover;
            background-repeat:no-repeat;
            font-family:sans-serif;
        }
        nav{
            background:linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7));
            padding:20px;
            width:90%;
            margin-left:4%;
        }
        .head{
            text-align:center;
            margin-top:5%;
            font-size:40px;
        }
        p{
            font-size: 20px;
            font-weight: bold;
        }
        a{
            text-decoration:none;
            color:black;
            margin-right:5%;
            border-radius:20px;
            padding:15px;
        }
        a:hover{
            background-color:black;
            color:white;
            transition:0.7s ease;
        }
        .left{
            margin-left:80%;
            margin-right:0%;
        }
        .headers{
            text-align:center;
            background:linear-gradient(rgba(255,255,255,0.7),rgba(255,255,255,0.7));
            width:30%;
            margin-top:3%;
            margin-left:35%;
            border-radius:30px;
            padding:20px;
        }
    </style>
    <script type="text/javascript">
    /*@if((session()->has('fname'))) 
        window.location='studentHomePage';       
        window.onload = function() {
        if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
        }}
    @endif
    */
        function preventBack() { window.history.forward(); }  
        setTimeout("preventBack()", 0);  
        window.onunload = function () { null };  
    </script>
</head>
<body>
<h1 class="head">Student Home Page</h1>
<nav>
    <a href="/see_assignment/{{session('cid')}}/{{session('sem')}}">See Assignments</a>

    <a href="/see_material/{{session('cid')}}/{{session('sem')}}">See Materials</a>

    <a href="/see_feedback/{{session('stud_id')}}">See Feedbacks</a>

    <a href="/see_schedule/{{session('cid')}}/{{session('sem')}}">See Schedules</a> 

    <a href="studentLogout">Logout</a>
</nav>
<div class="headers">
<p>Hello, {{session('fname')}}</p>
<p>Course ID : {{session('cid')}}</p>
<p>Semester : {{session('sem')}}</p>
<p>Your Id : {{session('stud_id')}}</p>
</div>
</body>
</html>