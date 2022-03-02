@extends('layout')
@section('content')
<form method="POST" action="{{route('clubs.update', $club->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group mb-3">
		<label>Nom du Club</label>
		<input type="text" name="name" class="form-control" value="{{$club->name}}" />
	</div>

	<div class="form-group mb-3">
		<label>Image</label>
		<input type="file" name="image" class="form-control" />
		<img src="/images/{{$club->image}}" width="100px">
	</div>

	<div class="form-group mb-3">
		<button type="submit" class="btn btn-primary">Modifier</button>
		<a href="/">Retour</a>
	</div>
</form>
@endsection
