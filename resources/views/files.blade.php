<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simple Fileshare</title>
</head>

<body>
	<form method="POST" enctype="multipart/form-data">
		@csrf

		<input type="file" id="fileUpload" name="fileUpload" enctype="multipart/form-data">
		<input type="submit" value="Upload">
	</form>
	<hr />
	<h3>Disk Usage: {{ $totalSize }} / 50 G</h3>
	<table>
		@foreach($files as $file)
		<tr>
			<td style="text-align: right">{{ $file['size'] }}</td>
			<td><a href="/files/{{ $file['name'] }}">{{ $file['name'] }}</a></td>
		</tr>
		@endforeach
	</table>
</body>

</html>