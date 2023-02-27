<!DOCTYPE html>
<html>
<head>
<title>Student's Login Page</title>
<style>
        body{
            background-image:url('images/back1.jpg');
            background-repeat:no-repeat;
            background-size:1580px 780px;
            font-family: sans-serif;
            /*background-color:red;*/
        }
        h1{
            font-size:50px;
            font-family:Baskerville Old Face;
        }
        table{
            margin-top:7%;
            background:linear-gradient(rgba(255,255,255,0.5),rgba(255,255,255,0.5));
            border-radius:40px;
            padding:40px;
        }
        th{
            font-size:25px;
        }
        td{
            padding:20px;
        }
        input[type="email"],[type="password"]
        {
            border-radius:30px;
            background:linear-gradient(rgba(255,255,255,0.2),rgba(255,255,255,0.2));
            padding:10px;
        }
        input[type="submit"]{
            padding:15px 25px;
            font-family:lato;
            background:linear-gradient(rgba(36,79,223,0.3),rgba(36,79,223,0.3));
            border-radius:20px;
        }
        input[type="submit"]:hover{
            background:linear-gradient(rgba(28,65,193,0.5),rgba(28,65,193,0.5));
            transform:scale(1.1);
            cursor:pointer;
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
<h1 align="center">Student Login</h1>
<form action="studentLoginData" method="POST">
@csrf
<table align="center">
    <tr>
    <th>Username :</th>
    <td> <input type="email" name="fname" placeholder="abc@hotmail.com" required/></td>
    @if($message=Session::get('alertUname'))<td>{{$message}}</td>@endif
    </tr>
    <tr>
    <th>Password : </th>
    <td><input type="password" name="pwd" required /></td>
    @if($message=Session::get('alertPass'))<td>{{$message}}</td>@endif
    </tr>
    <tr>
        <td colspan="2" align='center'><input type="submit" name="login" value="Login" /></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
        New User!!!<a align="center" href="studentRegisterPage"> Click Here </a>for Sign Up
        </td>
    </tr>
</table>
</form>
@if($message=Session::get('success'))<script>alert('{{$message}}')</script>@endif
@if($message=Session::get('alertApproval'))<script>alert('{{$message}}')</script>@endif

</body>
</html>