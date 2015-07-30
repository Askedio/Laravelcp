@extends('lcp::layouts.public')

@section('content')
  <div class="container-fluid">
      <div class="row-fluid">
          <div class="col-lg-12">
              <div class="centering text-center error-container">
                  <div class="text-center">
                      <h2 class="without-margin">{{ trans('lcp::errors.title') }}</h2>
                      <h4 class="text-warning">{{ trans('lcp::errors.role', ['error' => $error]) }}</h4>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection