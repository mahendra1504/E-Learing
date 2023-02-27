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
	<form action="/uploadAss" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="faculty" value="{{session('iid')}}" />
		<table align="center">
		<tr>
			<th>Select Course : </th>
			<td>
				<select name="course" id="cid">
					@foreach($data as $i)
						<option value="{{$i->course_id}}">{{$i->course_name}}</option>
					@endforeach
				</select>
			</td>
		</tr>
		<tr>
			<th>Semester : </th>
			<td><select name="semester" id="semNo">
				<option>select</option>
				
					@for($i=1;$i<=10;$i++)
					{
						<option value="{{$i}}">{{$i}}</option>
					}
					@endfor
				</select>
			</td>
			
		</tr>
		<tr>
			<th>Subject Name : </th>
			<td><select name="subject" id="sel_user">

		<script type="text/javascript">
				$(document).ready(function(){
				       
				        $('#semNo').change(function(){
				        	var cid = document.getElementById('cid').value;
				          	var userid = document.getElementById('semNo').value;
				          	var sem = Number(userid);
							console.log(cid);
							console.log(sem);	
					    	fetchRecords(sem,cid);
				        });
				});

				function fetchRecords(id,cid)
				{
				       	$.ajax({
				         	url: '/getSubjects/'+id+'/'+cid,
				         	type: 'get',
				         	dataType: 'json',
				         	success: function(response)
				         	{
								var len = 0;
								len = response['sub'].length;
								console.log("Subject");
				                $("#sel_user").empty();
				                for( var i = 0; i<len; i++)
				                {
				                	
				                	var subcode = response['subcode'][i].sub_code;
				                	console.log(subcode);
				                
				          	          var name = response['sub'][i].name;
				                    //console.log(name);
				                    $("#sel_user").append("<option value='"+subcode+"'>"+name+"</option>");
								}
							}
				       	});
				}
		</script>

		</select>
		</td>
		</tr>
		<tr>
			<th>File to Upload</th>
			<td><input type="file" name="assignment" required/></td>
		</tr>
		<tr>
			<th>Due Date : </th>
			<td><input type="date" name="due_date" required /></td>
			<td>@error('due_date'){{$message}}@enderror</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="upload" value="Upload" /></td>
		</tr>
		</table>
	</form>
	<br>
	@if($message=Session::get('success'))<script>alert('{{$message}}')</script>@endif
	
</body>