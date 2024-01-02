<?php
session_start();

// Подключаем файл с данными для базы данных
include 'db_config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8"); // устанавливаем кодировку UTF-8

$message = "";

// Проверка наличия параметра action в URL
if (isset($_GET['action'])) {
	$action = $_GET['action'];

	switch ($action) {
		case 'edit':
			if (!isset($_GET['id']) || empty($_GET['id'])) {
				$message = "Неверные параметры запроса для редактирования заявки.";
			} else {
				$application_id = $_GET['id'];
				$sql = "SELECT * FROM applications WHERE id=$application_id";
				$result = $conn->query($sql);

				if ($result->num_rows == 1) {
					$row = $result->fetch_assoc();
					$name = $row['name'];
					$email = $row['email'];
					$phone = $row['phone'];
					$message = $row['message'];
					$consent = $row['consent'];
					$deal_completed = $row['deal_completed'];
				} else {
					$message = "Заявка не найдена.";
				}
			}
			break;

		case 'update':
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$application_id = $_POST['id'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$message = $_POST['message'];
				$consent = isset($_POST['consent']) ? 1 : 0;
				$deal_completed = isset($_POST['deal_completed']) ? intval($_POST['deal_completed']) : 0;

				$sql = "UPDATE applications SET 
                        name='$name', 
                        email='$email', 
                        phone='$phone', 
                        message='$message', 
                        consent=$consent,
                        deal_completed=$deal_completed
                        WHERE id=$application_id";

				if ($conn->query($sql) === TRUE) {
					$message = "Заявка успешно обновлена.";
				} else {
					$message = "Ошибка при обновлении заявки: " . $conn->error;
				}
			} else {
				$message = "Недопустимый метод запроса для обновления заявки.";
			}
			break;

		case 'delete':
			if (!isset($_GET['id']) || empty($_GET['id'])) {
				$message = "Неверные параметры запроса для удаления заявки.";
			} else {
				$application_id = $_GET['id'];
				$sql = "DELETE FROM applications WHERE id=$application_id";

				if ($conn->query($sql) === TRUE) {
					$message = "Заявка успешно удалена.";
				} else {
					$message = "Ошибка при удалении заявки: " . $conn->error;
				}
			}
			break;

		default:
			$message = "Неизвестное действие.";
			break;
	}
}

// Получение заявок из базы данных
$sql = "SELECT * FROM applications";
$result = $conn->query($sql);

// Проверка наличия записей в таблице
if ($result->num_rows === 0) {
	// Сброс автоинкремента, если нет записей
	$resetAutoIncrementSql = "ALTER TABLE applications AUTO_INCREMENT = 1";
	$conn->query($resetAutoIncrementSql);
}

// Закрытие соединения с базой данных
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Административная панель</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<h2>Административная панель</h2>

	<?php
	if (!empty($message)) {
		echo "<p>$message</p>";
	}
	?>

	<h3>Список заявок</h3>

	<?php
	if ($result->num_rows > 0) {
		echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Сообщение</th>
                <th>Согласие</th>
                <th>Время создания</th>
                <th>Завершена</th>
                <th>Действия</th>
            </tr>";

		while ($row = $result->fetch_assoc()) {
			echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['message']}</td>
                <td>{$row['consent']}</td>
                <td>{$row['timestamp']}</td>
                <td>{$row['deal_completed']}</td>
                <td>
                    <a href='admin_panel.php?action=edit&id={$row['id']}'>Редактировать</a> |
                    <a href='admin_panel.php?action=delete&id={$row['id']}'>Удалить</a>
                </td>
            </tr>";
		}

		echo "</table>";
	} else {
		echo "Нет доступных заявок.";
	}
	?>

	<br>
	<a href="admin_logout.php">Выйти из административной панели</a>

	<?php
	if (isset($action) && $action == 'edit') {
		// Вывод формы для редактирования
		echo "<h3>Редактирование заявки</h3>";

		if (isset($application_id)) {
			echo "<form action='admin_panel.php?action=update' method='post'>
                <input type='hidden' name='id' value='{$application_id}'>
    
                <label for='name'>Имя:</label>
                <input type='text' id='name' name='name' value='{$name}' required>
    
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' value='{$email}' required>
    
                <label for='phone'>Телефон:</label>
                <input type='tel' id='phone' name='phone' value='{$phone}' required>
    
                <label for='message'>Сообщение:</label>
                <textarea id='message' name='message' required>{$message}</textarea>
    
                <input type='checkbox' id='consent' name='consent' " . ($consent ? "checked" : "") . ">
                <label for='consent'>Я согласен на обработку персональных данных</label>

                <label for='deal_completed'>Сделка завершена:</label>
                <input type='checkbox' id='deal_completed' name='deal_completed' " . ($deal_completed ? "checked" : "") . ">
    
                <button type='submit'>Обновить заявку</button>
            </form>";
		} else {
			echo "Неверные параметры запроса для редактирования заявки.";
		}
	}
	?>

</body>

</html>