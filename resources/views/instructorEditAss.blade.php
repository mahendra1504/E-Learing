<!DOCTYPE html>
<html>
<head>
<style>
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

	select{
            padding:8px;
            border-radius:10px;
            border:1px solid black;
            font-weight: bold;
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
	<script type="text/javascript" src="{{asset('jquery-3.5.1.min.js')}}"></script>
	<title>Assigment Management</title>
</head>
<body>
	<h1 align="center"><u>Upload Assignment</u></h1>
	<a href="/instructorHomePage" >Go Home</a>
	<form action="/updateAss" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="id" value="{{$data->ass_id}}" />
		<input type="hidden" name="faculty" value="{{$data->instructor_id}}" />
		<table align="center">
		<tr>
			<th>Course : </th>
			<td><input type="text" name="course" value="{{$data->course_id}}" /></td>
		</tr>
		<tr>
			<th>Semester</th>
			<td><input type="text" name="sem" value="{{$data->semester}}" /></td>
		</tr>
		<tr>
			<th>Subject : </th>
			<td><input type="text" name="subject" value="{{$data->sub_code}}" /></td>
		</tr>
		<tr>
			<th>File to Upload</th>
			<td><input type="file" name="assignment" value="{{$data->path}}" required/></td>
		</tr>
		<tr>
			<th>Due Date : </th>
			<td><input type="date" name="due_date" value="{{$data->due_date}}" required/></td>
			<td>@error('due_date'){{$message}}@enderror</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="update" value="Update"/></td>
		</tr>
		</table>
	</form>
	<br>
	@if($message=Session::get('success'))<script>alert('{{$message}}')</script>@endif
	
</body>