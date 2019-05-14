@extends('layouts.admin')

@section('content')
<h1>Create Users</h1>


		{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
		@csrf
		<div class="form-group">
			{!! Form::label('name', 'Noman') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'email') !!}
			{!! Form::email('email', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('role_id', 'Roles') !!}
			{!! Form::select('role_id',[''=>'Select Options'] + $roles, null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('is_active', 'Status') !!}
			{!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Photo:') !!}
			{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}
		</div>
			
		
		<div class="form-group">
			{!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}

@include('includes.form_error')



@stop