<!DOCTYPE html>
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
<h1 align="center">Submitted Assignments</h1>
<a href="/instructorHomePage" >Go Home</a>
<table align="center">
	<tr>
		<th>ass_id</th>
		<th>Student ID</th>
		<th>Submitted Date</th>
		<th>Submitted File</th>
	</tr>
	@foreach($data as $i)
	<tr>
		<td>{{$i->ass_id}}</td>
		<td>{{$i->stud_id}}</td>
		<td>{{$i->submitted_date}}</td>
		<td><a href="{{url('/downloadSubmittedAss',$i->submitted_file)}}">{{$i->submitted_file}}</a></td>
	</tr>
	@endforeach
</table>
@if($message=Session::get('success'))<script>alert('{{$message}}')</script>@endif

</body>
</html>