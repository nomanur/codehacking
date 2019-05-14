@extends('layouts.admin')

@section('content')
<h1>Edit User</h1>
	

		<div class="col-md-3">
			<img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/200x200'}}" class="img-responsive img-rounded"></img>
		</div>


		<div class="col-md-9">

			
		
			{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
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
				{!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
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
				{!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
			</div>

			{!! Form::close() !!}
			
			{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
			
			
				<div class="form-group">
					{!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
				</div>
			{!! Form::close() !!}
			
		</div>

			

	</div>
		<div class="row">
			@include('includes.form_error')
		</div>



@stop