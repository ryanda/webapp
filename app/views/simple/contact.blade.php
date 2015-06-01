@extends ('simple.default')
@section('content')
	<h1>Contact Us.</h1>
	<p>Please contact us by sending a message using the form below:</p>
	{{ HTML::ul($errors->all(), array('class' => 'errors')) }}
	</br>
	{{ Form::open(array('url' => 'contact')) }}
	{{ Form::label('Subject') }}
	{{ Form::text('subject', 'Enter your subject') }}
	</br>
	{{ Form::label('Message') }}
	{{ Form::text('message', 'Enter your message') }}
	</br>
	{{ Form::submit() }}
	{{ Form::close() }}
@stop