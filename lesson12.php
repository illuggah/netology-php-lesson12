<?php

	$username = 'makhnev';
	$password = 'neto1294';

	$pdo_db = new PDO('mysql:host=localhost;dbname=global;charset=utf8', $username, $password);

	$sql_query = 'SELECT name, author, genre, year, isbn FROM global.books';
	$stm = $pdo_db->prepare($sql_query);
	$stm->execute();

	$extracted = [];

	while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
		$extracted[] = $row;
	}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Библиотека</title>
</head>
<body>
	<h2 style="text-align: center;">Библиотека успешного человека</h2>
	<table cellpadding="8" cellspacing="0" border="1">
		<tr><th>Название</th><th>Автор</th><th>Жанр</th><th>Год выпуска</th><th>ISBN</th></tr>
		<?php 
			foreach ($extracted as $row) {
				echo '<tr><td>' . $row['name'] . '</td><td>' . $row['author'] . '</td><td>' . $row['genre'] . '</td><td>' . $row['year'] . '</td><td>' . $row['isbn'] . '</td></tr>';
			}
		?>
	</table>
</body>
</html>
