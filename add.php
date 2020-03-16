<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

</head>
<body>

	<form id="formCity" onsubmit="onSave(); return false;">
		<div>
			<p>
				<label>Название</label>
				<input type="text" required="" name="city">
			</p>

			<p>
				<input type="hidden" name="action" value='add'>
				<input type="submit" value="Сохранить">
			</p>

		</div>
	</form>


<script>
	function onSave()
	{
		let formId = '#formCity';

		$.ajax({
			url: 'server.php',
			type: 'POST',
			dataType: 'json',
			data: $(formId).serialize(),
			success: function(responce){
				if(responce.status == 'ok')
				{
					document.location.href='list.php';
				}
				else
				{
					alert(responce.message);
				}
			}
		})

	}
</script>
</body>
</html>