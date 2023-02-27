<!DOCTYPE html>
<html>
<head>
<style>
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
<h1 align="center">Student Records</h1>
<a href="/instructorHomePage" >Go Home</a>
<table align="center">
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>DOB</th>
		<th>Address</th>
		<th>Email ID</th>
		<th>Phone</th>
		<th>Course Id</th>
		<th>Semester</th>
		<th>Approval</th>
		<th>Password</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
@foreach ($data as $i)
    <tr>
    	<td>{{$i->fname}}</td>
    	<td>{{$i->lname}}</td>
    	<td>{{$i->dob}}</td>
    	<td>{{$i->address}}</td>
    	<td>{{$i->email}}</td>
    	<td>{{$i->mobno}}</td>
    	<td>{{$i->course_id}}</td>
        <td>{{$i->semester}}</td>
        @if($i->approval==0)
			<td>No</td>
		@else
			<td>Yes</td>
		@endif
    	<td>{{$i->password}}</td>
    	<td><a href="studentEditData/{{$i->stud_id}}">Edit</a></td>
    	<td><a href="studentDeleteData/{{$i->stud_id}}">Delete</a></td>
    </tr>
@endforeach
</table>

</body>
</html>