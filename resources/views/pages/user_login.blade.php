@extends('master')
@section('main_content')
<div class="user_login">
	<div class="row">
		<div class="col-md-6">
			<h4>Login Here</h4><hr>
			<form>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
 <hr>
  <div class="form-group row">
    <div class="col-sm-10">

      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </div>
</form>
			
		</div>
		
	</div>
	
</div>
@endsection