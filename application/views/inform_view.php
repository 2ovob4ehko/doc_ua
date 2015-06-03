<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Фізична особа - <?=$fio?> - Інформація</title>
		<link rel="stylesheet" href="<?=base_url()?>data/css/style.css" type="text/css" media="all" />
		<script src="<?=base_url()?>data/js/jquery.js" type="text/javascript"></script>
		<script src="<?=base_url()?>data/js/action.js" type="text/javascript"></script>
	</head>
	<body>
	<div class="page_title">Інформація по фізичній особі</div>
	<div class="top_menu"><a href="../../">Головна сторінка</a></div>
	<fieldset>
		<legend onclick="toggleFild(this.parentNode);"class="section_title">ПЕРСОНАЛЬНІ ДАНІ</legend>
		<table>
			<tr>
				<td>ДРФО</td><td><?=$ipn?></td>
				<td rowspan="10" class="center"><img src="<? echo base_url().'data/photo/'.$photo;?>"></td>
			</tr>
			<tr>
				<td>Прізвище ім’я (по-батькові)</td><td><?=$fio?></td>
			</tr>
			<tr>
				<td>Дата народження</td><td><?=$born?></td>
			</tr>
			<tr>
				<td>Стать</td><td><?=$sex?></td>
			</tr>
		</table>
	</fieldset>
	</body>
</html>