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
<body style="background-image:url('images/studentBack2.jpg')">
<h1 align="center">Materials</h1>
<a href="/studentHomePage" >Go Home</a>

<table align="center" id="assTable">
	<tr>
		<th colspan="2" align="center">Select Subject</th>
	</tr>
			@foreach($data as $i)
			<tr>
				<td>{{$i->name}}</td>
				<td><a href="/getMat/{{session('cid')}}/{{session('sem')}}/{{$i->sub_code}}">Click Here To See</a></td>
			</tr>
			@endforeach
</table>
</body>
</html>