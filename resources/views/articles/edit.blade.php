@extends('app')

@section('content')

	<h1>Edit: {!! $article->title !!}</h1>

	{{-- Option 1 for making PATCH method
	{!! Form::model($article, ['method' => 'PATCH', 'url' => 'articles/' . $article->id]) !!} 
	--}}

	{{-- Option 2 for making PATCH method --}}
	{!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
		@include('articles._form', ['submitButtonText' => 'Update Article'])
	{!! Form::close() !!}

	@include('errors.list')

@stop