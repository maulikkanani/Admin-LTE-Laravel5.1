@extends('admin_theme')
@section('content')
 <div class="content-wrapper">
@if(Session::has('success'))
    <h2>{!! Session::get('success') !!}</h2>
@endif
<div>Upload form</div>
{!! Form::open(array('url'=>'apply/multiple_upload','method'=>'POST', 'files'=>true)) !!}

{!! Form::file('images[]', array('multiple'=>true)) !!}
{!! Form::submit('Submit') !!}
{!! Form::close() !!}
 </div>
@endsection