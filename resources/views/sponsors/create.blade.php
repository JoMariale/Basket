@extends('layout')
@section('content')
<h1>Ajouter un sponsor</h1>
<form method="POST" action="{{route('sponsors.store')}}" >
    @csrf
    <div class="form-group mb-3">
        <label>Nom du sponsor</label>
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
