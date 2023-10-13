<html>
<head>
<style>
	body{
		background: lightgray;
	}
	table{
		margin-top: 200px;
		background: white;
	}
</style>
<script>
	function checkEmpty(){
		var img = document.getElementById('fileToUpload').value;
		if(img == ''){
			alert('Please upload an image');
			return false;
		}
		return true;
	}
</script>
</head>
<body>
	<table width="500" align="center">
		<tr><td align="center">	<h2 align="center">Image Uploader & Converter</h2></td></tr>
		<tr><td align="center"><h4>Convert Any image to JPG, PNG, GIF</h4></td></th>
		<tr>
			<td align="center">
				<form action="img-to-pdf-api.php" enctype="multipart/form-data" method="post" onsubmit="return checkEmpty()" />
					<input type="file" name="image" id="fileToUpload" />
					<input type="submit" value="Upload" />
				</form>
			</td>
		</tr>
	</table>
</body>
</html>