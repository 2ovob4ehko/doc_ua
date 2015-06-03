<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Моя робота</title>
		<link rel="stylesheet" href="<?=base_url()?>data/css/style.css" type="text/css" media="all" />
		<script src="<?=base_url()?>data/js/jquery.js" type="text/javascript"></script>
		<script src="<?=base_url()?>data/js/action.js" type="text/javascript"></script>
	</head>
	<body>
	<div class="page_title">Моя робота</div>
	<div class="top_menu"><a href="../../">Головна сторінка</a></div>
	<div id="table_list">
		<div class="page_mtitle">Працюю на підприємствах</div>
		<table>
			<thead>
				<tr>
					<td>Код</td><td>Назва</td><td>Адреса</td><td>Дата створення</td><td>Посада</td>
				</tr>
			</thead>
				<? foreach($work_for as $item){
				echo '<tr>
					<td>'.$item->lentity_id.'</td><td>'.$item->name.'</td><td>'.$item->address.'</td><td>'.date("d.m.Y", strtotime($item->create_date)).'</td><td>'.$item->position.'</td>
				</tr>';
				}?>
		</table>
		<br>
		<div class="page_mtitle">Засновник підприємств</div>
		<table>
			<thead>
				<tr>
					<td>Код</td><td>Назва</td><td>Адреса</td><td>Дата створення</td><td>Вид діяльності</td>
				</tr>
			</thead>
				<? foreach($lentity as $item){
				echo '<tr>
					<td>'.$item->legal_id.'</td><td>'.$item->legal_name.'</td><td>'.$item->address.'</td><td>'.date("d.m.Y", strtotime($item->create_date)).'</td><td title="'.$item->text.'">'.$item->name.'</td>
				</tr>';
				}?>
		</table>
	</div>
	</body>
</html>