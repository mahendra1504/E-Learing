<!DOCTYPE html>
<html>
<head>
	<title>Student Update Data</title>
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
		height: 35%;
		padding:10px;
		border:2px solid black;
		border-radius: 20px;

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

	 input[type='submit']{
            padding:8px 20px;
            background-color:white;
            border-radius: 20px;
       }
        input[type='submit']:hover{
            background-color:grey;
            padding:12px 24px;
            cursor:pointer;
            border-radius: 20px;
       }
	</style>
</head>
<body>
	<h1 align="center">Student Edit Form</h1>
	<form action="/studentUpdateData" method="POST">
	@csrf
	<table align="center">
			<input type="hidden" name="id" value="{{$data->stud_id}}"/></td>
		<tr>	
			<th>First Name : </th>
			<td><input type="text" name="fname" value="{{$data->fname}}" required/></td>
		</tr>	
		<tr>
			<th>Surname : </th>
			<td><input type="text" name="lname" value="{{$data->lname}}" required/></td>
		</tr>
		<tr>
			<th>Date of Birth : </th>
			<td><input type="date" name="dob" value="{{$data->dob}}" /></td>
		</tr>
		<tr>
			<th>Address : </th>
			<td><textarea name="addr" rows="4" cols="50" placeholder="{{$data->address}}" required></textarea></td>
		</tr>
		<tr>
			<th>Mobile No. : </th>
			<td><input type="text" name="mobno" pattern="{1}[6-9]{9}[0-9]" value="{{$data->mobno}}"/></td>
		</tr>
		<tr>
			<th>Approval : </th>
			<td><select name="approval" required />
				<option>Select</option>
				<option value="1">Yes</option>
				<option value="0">No</option>
			</td>
		</tr>
		<tr>
			<th>password : </th>
			<td><input type="password" name="password" value="{{$data->password}}" /></td>
		</tr>	
		<tr>
			<td colspan="2" align="center"><input type="submit" name="update" value="Update" /></td>
		</tr>
	</table>
	</form>
</body>
</html>