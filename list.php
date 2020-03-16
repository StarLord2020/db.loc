<?php 
require_once('models/city.class.php');

$cityClass = new News();
$news = $cityClass->get_all();

?>
<p><a href="add.php">Добавить новый город</a></p>
<table>
	<tr>
		<th>№ п/п</th>
		<th>Заголовок</th>
		<th>Операции</th>
	</tr>

	<?php
	$i = 1;
	foreach($news as $elem):
	?>

		<tr>
			<td><? echo $i++?></td>
			<td>
                <a href="show.php?id=<?php echo $elem['id']?>"><? echo $elem['name']?></a>
            </td>
			<td>
				<a href="edit.php?id=<?php echo $elem['id']?>">edit</a>
			</td>
		</tr>

	<?php endforeach;?>
</table>

