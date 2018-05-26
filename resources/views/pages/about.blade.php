@extend('master')
@section('main_content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
		.about{
			
			display: inline;
			color: black;
			font-weight: ;
		}
	
	</style>

</head>
<body>
	<h3 style="text-align: center; background-color: skyblue; margin-bottom: 50px; padding: 5px">
	About US</h3>
	<div class="about">
	

	<div class="row">

		<div class="col-md-4">
			<div class="person1">
				<img src="{{asset('public/font_end_assets/images/tamim_sir.jpg')}}" width="150" height="170" style="padding-left: auto">
				<table>
					<tr>
						<td>Name:</td>
						<td>Tamim Al Mahmud</td>
					</tr>
					<tr>
						<td colspan="2">Assistant Professor</td>
						
					</tr>
					<tr>
						<td colspan="2">Green University of Bangladesh</td>
					</tr>


					<tr>
						<td>Email:</td>
						<td>tamim@cse.green.edu.bd</td>
					</tr>
					<tr>
						
						<td colspan="2">Supervisor Of this Project</td>
					</tr>

				</table>
			</div>
			
		</div><div class="col-md-4">
			<div class="person2">
				<img src="{{asset('public/font_end_assets/images/sumon.jpg')}}" width="150" height="170" style="padding-left: auto">
				<table>
					<tr>
						<td>Name:</td>
						<td>Md. Sumon</td>
					</tr>
					<tr>
						<td colspan="2">Bsc in CSE</td>
						
					</tr>
					<tr>
						<td colspan="2">Green University of Bangladesh</td>
					</tr>


					<tr>
						<td>Email:</td>
						<td>sumon.gub152@gmail.com</td>
					</tr>
					<tr>
						
						<td colspan="2">Developer Of this Project</td>
					</tr>

				</table>
			</div>
			
		</div>

		<div class="col-md-4">
			<div class="person3">
				<img src="{{asset('public/font_end_assets/images/Rabia.jpg')}}" width="150" height="170">
				<table>
					<tr>
						<td>Name:</td>
						<td>Rabia Akter</td>
					</tr>
					<tr>
						<td colspan="2">Bsc in CSE</td>
						
					</tr>
					<tr>
						<td colspan="2">Green University of Bangladesh</td>
					</tr>


					<tr>
						<td>Email:</td>
						<td>rabia.akter94@gmail.com</td>
					</tr>
					<tr>

						<td colspan="2">Developer Of this Project</td>
					</tr>

				</table>
			</div>
			
		</div>
		
		
</div>
		
	</div>
	

</div>	

</body>
</html>

	

	
 
	

	




@endsection