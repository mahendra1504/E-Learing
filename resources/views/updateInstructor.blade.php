<!DOCTYPE html>
<html>
<head>
	<title>Update Instructor</title>
		<style type="text/css">
	.page-item{
    	display:inline-block;
    	padding: 10px;
	}
	body{
		background:#ffb8b8;
		background-size:cover;
		background-repeat:no-repeat;
		font-family: sans-serif;
	}
	table{
		padding:10px;
		border:2px solid black;
		border-radius: 15px;
	}
	th{
		color:white;
		background-color:black;
		border:2px solid black;
		padding:10px 20px;
		text-decoration:underline;
	}
	td{
		
		padding:20px;
		/*background:linear-gradient(rgba(255,255,255,0.8),rgba(255,255,255,0.8));*/
		border-radius:10px;
	}
	tr:nth-child(even){
		/*background:linear-gradient(rgba(132,132,132,0.8),rgba(132,132,132,0.8))*/
		background-color:lightgrey;
	}
	tr:nth-child(odd){
		/*background:linear-gradient(rgba(132,132,132,0.8),rgba(132,132,132,0.8))*/
		background-color:white;
	}
	a{
		text-decoration:none;
		color:black;
		background:linear-gradient(rgba(255,255,255,0.6),rgba(255,255,255,0.6));
		padding:10px;
		border-radius:10px;
	}
	a:hover{
		cursor:pointer;
		background-color:black;
		color:white;
		margin-top:2%;
		transform:scale(1.1);
		transition:0.7s ease;
	}
	</style>
</head>
<body>


<h1 align="center"><u>Registration Form</u></h1>
<a href="/adminHomePage">Go Home</a>
	<br>
	<form action="/updateIns" method="POST">
	@csrf
	<input type="hidden" name="instructor_id" value="{{$data->instructor_id}}"/> 
	<table align="center">
		<tr>	
			<th>First Name : </th>
			<td><input type="text" name="fname" value="{{$data->uname}}"/></td>
		</tr>	
		<tr>
			<th>Surname : </th>
			<td><input type="text" name="sname" value="{{$data->surname}}"/></td>
		</tr>
		<tr>
			<th>Date of Birth : </th>
			<td><input type="date" name="dob" value="{{$data->dob}}"/></td>
			<td>@error('dob'){{$message}}@enderror</td>
		</tr>
		<tr>
			<th>Address : </th>
			<td><textarea name="addr" rows="4" cols="30" placeholder="{{$data->address}}"></textarea></td>
			<td>@error('addr'){{$message}}@enderror</td>
		</tr>
		<tr>
			<th>Mobile No. : </th>
			<td><input type="text" name="mobno" pattern="{1}[6-9]{9}[0-9]"  value="{{$data->mobno}}"/></td>
			<td >@error('mobno'){{$message}}@enderror</td>
		</tr>
		<tr>
			<th>password : </th>
			<td><input type="password" name="password" value="{{$data->password}}" /></td>
			<td>@error('password'){{$message}}@enderror</td>
		</tr>	
		<tr>
			<td colspan="2" align="center"><input type="submit" name="register" value="Register" /></td>
		</tr>
	</table>
	</form>
</body>
</html>
