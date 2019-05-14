@extends('layouts.admin')



@section('content')

@if(Session::has('deleted_user'))
  <p class="bg-danger">{{session('deleted_user')}}</p>
@endif

<h1>users</h1>
<h4>No of User: {{$users->count()}} </h4>
<h4>No of Admin:{{$users->where('role_id','=','1')->count()}}</h4>
<h4>No of Authur:{{$users->where('role_id','=','2')->count()}}</h4>
<h4>No of Subscriber:{{$users->where('role_id','=','3')->count()}}</h4>


  




<!-- @foreach($users as $user)
    {{$user->role->name}}
    {{$adminCount = count($user->role->name == 'Administrator')}}
   {{$user->role->count()}}
@endforeach -->

<table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created Date</th>
        <th>Updated Date</th>
      </tr>
    </thead>
    <tbody>
 @if($users)
      @foreach($users as $user)

      <tr>
      
        
        <td>{{$user->id}}</td>
        <!-- <td><img height="50" src="/images/{{$user->photo ? $user->photo->file : 'no photo'}}" alt=""></td> -->

        @if(($user->photo))
          <td><img height="50" src="{{$user->photo->file}}" alt=""></td>
         @else
          <td>No Photo</td>
         @endif


        <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
        
        
      </tr>
		
     @endforeach

   @endif

    </tbody>

   
  </table>


@stop