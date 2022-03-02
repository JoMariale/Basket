<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des sponsors') }}
        </h2>
</x-slot>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
		<div class="row">

      @foreach($sponsorList as $item)
			{{++$i}}
      <div class="card mr-4" style="width: 15rem;">
        <img class="card-img-top p-3" src="images/{{$item->image}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$item->name}}</h5>
					<a href="{{route('sponsors.edit', $item->id)}}">Editer</a>
					<form action="{{ route('sponsors.destroy', $item->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
          </form>
        </div>
      </div>
      @endforeach
    </div>
</x-app-layout>
