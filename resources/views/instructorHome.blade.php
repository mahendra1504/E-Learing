<!DOCTYPE html>
<head>
<style>
    body{
            background-image:url('images/instructorBack2.jpg');
            background-repeat:no-repeat;
            background-size:1560px 800px;
            font-family:sans-serif;
    }
    nav{
        background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
        padding:20px;   
    }
    a{
        text-decoration:none;
        color:white;
        padding:8px 20px;
        border-radius:20px;
    }
    a:hover{
        background-color:white;
        color:black;
        transition:0.8s ease;
    }
    h1{
        text-align:center;
        font-family:sans-serif;
        font-size:30px;
    }
    hr{
        border: 1px solid black;
    }
    .heading{
        width:28%;
        margin-left:36%;
    }
    .detail{
        background:linear-gradient(rgba(255,255,255,0.5),rgba(255,255,255,0.5));
        width:20%;
        text-align:center;
        padding:30px;
        border-radius:40px;
        margin-left:38%;
        margin-top:5%;
    }
</style>
</head>
<body>
<h1 class="heading">Instructor's Home Page<hr></h1>
<nav>
    <a href="studentRecord">Show Students</a>
    
    <a href="manage_assignment">Upload Assignments</a>
    
    <a href="/upload_material">Upload Materials</a>

    <a href="/upload_schedule">Upload Schedule</a>
    
    <a href="/list_assignment/{{session('iid')}}">List Assignments</a>
    
    <a href="/list_material/{{session('iid')}}">List Materials</a>

    <a href="/list_schedule">List Schedules</a>

    <a href="/give_feedback">FeedBacks</a>
    
    <a href="instructorLogout" >Logout</a>

</nav>
<div class="detail">
<h2>Hello, {{session('uname')}}</h2>
<h2>Your Id : {{session('iid')}}</h2>
</div>

</body>
</html>