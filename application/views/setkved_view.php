<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Вибір діяльності</title>
		<link rel="stylesheet" href="<?=base_url()?>data/css/style.css" type="text/css" media="all" />
		<script src="<?=base_url()?>data/js/jquery.js" type="text/javascript"></script>
		<script src="<?=base_url()?>data/js/action.js" type="text/javascript"></script>
	</head>
	<body>
	<div class="page_title">Вибір діяльності</div>
	<div class="top_menu"><a href="../../">Головна сторінка</a></div>
	<div id="dialogform">
		<form action="" method="POST">
			<table>
				<tr>
					<td>Назва</td><td><input size="50" name="name" type="text" ></td>
				</tr>
				<tr>
					<td>Юридична адреса</td>
					<td>
						<input name="state" placeholder="Область"><br>
						<input name="town" placeholder="Місто/Село"><br>
						<input name="str" placeholder="Вулиця"><br>
						<input name="house" placeholder="Будинок"><br>
						<input name="room" placeholder="Квартира/Офіс">
					</td>
				</tr>
				<?if(!empty($error)){
						echo '
						<tr><td class="error" colspan="2">'.urldecode($error).'</td></tr>';
						}?>
				<tr>
					<td colspan="2"><input type="submit" value="Продовжити"></td>
				</tr>
			</table>
		</form>
	</div>
	</body>
</html>