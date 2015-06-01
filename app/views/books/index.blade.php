@extends('larapus.layout.master')

@section('asset')
	@include('larapus.layout.datatable')
@stop

@section('title')
	{{ $title }}
@stop

@section('title-button')
	{{ HTML::buttonAdd() }}
@stop

@section('breadcrumb')
	<li> <a href="/">Dashboard</a></li>
	<li class="uk-active">{{ $title }}</li>
@stop

@section('content')
	{{ Datatable::table()
		->addColumn('id', 'title', 'author', 'amount', '')
		->setOptions('aoColumnDefs', array (
			array(
				'bVisible' => false,
				'aTargets' => [0]),
			array(
				'sTitle' => 'Judul',
				'aTargets' => [1]),
			array(
				'sTitle' => 'Jumlah',
				'aTargets' => [2]),
			array(
				'sTitle' => 'Penulis',
				'aTargets' => [3]),
			array(
				'bSortable' => false,
				'aTargets' => [4])
			))
		->setOptions('bProcessing', true)
		->setUrl(route('admin.books.index'))
		->render('larapus.datatable.uikit') }}
@stop
	