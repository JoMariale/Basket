<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs x Sponsors') }}
        </h2>
</x-slot>

<h1>Les clubs et leurs sponsors</h1>
<ul>
	@foreach($clubsList as $item)
	<li>{{$item->clubName}}-{{$item->sponsorName}}-{{$item->price}} </li>
	@endforeach
</ul>

</x-app-layout>
