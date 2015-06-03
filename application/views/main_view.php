<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Фізична особа - <?=$fio?></title>
		<link rel="stylesheet" href="<?=base_url()?>data/css/style.css" type="text/css" media="all" />
		<script src="<?=base_url()?>data/js/jquery.js" type="text/javascript"></script>
		<script src="<?=base_url()?>data/js/action.js" type="text/javascript"></script>
	</head>
	<body>
	<div class="page_title">Головна сторінка фізичної особи</div>
	<div class="page_mtitle"><?=$fio?></div>
	<div title="Повна інформація по людині" class="button" onclick="location.href='/main/inform';">Інформація про мене</div>
	<div title="Місця моєї роботи, де я працюю" class="button" onclick="location.href='/main/mywork';">Моя робота</div>
	<div title="Зарлатні, депозитні та страхові банківські рахунки" class="button" onclick="location.href='/main/mycount';">Банківські рахунки</div>
	<div title="Місце, де можна знайти працівника або роботу" class="button" onclick="location.href='';">Ринок праці</div>
	<div title="Зареєструватися як фізична особа підприємець, щоб наймати найманих працівників" class="button" onclick="location.href='';">Зареєструватися як підприємець</div>
	<div title="Стати засновником організації" class="button" onclick="location.href='/main/createlentity';">Зареєструвати юридичну особу</div>
	<div title="Написати державному органу з якоїсь причини" class="button" onclick="location.href='';">Відправити заявку</div>
	<div title="Вийти зі своєї сторінки, щоб зайшов інший" class="button" onclick="location.href='/main/del_cookie';">Вийти</div>
	</body>
</html>