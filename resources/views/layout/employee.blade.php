@extends('admin_theme')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Employee Section
            <small>All Employees...</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL()}}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li class="active">Employee Section</li>
        </ol>
    </section>

    <section class="content-header">
        <!-- Button trigger modal -->
        <div class="text-center">
            <button type="button" style="border-radius:10px; padding:7px 20px;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add New Employee 
            </button>
        </div>
        <!-- Modal for add news -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:600px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel">Add New Employee</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open( array( 'url' => 'addemp' , 'id' => 'empform' , 'class' => 'form', 'method' => 'post' , 'files' => true)) !!}
                            {!! csrf_field() !!}
                            <div class="form-group has-feedback">
                                @if (count($errors))
                                @foreach($errors->all() as $error)
                                <p style="color:red">{{ $error }}</p>
                                @endforeach
                                @endif
                            </div>  
                            <div class="form-group has-feedback">
                               {!! Form::text('name' , old('name') , array('class' => 'form-control required', 'id' => 'name' , 'placeholder' => 'Enter Name' )) !!}
                            </div>
                            <div class="form-group has-feedback">
                               {!! Form::email('email' , old('email') , array('class' => 'form-control required', 'id' => 'email' , 'placeholder' => 'Enter Email' )) !!}
                            </div>
                            <div class="form-group has-feedback">
                               {!! Form::password('password' , array('class' => 'form-control required', 'id' => 'password' , 'placeholder' => 'Enter password' )) !!}
                            </div>
                            <div class="form-group has-feedback">
                               {!! Form::textarea('content',Input::old('content'),array( 'class' => 'form-control required' , 'id' => 'content' , 'placeholder' => 'Enter Your Content' , 'rows' => '5' , 'cols' => '55' )) !!}
                            </div>
                            <div class="form-group has-feedback">
                                {!! Form::label('subscription', 'Registration For Subscription: ', array('class' => '')) !!}
                                {!! Form::checkbox('subscription') !!} &nbsp&nbsp&nbsp  
                            </div>
                            <div class="form-group has-feedback">
                                {!! Form::label('Gender', 'Gender : ', array('class' => '')) !!}
                                <div>
                                    Male : {!! Form::radio('gender', 'M', (Input::old('gender') == 'M'), array('id'=>'male', 'class'=>'' , 'value' => 'M' , 'checked' => 'checked')) !!} &nbsp&nbsp&nbsp 
                                    Female : {!! Form::radio('gender', 'F', (Input::old('gender') == 'F'), array('id'=>'female', 'class'=>'' , 'value' => 'F' )) !!}
                                </div> 
                            </div>
                            <div class="form-group has-feedback files">
                                {!! Form::file('file', ['class' => 'form-control required']) !!}
                            </div>
                            <div class="form-group has-feedback"> 
                                {!! Form::select('type', [
                                                    '' => 'Select Any One',
                                                    'young' => 'Under 18',
                                                    'adult' => '19 to 30',
                                                    'adult2' => 'Over 30'] , null, ['class' => 'form-control required']) !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                {!! Form::submit('Add Employee!' , array( 'class' => 'btn btn-primary' )) !!}
                            </div>
                     {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        
         <!-- Model For Edit employee -->
	  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:600px">
                    <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <h4 class="modal-title text-center" id="myModalLabel">Edit Employee</h4>
                        </div>
                        <div class="modal-body">
                          {!! Form::open( array( 'url' => 'editemp' ,  'id' => 'empformedit' , 'class' => 'form', 'method' => 'post' , 'files' => true)) !!}
                                {!! csrf_field() !!}
                                <div class="form-group has-feedback">
                                    @if (count($errors))
                                    @foreach($errors->all() as $error)
                                    <p style="color:red">{{ $error }}</p>
                                    @endforeach
                                    @endif
                                </div>  
                                {!! Form::hidden('emp_id', old('emp_id'), array('id' => 'emp_id')) !!}
                                <div class="form-group has-feedback">
                                   {!! Form::text('name' , old('name') , array('class' => 'form-control required', 'id' => 'name' , 'placeholder' => 'Enter Name' )) !!}
                                </div>
                                <div class="form-group has-feedback">
                                   {!! Form::email('email' , old('email') , array('class' => 'form-control required', 'id' => 'email' , 'placeholder' => 'Enter Email' )) !!}
                                </div>
                                <div class="form-group has-feedback">
                                   {!! Form::password('password' , array('class' => 'form-control required', 'id' => 'password' , 'placeholder' => 'Enter password' )) !!}
                                </div>
                                <div class="form-group has-feedback">
                                   {!! Form::textarea('content',Input::old('content'),array('class' => 'form-control required' , 'id' => 'content' , 'placeholder' => 'Enter Your Content' , 'rows' => '5' , 'cols' => '55' )) !!}
                                </div>
                                <div class="form-group has-feedback">
                                    {!! Form::label('subscription', 'Registration For Subscription: ', array('class' => '')) !!}
                                    {!! Form::checkbox('subscription' ) !!} &nbsp&nbsp&nbsp  
                                </div>
                                <div class="form-group has-feedback">
                                    {!! Form::label('Gender', 'Gender : ', array('class' => '')) !!}
                                    Male : {!! Form::radio('gender', 'M', (Input::old('gender') == 'M'), array('id'=>'male', 'class'=>'' , 'value' => 'M' )) !!} &nbsp&nbsp&nbsp 
                                    Female : {!! Form::radio('gender', 'F', (Input::old('gender') == 'F'), array('id'=>'female', 'class'=>'' , 'value' => 'F' )) !!}
                                </div> 
                                <div class="form-group has-feedback fileupload files">
                                    {!! Form::file('file', ['class' => 'form-control required']) !!}
                                </div>
                                <div class="form-group has-feedback">
                                    {!! Form::select('type', [
                                                        '' => "Select Any one",
                                                        'young' => 'Under 18',
                                                        'adult' => '19 to 30',
                                                        'adult2' => 'Over 30'] , null, ['class' => 'form-control required' , 'id' => 'type' ]) !!}
                                </div>                        
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    {!! Form::submit('Update Record!' , array( 'class' => 'btn btn-primary' )) !!}
                                </div>
                         {!! Form::close() !!}      
                        </div>
                     </div>
		</div>
	  </div>
    </section>

    <!-- Main content -->
    <section class="content employee">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <table id="example" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Content</th>
                            <th>Photo</th>
                            <th>type</th>
                            <th>Subscription</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php  $no = 0 ?>
                    @foreach ( $data as $value)
                    <?php $no++ ?>
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->gender }}</td>
                        <td>{{ $value->content }}</td>
                        <td>{{ $value->photo }}</td>
                        <td>{{ $value->type }}</td>
                        <td>{{ $value->subscription }}</td>
                        <td><a data-toggle="modal" data-target="#myModal1" data-id="{{ $value->id }}" class="empeditid" href="">Edit</a> || <a  href="javascript:void(0)" data-id="{{ $value->id }}" class="empdeleteid" >Delete</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection