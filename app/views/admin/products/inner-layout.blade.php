@extends('admin.layout')
@section ('active-product') active @stop

@section('inner-layout')
<div class="content-container">
  <div class="page schedules">
    <div class="page-head"></div>
    <div class="page-wrap">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel">
            <div class="panel-heading">
              <span>
                @yield('title')
              </span>
            </div>
            <div class="panel-body">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!--content container-->
@stop