@extends('layout')
@section('content')
<h1>Associer un sponsor à un club</h1>
<form method="POST" action="{{route('clubs-sponsors.store')}}" >
	@csrf

	<div class="form-group mb-3">
    <label >Clubs :</label>
    <select class="form-control" name="club_id">
			@foreach($clubsList as $item)
      <option value="{{$item->id}}">{{$item->name}}</option>
			@endforeach
    </select>
	</div>

	<div class="form-group mb-3">
    <label >Sponsors :</label>
    <select class="form-control" name="sponsor_id">
			@foreach($sponsorsList as $item)
      <option value="{{$item->id}}">{{$item->name}}</option>
			@endforeach
    </select>
	</div>

	<div class="form-group mb-3">
		<label>Prix</label>
		<input type="number" name="price" class="form-control" />
	</div>

	<div class="form-group mb-3">
		<button type="submit" class="btn btn-primary">Ajouter</button>
		<a href="/">Retour</a>
	</div>
</form>
@endsection
