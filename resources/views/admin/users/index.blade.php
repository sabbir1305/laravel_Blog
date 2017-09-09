@extends('layouts.admin')

@section('content')

@if(Session::has('delete_user'))
	<h3 class="text-success">{{session('delete_user')}}</h3>

@endif
<h1 class="text-center">Users</h1>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Active</th>
			<th>Created</th>
			<th>Updated</th>

		</tr>
	</thead>
	<tbody>
		@if($users)
			@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td> <img src="{{ $user->photo ? $user->photo->file : 'no image' }}" alt=""> </td>
			<td> <a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>

			<td>{{$user->email}}</td>
			<td>{{$user->role->name}}</td>
			<td>{{$user->is_active == 1 ?'Active' : 'Not Active'}}</td>
			<td>{{$user->created_at->diffForHumans()}}</td>
			<td>{{$user->updated_at->diffForHumans()}}</td>
		</tr>

			@endforeach
		@endif
	</tbody>
</table>

@endsection