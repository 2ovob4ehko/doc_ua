<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Авторизація</title>
		<link rel="stylesheet" href="<?=base_url()?>data/css/style.css" type="text/css" media="all" />
		<script src="<?=base_url()?>data/js/jquery.js" type="text/javascript"></script>
		<script src="<?=base_url()?>data/js/action.js" type="text/javascript"></script>
	</head>
	<body>
	<div class="page_title">Авторизація</div>
		<form method="POST" action="<?=base_url()?>main/author_action">
			<div id="author_pos">
				<div id="author">
					<table>
						<tr>
							<td>Логін</td><td><input type="text" name="login"></td>
						</tr>
						<tr>
							<td>Пароль</td><td><input type="password" name="pass"></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Відправити"></td>
						</tr>
						<?if(!empty($error)){
						echo '
						<tr><td class="error" colspan="2">'.urldecode($error).'</td></tr>';
						}?>
						<tr><td colspan="2"><a href="/main/regist">Створити нову фізичну особу</a></td></tr>
					</table>
				</div>
			</div>
		</form>
	</body>
</html>