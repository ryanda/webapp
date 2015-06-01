@extends('larapus.layout.master')

@section('title')
	{{ $title }}
@stop

@section('asset')
	@include('larapus.layout.select2')
@stop

@section('breadcrumb')
	<li><a href="/">Dashboard</a></li>
	<li><a href="{{ route('admin.books.index') }}">Buku</a></li>
	<li class="uk-active">{{ $title }}</li>
@stop

@section('content')
	{{ Form::model($book, array(
		'url' => route('admin.books.update', ['books'=>$book->id]), 
		'method' => 'put', 
		'files' => 'true',
		'class' => 'uk-form uk-form-horizontal')) }}
	@include('larapus.layout.form')
	{{ Form::close() }}
@stop