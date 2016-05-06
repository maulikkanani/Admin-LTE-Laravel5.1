@extends('admin_theme')
@section('content')
 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        News Section
        <small>All News Hear...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
        <li class="active">News Section</li>
      </ol>
    </section>
	
	<section class="content-header">
      <!-- Button trigger modal -->
		<div class="text-center">
			<button type="button" style="border-radius:10px; padding:7px 20px;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
				Add New News
			</button>
		</div>
		<!-- Modal for add news -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="width:400px">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">Add New News</h4>
				  </div>
				  <div class="modal-body">
					<form method="POST" action="{{ url('addnews') }}">
						{!! csrf_field() !!}
						<div class="form-group has-feedback">
							@if (count($errors))
									@foreach($errors->all() as $error)
										<p style="color:red">{{ $error }}</p>
									@endforeach
							@endif
						</div>  
						<div class="form-group has-feedback">
							<input type="text" name="title"  class="form-control" placeholder="title" value="{{ old('title') }}">
						</div>
						<div class="form-group has-feedback">
							<textarea name="description"  class="form-control" placeholder="description" rows="5">{{ old('description') }}</textarea>
						</div>
						<div class="form-group has-feedback">
							<select name="type" class="form-control">
								<option value="">Select News Type</option>
								<option value="1">Head Line</option>
								<option value="2">General News</option>
								<option value="3">Social News</option>
								<option value="4">Sports News</option>
							</select>
						  </div>
	
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Add News</button>
						</div>
				  </form>
				</div>
			</div>
		</div>
	  </div>
	  <!-- Model For Edit News-->
	  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="width:400px">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">Edit News</h4>
				  </div>
				  <div class="modal-body">
					<form method="POST" action="{{ url('editnews') }}">
						{!! csrf_field() !!}
						<div class="form-group has-feedback">
							@if (count($errors))
									@foreach($errors->all() as $error)
										<p style="color:red">{{ $error }}</p>
									@endforeach
							@endif
						</div>  
						<input type="hidden" name="newsid" id="newsid"  class="form-control" placeholder="title" value="{{ old('newsid') }}">
						<div class="form-group has-feedback">
							<input type="text" name="title" id="title" class="form-control" placeholder="title" value="{{ old('title') }}">
						  </div>

						<div class="form-group has-feedback">
							<textarea name="description" id="description" class="form-control" placeholder="description" rows="5">{{ old('description') }}</textarea>
						</div>

						<div class="form-group has-feedback">
							<select name="type" id="type" class="form-control">
								<option value="">Select News Type</option>
								<option value="1">Head Line</option>
								<option value="2">General News</option>
								<option value="3">Social News</option>
								<option value="4">Sports News</option>
							</select>
						  </div>
	
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
				  </form>
				</div>
			</div>
		</div>
	  </div>
    </section>
	
    <!-- Main content -->
    <section class="content news">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border text-center">
          <h3 class="box-title">Head Lines</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            <ul>
            @foreach ( $data['headline'] as $value)
                    <li>
                            <h4><b>{{ $value->title }} </b><span class="text-right"><a data-toggle="modal" data-target="#myModal1" data-id="{{ $value->id }}" class="newsid" href="">Edit</a> || <a  href="" data-id="{{ $value->id }}" class="newsdeleteid" >Delete</a></span></h4>
                            <p>{{ $value->description }}</p>
                            <p class="text-right"><b><a href="">Read More</a></b></p>
                    </li>

            @endforeach
            </ul>
        </div>
      </div>
	    <div class="box">
        <div class="box-header with-border text-center">
          <h3 class="box-title">General News</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
			<ul>
				@foreach ( $data['general'] as $value)
				<li>
					<h4><b>{{ $value->title }} </b><span class="text-right"><a data-toggle="modal" data-target="#myModal1" data-id="{{ $value->id }}" class="newsid" href="">Edit</a> || <a href="" data-id="{{ $value->id }}" class="newsdeleteid" >Delete</a></span></h4>
					<p>{{ $value->description }}</p>
					<p class="text-right"><b><a href="">Read More</a></b></p>
				</li>
				
				@endforeach
			</ul>
        </div>
      </div>
	   <div class="box">
        <div class="box-header with-border text-center">
          <h3 class="box-title">Social News</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
			<ul>
			@foreach ( $data['social'] as $value)
				<li>
					<h4><b>{{ $value->title }} </b><span class="text-right"><a data-toggle="modal" data-target="#myModal1" data-id="{{ $value->id }}" class="newsid" href="">Edit</a> || <a href="" data-id="{{ $value->id }}" class="newsdeleteid" >Delete</a></span></h4>
					<p>{{ $value->description }}</p>
					<p class="text-right"><b><a href="">Read More</a></b></p>
				</li>
				
			@endforeach
			</ul>
        </div>
      </div>
      <div class="box">
        <div class="box-header with-border text-center">
          <h3 class="box-title">Sports News</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
			<ul>
			@foreach ( $data['sports'] as $value)
				<li>
					<h4><b>{{ $value->title }} </b><span class="text-right"><a data-toggle="modal" data-target="#myModal1" data-id="{{ $value->id }}" class="newsid" href="">Edit</a> || <a href="" data-id="{{ $value->id }}" class="newsdeleteid" >Delete</a></span></h4>
					<p>{{ $value->description }}</p>
					<p class="text-right"><b><a href="">Read More</a></b></p>
				</li>
				
			@endforeach
			</ul>
        </div>
      </div>
    
    </section>
    <!-- /.content -->
  </div>
@endsection