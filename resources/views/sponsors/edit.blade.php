@extends('layout')
@section('content')
<form method="POST" action="{{route('sponsors.update', $sponsor->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group mb-3">
		<label>Nom du sponsor</label>
		<input type="text" name="name" class="form-control" value="{{$sponsor->name}}" />
	</div>

	<div class="form-group mb-3">
		<label>Image</label>
		<input type="file" name="image" class="form-control" />
		<img src="/images/{{$sponsor->image}}" width="100px">
	</div>

	<div class="form-group mb-3">
		<button type="submit" class="btn btn-primary">Modifier</button>
		<a href="/">Retour</a>
	</div>
</form>
@endsection
