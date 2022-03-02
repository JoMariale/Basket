@extends('layout')
@section('content')
<h1>Ajouter un club</h1>
<form method="POST" action="{{route('clubs.store')}}" >
    @csrf
    <div class="form-group mb-3">
        <label>Nom du Club</label>
        <input type="text" name="name" class="form-control" />
    </div>

    <div class="form-group mb-3">
		<label>Image</label>
		<input type="file" name="image" class="form-control" />
	</div>

    <div class="form-group mb-3">
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="/">Retour</a>
    </div>
</form>
@endsection
