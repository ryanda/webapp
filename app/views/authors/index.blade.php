@extends ('larapus.layout.master')

@section('asset')
	@include('larapus.layout.datatable')
@stop

@section('title')
	{{ $title }}
@stop

@section('title-button')
	{{ HTML::buttonAdd() }}
@stop
@section('breadcrumbs')
	<li>Dashboard</li>
	<li> {{ $title }} </li>
@stop

@section('content')
	Tambah Penulis <br>
	{{ Datatable::table()
			->addColumn('id', 'Nama', '')
			->setOptions('aoColumnDefs', array(
					array(
						'bVisible' 	=> false,
						'aTargets' 	=> [0]),
					array(
						'sTitle' 	=> 'Nama',
						'aTargets' 	=> [1]),
					array(
						'bSortable' => false,
						'aTargets' => [2]),
					))
			->setOptions('bProcessing', true)
			->setUrl(route('admin.authors.index'))
			->render('larapus.datatable.uikit') }}
@stop