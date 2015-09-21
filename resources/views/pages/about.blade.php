@extends('app')

@section('content')

<!-- 1st variant -->
<h1>About Me: {!! $name !!}</h1>

@if (count($people))
	<h3>People I like</h3>
	<ul>
		@foreach ($people as $person)
			<li>{{ $person }}</li>
		@endforeach
	</ul>
@endif

<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque efficitur velit, ultrices tempus nisi dignissim sed. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et tempus sapien, et elementum odio. Duis at augue laoreet, tincidunt sapien et, consectetur diam. Quisque accumsan dui vitae risus faucibus, a porttitor lectus suscipit. Nunc lacinia malesuada orci. Donec pretium vel libero ut condimentum. In dolor quam, lacinia vitae lorem sit amet, venenatis lacinia neque.
</p>

@stop