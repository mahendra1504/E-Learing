<!DOCTYPE html>
<html>
<head>
<title>Instructor Login Page</title>
    <style>
        body{
            background-image:url('images/instructorBack2.jpg');
            background-repeat:no-repeat;
            background-size:1560px 800px;
        }
        h1{
            font-family:lato;
            font-size:43px;
        }
        form{
            background:linear-gradient(rgba(255,255,255,0.8),rgba(255,255,255,0.8));
            width:25%;
            padding:40px;
            margin-left:34%;
            margin-top:8%;
            border-radius:40px;
        }
        td{
            padding:15px;
            
        }
        th{
            text-align:left;
            font-size:20px;
            text-align:right;
        }
        input{
            padding:8px;
            border-radius:20px;
            border:1px solid black;
        }
        select{
            padding:8px;
            border-radius:20px;
            border:1px solid black;
        }
        input[type='submit']{
            padding:8px 20px;
            background-color:white;
        }
        input[type='submit']:hover{
            background-color:grey;
            cursor:pointer;
        }
        
    </style>
</head>
<body>
@if(session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<h1 align="center">Instuctor Login</h1>
<form action="instructorLoginData" method="POST">
@csrf
<table align="center">
    <tr>
    <th>Username :</th>
    <td> <input type="text" name="uname" required /></td>
    @if($message=Session::get('alertUname'))<td>{{$message}}</td>@endif
    </tr>

    <th>Password : </th>
    <td><input type="Password" name="pwd" required /></td>
    @if($message=Session::get('alertPass'))<td>{{$message}}</td>@endif
    </tr>
    <tr>
        <td colspan="2" align='center'><input type="submit" name="login" value="Login" /></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
        New User!!! <a align="center" href="instructorRegisterPage">Click Here</a> for Sign Up
        </td>
    </tr>
</table>
@if($message=Session::get('success'))<script>alert('{{$message}}')</script>@endif
</form>
</body>
</html>