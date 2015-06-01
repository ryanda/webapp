@extends('larapus.layout.master')

@section('title')
	{{ $title }}
@stop

@section('asset')
	@include('larapus.layout.select2')
@stop

@section('breadcrumb')
	<li><a href="/">Dashboard</a></li>
	<li><a href="{{ Route('admin.books.index') }}">Buku</a></li>
	<li class="uk-active">{{ $title }}</li>
@stop

@section('content')
	{{ Form::open(array(
		'url' => route('admin.books.store'), 
		'method' => 'post', 
		'files' => 'true',
		'class' => 'uk-form uk-form-horizontal')) 
	}}
	@include('larapus.layout.form')
	{{ Form::close() }}
@stop