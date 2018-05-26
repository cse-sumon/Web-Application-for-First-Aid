@extends('master')
@section('main_content')

<div class="registration">
  <div class="row">
    <div class="col-md-6">
      <h4>Registration Here</h4><hr>
      <form>
        <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
    <div class="col-sm-10">
      <input type="number" name="mobile" class="form-control" id="inputEmail3" placeholder="Mobile">
    </div>
  </div>
 
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Sex</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sex" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Female
          </label>
        </div>
      
      </div>
    </div>
    <hr>
 
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
    </div>

  </div>
  
</div>
@endsection