@extends('master')
@section('main_content')

<h3>Medicine Details</h3><hr>

<table style="margin-bottom: 50px" border="1px" cellpadding="5">
		<img src="{{asset($medicine_info->medicine_image)}}" width="350" height="200" style="margin-bottom: 10px"><br>

			
				<tr>
				<th>Name</th>
				<td>{{$medicine_info->medicine_name}}</td>
				
			</tr>
			<tr>
				<th>Company</th>
				<td>{{$medicine_info->manufacturer_name}}</td>
			</tr>
			
			<tr>
				<th>Dosage</th>
				<td>{{$medicine_info->uses_role}}</td>
			</tr>
			<tr>
				<th>Description</th>
				<td>{{$medicine_info->medicine_description}}</td>
			</tr>
			<tr>
				<th>Caution</th>
				<td>{{$medicine_info->medicine_caution}}</td>
			</tr>

			<tr>
				
				
			</tr>
</table>
			




@endsection