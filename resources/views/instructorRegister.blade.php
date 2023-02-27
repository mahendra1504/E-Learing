<!DOCTYPE html>
<html>
<head>
	<title>Instructor Registration Page</title>
	<style>
		body{
			background-image:url('images/instructorBack2.jpg');
			background-size:1580px 1000px;
			background-repeat:no-repeat;
		}
		table{
			background:linear-gradient(rgba(255,255,255,0.8),rgba(255,255,255,0.8));
			padding:40px;
			border-radius:50px;
			font-size:18px;
		}
		th{
			text-align:right;
		}
		input[type='text'],[type='date'],[type='password'],[type='submit'],[type='email']{
			border-radius:30px;
			border:1px solid black;
			padding:10px 20px;
			background:linear-gradient(rgba(2552,255,255,0.8),rgba(255,255,255,0.8));
			padding:11px 45px;

		}
		input[type="submit"]{
			margin-top:2%;
		}
		select{
			border-radius:30px;
		
			border:1px solid black;
			background:linear-gradient(rgba(2552,255,255,0.8),rgba(255,255,255,0.8));
			padding:10px 60px;
		}
		textarea{
			border-radius:28px;
			padding-left:20px;
			border:1px solid black;
			background:linear-gradient(rgba(255,255,255,0.8),rgba(255,255,255,0.8));
		}
		th{
			padding:20px;
		}
	</style>
</head>
<body>
	<h1 align="center"><u>Registration Form</u></h1>
	<br>
	<form action="instructorController" method="POST">
	@csrf
	<table align="center">
		<tr>	
			<th>First Name : </th>
			<td><input type="text" name="fname"/></td>
			<td>@error('fname'){{$message}}@enderror</td>
		</tr>	
		<tr>
			<th>Surname : </th>
			<td><input type="text" name="sname"/></td>
			<td>@error('sname'){{$message}}@enderror</td>
		</tr>
		<tr>
			<th>Date of Birth : </th>
			<td><input type="date" name="dob"/></td>
			<td>@error('dob'){{$message}}@enderror</td>
		</tr>
		<tr>
			<th>Address : </th>
			<td><textarea name="addr" rows="4" cols="30"></textarea></td>
			<td>@error('addr'){{$message}}@enderror</td>
		</tr>
		<tr>
			<th>Mobile No. : </th>
			<td><input type="text" name="mobno" pattern="{1}[6-9]{9}[0-9]" /></td>
			<td >@error('mobno'){{$message}}@enderror</td>
		</tr>
		<tr>
			<th>password : </th>
			<td><input type="password" name="password" /></td>
			<td>@error('password'){{$message}}@enderror</td>
		</tr>	
		<tr>
			<th>confirm password : </th>
			<td><input type="password" name="cpass" /></td>
			<td>@error('cpass'){{$message}}@enderror</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="register" value="Register" /></td>
		</tr>
	</table>
	</form>

</body>
</html>