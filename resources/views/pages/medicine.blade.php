@extend('master')
@section('main_content')


<style type="text/css">
	td{
		color: red;
		font-weight: bold;
		font-size: 16px;
	}
	th{
		width: 130px;
	}

	.medicine{
		display: inline;
			color: black;
			font-weight: ;
	}
</style>

<p>Medicine</p><hr>
<div class="medicine">
	


	<div class="row">
		
	@foreach($medicine_by_sub_category as $v_medicine)
	<div class="col-md-6">
		

			
			<div class="medicine">
				
			
<table style="margin-bottom: 50px">
		<img src="{{asset($v_medicine->medicine_image)}}" width="280" height="160"><br>

			
				<tr>
				<th>Name</th>
				<td>{{$v_medicine->medicine_name}}</td>
				
			</tr>
			<tr>
				<th>Company</th>
				<td>{{$v_medicine->manufacturer_name}}</td>
			</tr>
			
			<tr>
				<th>Dosage</th>
				<td>{{$v_medicine->uses_role}}</td>
			</tr>
			<tr>
				<td colspan="2"><a style="text-decoration: none" href="{{URL::to('/medicine-details/'.$v_medicine->medicine_id)}}">Medicine Details</a></td>
				
			</tr>
</table>
</div>
			

		</div>
		@endforeach
	</div>

		
			

		</div>



@endsection