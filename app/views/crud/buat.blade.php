<html>
	<head>
		<title>Tambah Biodata</title>
	</head>
	<body>
		<h2>Tambah Biodata Baru</h2>
		<!-- Buka form inputan lalu ruju ke identitas route "buat" -->
		{{ Form::open(array('route' => 'buat')) }}
			{{ Form::label('nama', 'Nama') }}
			{{ Form::text('nama') }}
			<!-- Bila ada errors validasi letakkan disini 
			variabel errors ($errors) berasal dari Controller ['withErrors'] -->
			@if($errors->has('nama'))
				{{ $errors->first('nama') }}
			@endif
			<br/>
			{{ Form::label('usia', 'Usia') }}
			{{ Form::text('usia') }}
			<!-- Penjelasan sama seperti diatas -->
			@if($errors->has('usia'))
				{{ $errors->first('usia') }}
			@endif
			<br/>
			{{ Form::label('jk', 'Jenis Kelamin') }}
			{{ Form::select('jk', $jk) }}
			@if($errors->has('jk'))
				{{ $errors->first('jk') }}
			@endif
			<br/>
			{{ Form::label('telepon', 'Telepon') }}
			{{ Form::text('telepon') }}
			@if($errors->has('telepon'))
				{{ $errors->first('telepon') }}
			@endif
			<br/>
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email') }}
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
			<br/>
			{{ Form::submit('Buat') }}
		{{ Form::close() }}
	</body>
</html>