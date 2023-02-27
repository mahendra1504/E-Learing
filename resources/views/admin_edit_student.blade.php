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
</head>
<body>
<h1 align="center">Edit Student</h1>
<a href="/adminHomePage">Go Home</a>

<form action="/studentEditByAdmin" method="POST">
	@csrf
	<table align="center">
	<input type="hidden" name="id" value="{{$data->stud_id}}" />
		<tr>	
			<th>First Name : </th>
			<td><input type="text" name="fname" value="{{$data->fname}}"/></td>
			
		</tr>	
		<tr>
			<th>Surname : </th>
			<td><input type="text" name="lname" value="{{$data->lname}}"/></td>
			
		</tr>
		<tr>
			<th>Date of Birth : </th>
			<td><input type="date" name="dob" value="{{$data->dob}}"/></td>
			</tr>
		<tr>
			<th>Email ID : </th>
			<td><input type="Email" name="email" value="{{$data->email}}"/></td>
			
		</tr>
		<tr>
			<th>Address : </th>
			<td><textarea name="addr" rows="4" cols="30" placeholder="{{$data->address}}"></textarea></td>
			
		</tr>
		<tr>
			<th>Mobile No. : </th>
			<td><input type="text" name="mobno" value="{{$data->mobno}}"/></td>
			
		</tr>
		<tr>
			<th>Course : </th>
            <td><select name="course">
            	<option value="{{$data->course_id}}">{{$data->course_id}}</option>
                @for($i=1;$i<=3;$i++)
                {    
                    <option value="{{$i}}">{{$i}}</option>   
                }
                @endfor
                </select>
            </td>
			
		</tr>
		<tr>
			<th>Semester : </th>
			<td><select name="semester">
				<option value="{{$data->semester}}">{{$data->semester}}</option>
			@for($j=1;$j<=10;$j++)
				<option value="{{$j}}">{{$j}}</option>
			@endfor
				</select>
			</td>
		</tr>
		<tr>
			<th>Approval : </th>
			<td><select name="approval">
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
			<td colspan="2" align="center"><input type="submit" name="register" value="Register" /></td>
		</tr>
	</table>
</form>
</body>
</html>
	