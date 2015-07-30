@extends('lcp::layouts.public')

@section('content')

<div class="container col-sm-4 col-sm-offset-4">

  <h2>Please sign in</h2>

  <form method="post" action="{{ url('/auth/login') }}">
    {!! csrf_field() !!}

    <div class="form-group">
      <label for="exampleInputEmail1">E-mail address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail" name="email" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
    </div>
    <div class="checkbox">
        <label>
          <input type="checkbox" name="remember"> Remember me
        </label>
    </div>
    <div class="form-group">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </div>

    <p class="text-center">
      <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
    </p>

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

 </form>
</div>

@endsection