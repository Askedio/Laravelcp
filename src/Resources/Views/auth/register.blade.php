@extends('lcp::layouts.public')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 mt40">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">{{ trans('lcp::auth.register') }}</h3>
          </div>
          <div class="panel-body">
            <form method="post" action="{{ url('/auth/register') }}">
              {!! csrf_field() !!}

              <div class="form-group">
                <label for="exampleInputName1">{{ trans('lcp::default.name') }}</label>
                <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ old('name') }}" required>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">{{ trans('lcp::default.email_address') }}</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email') }}" required>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">{{ trans('lcp::default.password') }}</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword2">{{ trans('lcp::auth.confirm') }} {{ trans('lcp::default.password') }}</label>
                <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation" required>
              </div>

              <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">{{ trans('lcp::auth.register') }}</button>
              </div>
            </form>
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                {!! trans('lcp::auth.error') !!}<br><br>
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
  </div>
</div>
@endsection