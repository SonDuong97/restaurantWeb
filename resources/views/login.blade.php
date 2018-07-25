<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				@if (count($errors) > 0)
					@foreach($errors->all() as $error)
						<div class = "alert alert-danger">{{$error}}</div>
					@endforeach
				@endif
				@if (session('notification'))
					<div class="alert alert-danger">{{session('notification')}}</div>
				@endif
				<form action="{{route('postForm')}}" method="POST" role="form">
					<legend>Login</legend>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
							<p style="color:red"></p>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
							<p style="color:red"></p>
					</div>
				
					
					{!! csrf_field() !!}
					<input type="submit" class="btn btn-primary" value="Đăng nhập"></input>
				</form>
			</div>
		</div>
	</div>
</body>
</html>