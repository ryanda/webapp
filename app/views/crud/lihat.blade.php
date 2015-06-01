<html>
	<head>
		<title>Biodata {{ $crud->nama }}</title>
	</head>
	<body>
		<h2>Informasi Biodata</h2>
		<p>Nama : {{ $crud->nama }}</p>
		<p>Usia : {{ $crud->usia }}</p>
		<p>Jenis Kelamin : {{ $crud->jk }}</p>
		<p>Telepon : {{ $crud->telepon }}</p>
		<p>Email : {{ $crud->email }}</p>
		<br/>
		<a href="{{ route('daftar') }}">Kembali ke Daftar</a>
	</body>
</html>