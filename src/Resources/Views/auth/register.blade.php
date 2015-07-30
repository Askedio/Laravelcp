@extends('lcp::layouts.public')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
      <h2>Register</h2>

      <form method="post" action="{{ url('/auth/register') }}">
        {!! csrf_field() !!}

        <div class="form-group">
          <label for="exampleInputName1">Name</label>
          <input type="text" class="form-control" id="exampleInputName1" placeholder="" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">E-mail address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="" name="password" required>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword2">Confirm Password</label>
          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="" name="password_confirmation" required>
        </div>

        <div class="form-group">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </div>
      </form>
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection