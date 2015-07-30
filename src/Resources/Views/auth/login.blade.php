@extends('lcp::layouts.public')

@section('content')
<div class="container-fluid mt40">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">{{ trans('lcp::auth.sign_in') }}</h3>
          </div>
          <div class="panel-body">
            <form method="post" action="{{ url('/auth/login') }}">
              {!! csrf_field() !!}

              <div class="form-group">
                <label for="exampleInputEmail1" class="sr-only">{{ trans('lcp::default.email_address') }}</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{ trans('lcp::default.email_address') }}" name="email" value="{{ old('email') }}" required>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1" class="sr-only">{{ trans('lcp::default.password') }}</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{ trans('lcp::default.password') }}" name="password" required>
              </div>

              <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember"> {{ trans('lcp::auth.remember_me') }}
                  </label>
              </div>

              <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">{{ trans('lcp::auth.sign_in') }}</button>
              </div>

              <p class="text-center">
                <a class="btn btn-link" href="{{ url('/password/email') }}">{{ trans('lcp::auth.forgot_link') }}</a>
              </p>
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