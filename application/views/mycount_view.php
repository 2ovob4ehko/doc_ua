<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Банківські рахунки</title>
		<link rel="stylesheet" href="<?=base_url()?>data/css/style.css" type="text/css" media="all" />
		<script src="<?=base_url()?>data/js/jquery.js" type="text/javascript"></script>
		<script src="<?=base_url()?>data/js/action.js" type="text/javascript"></script>
	</head>
	<body>
	<div class="page_title">Банківські рахунки</div>
	<div class="top_menu"><a href="../../">Головна сторінка</a></div>
	<div id="table_list">
		<table>
			<thead>
				<tr>
					<td>Банк</td><td>Вид рахунку</td><td>Сума</td><td>Валюта</td><td>Дата відкриття</td>
				</tr>
			</thead>
				<? foreach($accounts as $item){
				echo '<tr>
					<td>'.$item->legal_name.'</td><td>'.$item->account_type.'</td><td>'.$item->balance.'</td><td>'.$item->valuta.'</td><td>'.date("d.m.Y", strtotime($item->open)).'</td>
				</tr>';
				}?>
		</table>
	</div>
	</body>
</html>