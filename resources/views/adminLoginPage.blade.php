<!DOCTYPE html>
<html>
<head>
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
        	position: absolute;
            background:linear-gradient(rgba(255,255,255,0.8),rgba(255,255,255,0.8));
            width:50%;
            height: 30%;
            padding:10px;
            top:25;
            left: 25%;
            border-radius:40px;
            border:3px solid white;
             
        }
        td{
            padding:15px;
        }
        th{
            text-align:left;
            font-size:20px;
        }
        input{
            padding:8px;
            border-radius:20px;
            border:1px solid black;
        }

        input:focus{
        	border-radius: 20px;
        	width:180px;
        }

        select{
            padding:8px;
            width:170px;
            border-radius:20px;
            border:1px solid black;
        }
        input[type='submit']{
            padding:8px 20px;
            background-color:white;
        }
        input[type='submit']:hover{
            background-color:grey;
            padding:12px 24px;
            cursor:pointer;
        }
        
    </style>
</head>
<body>
<h1 align="center">Admin Login</h1>
<form action="/adminLogin" method="POST">
	@csrf
	<table align="center">
		<tr>
			<th>Username : </th>
			<td><input type="text" name="username" required/></td>
			@if($message=Session::get('errorU'))<td>{{$message}}</td>@endif
    
		</tr>
		<tr>
			<th>Password : </th>
			<td><input type="password" name="password" required/></td>
			@if($message=Session::get('errorP'))<td>{{$message}}</td>@endif
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Login"/></td>
		</tr>
	</table>
</form>
</body>
</html>