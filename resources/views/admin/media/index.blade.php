@extends('layouts.admin')

@section('content')
	
	<h1>Media</h1>
			@if(Session::has('delete_photo'))
			<p class="bg-danger">{{Session('delete_photo')}}</p>
			@endif
@if($photos)
	<form action="delete/media" method="post" class="form-inline">
		@csrf
		<div class="form-gorup">
			<select name="checkBoxArray" id="" class="form-control">
				<option value="">Delete</option>
			</select>

			<div class="form-group">
				<input type="submit" name="delete_all" class="btn-primary">
			</div>
		</div>

	<table class="table">
		<thead>
			<tr>
				<th><input type="checkbox" id="options"></th>
				<th>Id</th>
				<th>Name</th>
				<th>Created</th>
			</tr>
		</thead>
		<tbody>				
		@foreach($photos as $photo)
			<tr>
				<td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]"" value="{{$photo->id}}"></td>
				<td>{{$photo->id}}</td>
				<td><img height="50" src="{{$photo->file}}" alt=""></td>
				<td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>			
				<td>
				<input type="hidden" name="photo" value="{{$photo->id}}">

					<!-- <div class="form-group">
						<input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
					</div> -->
					
				</td>
			</tr>
	@endforeach
		</tbody>
	</table>

	</form>

@endif



@stop

@section('scripts')
	<script type="text/javascript">
	$(document).ready(function(){
		$('#options').click(function(){
			if (this.checked) {
				$('.checkBoxes').each(function(){
					this.checked = true;
				});
			}else{
				$('.checkBoxes').each(function(){
					this.checked = false;
				});
			}	
		});
	});
</script>

@stop