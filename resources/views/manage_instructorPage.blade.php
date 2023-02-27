<!DOCTYPE html>
<html>
<head>
	<title></title>
		<style type="text/css">
		.page-item{
    	display:inline-block;
    	padding: 10px;
	}
	body{
		background-image:url('images/instructorBack2.jpg');
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

<h1 align="center">Manage Instructors</h1>
<a href="/adminHomePage">Go Home</a>
<table align="center" border="1">
	<tr>
	<th>Instructor ID</th>
	<th>First(User) Name</th>
	<th>Surname</th>
	<th>Date of Birth</th>
	<th>Address</th>
	<th>Mobile No</th>
	<th>Password</th>
	<th colspan="2" align="center">Action</th>
	</tr>
	@foreach($data as $i)
	<tr>
	<td>{{$i->instructor_id}}</td>
	<td>{{$i->uname}}</td>
	<td>{{$i->surname}}</td>
	<td>{{$i->dob}}</td>
	<td>{{$i->address}}</td>
	<td>{{$i->mobno}}</td>
	<td>{{$i->password}}</td>
	<td><a href="/editIns/{{$i->instructor_id}}">Edit</a></td>
	<td><a href="/deleteIns/{{$i->instructor_id}}">Delete</a></td>
	</tr>
	@endforeach
</table>
@if($message=Session::get('success'))<script>alert('{{$message}}')</script>@endif
</body>
</html>