@extends('lcp::layouts.public')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
      <h2>Reset Password</h2>

      <form method="post" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}

        <div class="form-group">
          <label for="exampleInputEmail1" class="sr-only">E-mail address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail address" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">
            Send Password Reset Link
          </button>
        </div>
      </form>

      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

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