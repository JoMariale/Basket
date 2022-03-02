<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des clubs') }}
        </h2>
        <a class="btn btn-primary" href="/clubs/create" role="button" >Ajouter un club</a>
</x-slot>
<a class="btn btn-primary" href="/clubs/create" role="button" >Ajouter un club</a>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">

      @foreach($clubList as $item)
			{{++$i}}
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="images/{{$item->image}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$item->name}}</h5>
					<a href="{{route('clubs.edit', $item->id)}}">Editer</a>
					<form action="{{ route('clubs.destroy', $item->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Supprimer</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>
</x-app-layout>

