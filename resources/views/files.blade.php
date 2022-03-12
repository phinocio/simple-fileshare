<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simple Fileshare</title>

	<link href="{{ asset('app.css') }}" rel="stylesheet">
</head>

<body>
	<div id="container">
		<div class="header">
			<form method="POST" enctype="multipart/form-data">
				@csrf

				<input type="file" id="fileUpload" name="fileUpload">
				<input class="uploadButton" type="submit" value="Upload">
			</form>
		</div>

		<div class="files">
			<h2 style="color: #ff79c6" >Disk Usage: {{ $totalSize }} / 20 G</h2>
			<table>
				@foreach($files as $file)
				<tr>
					<td style="color: #50fa7b; text-align: right">{{ $file['size'] }}</td>
					<td><a style="color: #caa9fa" href="/{{ $file['name'] }}">{{ $file['name'] }}</a></td>
					<td>
						<form action="/{{ $file['name'] }}" method="POST">
							@csrf
							<button class="deleteButton" type="submit" value="Delete">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</table>

		</div>
	</div>
</body>

</html>