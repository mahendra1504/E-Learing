<!DOCTYPE html>
<html>
<head>
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
	<title>Manage Schedule</title>
</head>
<body>

<h1 align="center">Manage Schedule</h1>
<table align="center">
	<tr>
		<th>Schedule ID</th>
		<th>Course ID</th>
		<th>Semester</th>
		<th>Schedule Type</th>
		<th>Uploaded Date</th>
		<th>Schedule</th>
		<th colspan="2" align="center">Action</th>
	</tr>
	@foreach($data as $i)
		<tr>
			<td>{{$i->sch_id}}</td>
			<td>{{$i->course_id}}</td>
			<td>{{$i->semester}}</td>
			<td>{{$i->sch_type}}</td>
			<td>{{$i->upload_date}}</td>
			<td><a href="/downloadSch/{{$i->path}}">{{$i->path}}</td>
			<td><a href="/editSch/{{$i->sch_id}}">Edit</a>
			<td><a href="/delSch/{{$i->sch_id}}">Delete</a>
		</tr>
	@endforeach
</table>
@if($message=Session::get('success'))<script>alert('{{$message}}')</script>@endif

</body>
</html>