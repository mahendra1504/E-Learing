<!DOCTYPE html>
<
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
	<title></title>
</head>
<body>
<h1 align="center">Schedule</h1>
<form action="/storeSchedule" method="POST" enctype="multipart/form-data">
	@csrf
<table align="center" border="1">
	<tr>
		<th>Select Course : </th>
		<td><select name="course" id="course">
				@foreach($data as $i)
					<option value="{{$i->course_id}}">{{$i->course_name}}</option>
				@endforeach	
			</select>
		</td>
	</tr>
	<tr>
		<th>Select Semester : </th>
		<td>
			<select name="semester">
				@for($i=1;$i<=10;$i++)
					<option value="{{$i}}">{{$i}}</option>
				@endfor
			</select>
		</td>
	</tr>
	<tr>
		<th>Schedule Type : </th>
		<td>
			<select name="sch_type">
				<option value="Time Table">Time Table</option>
				<option value="Exam Schedule">Exam Schedule</option>
				<option value="Project Review">Project Review</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>Upload Date : </th>
		<td><input type="date" name="upload_date" value="{{date('Y-m-d')}}" /></td>
	</tr>
	<tr>
		<th>File to Upload</th>
		<td><input type="file" name="schedule" required/></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" /></td>
	</tr>
</table>
</form>
@if($message=Session::get('success'))<script>alert('{{$message}}')</script>@endif
</body>
</html>