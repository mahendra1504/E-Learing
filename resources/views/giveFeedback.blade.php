<!DOCTYPE html>
<html>
<head>
	<title>Give Feedbacks</title>
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
	<script type="text/javascript" src="{{asset('jquery-3.5.1.min.js')}}"></script>
</head>
<body>
	<h1 align="center">Give FeedBack</h1>
	<a href="/instructorHomePage" >Go Home</a>
	<form action="/storeFeedback" method="POST">
	@csrf
	<input type="hidden" name="instructor_id" value="{{session('iid')}}" />
	<table align="center" border="1">
	<tr>
		<th>Select Course : </th>
		<td>
		<select name="course" id="course">
			<option value="">Select</option>
			@foreach($data as $i)
			{
				<option value="{{$i->course_id}}">{{$i->course_name}}</option>
			}
			@endforeach
		</select>
		</td>
	</tr>
	<tr>
		<th>Select Semester : </th>
		<td>
		<select name="semNo" id="semNo">
			<option value="">Select</option>
			@for($i=1;$i<=10;$i++)
			{
				<option value="{{$i}}">{{$i}}</option>
			}
			@endfor
		</select>
		</td>
	</tr>
	<tr>
		<th>Select Student : </th>
		<td>
		<select name="stud_id" id="sel_stud">
		<script>
			$(document).ready(function(){ 
				        $('#course').change(function(){
				        	$('#semNo').change(function(){
				        	var cid = document.getElementById('course').value;
				          	var semNo = document.getElementById('semNo').value;
				          	console.log(cid);
				          	console.log(semNo);
				          	getStud(cid,semNo);
				          });
				        });
				});
			function getStud(cid,semNo)
				{
						console.log("In function");
				       	$.ajax({
				         	url: '/getStuds/'+cid+'/'+semNo,
				         	type: 'get',
				         	dataType: 'json',
				         	success: function(response)
				         	{
				         		console.log("In success");
								var len = 0;
								len = response['stud'].length;
								console.log("Student");
				                $("#sel_stud").empty();
				                for( var i = 0; i<len; i++)
				                {
				                	var stud_id = response['stud'][i].stud_id;
				                	console.log(stud_id);
				                	var stud = response['stud'][i].fname;
				                	console.log(stud);
				                	var name = response['stud'][i].lname;
				                    console.log(name);
				                    $("#sel_stud").append("<option value='"+stud_id+"'>"+stud_id+". "+stud+" "+name+"</option>");
								}
							}
				       	});
				}
		</script>
	</select>
	</td>
	</tr>
	<tr>
		<th>Feedback Type : </th>
		<td><input type="text" name="type" /></textarea></td>
	</tr>
	<tr>
		<th>Feedback : </th>
		<td><textarea name="feedback" rows="5" cols="50"></textarea></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" /></td>
	</tr>
	</table>
	</form>
	@if($message=Session::get('success'))<script>alert('{{$message}}')</script>@endif
</body>
</html>