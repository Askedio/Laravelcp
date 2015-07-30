@extends('lcp::layouts.public')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 mt40">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">{{ trans('lcp::auth.reset') }} {{ trans('lcp::default.password') }}</h3>
          </div>
          <div class="panel-body">

            <form method="post" action="{{ url('/password/email') }}">
              {!! csrf_field() !!}

              <div class="form-group">
                <label for="exampleInputEmail1" class="sr-only">{{ trans('lcp::default.email_address') }}</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{ trans('lcp::default.email_address') }}" name="email" value="{{ old('email') }}" required>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                  {{ trans('lcp::auth.send_link') }}
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