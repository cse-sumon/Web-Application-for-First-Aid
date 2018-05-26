@extend('master')
@section('main_content')


<h4>Sickness Criteria</h4><hr>

<form method="POST" action="{{URL::to('/medicine')}}">
	{{ csrf_field() }}


	@foreach($all_sub_category as $v_sub_category)
	<td><input type="checkbox" name="sub_category[]" value="{{$v_sub_category->sub_category_id}}"></td>
	<td>{{$v_sub_category->sub_category_name}}</td> 
	 <br>
	@endforeach

	<hr>
	
	<button type="submit" class="btn btn-primary">Submit</button>
	
</form>


@endsection