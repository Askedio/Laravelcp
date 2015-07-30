@extends('lcp::layouts.public')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
				<h2>{{ trans('lcp::auth.reset') }} {{ trans('lcp::default.password') }}</h2>

        <form method="post" action="{{ url('/password/reset') }}">
          {!! csrf_field() !!}
          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-group">
            <label>{{ trans('lcp::default.email_address') }}</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label>{{ trans('lcp::default.password') }}</label>
            <input type="password" class="form-control" name="password">
          </div>

          <div class="form-group">
            <label>{{ trans('lcp::auth.confirm') }} {{ trans('lcp::default.password') }}</label>
            <input type="password" class="form-control" name="password_confirmation">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">
              {{ trans('lcp::auth.reset') }} {{ trans('lcp::default.password') }}
            </button>
          </div>
        </form>

        @if (count($errors) > 0)
          <div class="alert alert-danger">
            {{ trans('lcp::auth.error') }}<br><br>
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