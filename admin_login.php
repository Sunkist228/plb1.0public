<?php
session_start();

if (isset($_SESSION['admin_user'])) {
	header("Location: admin_panel.php");
	exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Подключаем файл с данными для базы данных
	include 'db_config.php';

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$conn->set_charset("utf8"); // устанавливаем кодировку UTF-8
	
	// Получение введенных учетных данных
	$entered_username = $_POST['username'];
	$entered_password = $_POST['password'];

	// Защита от SQL-инъекций (лучше использовать подготовленные запросы)
	$entered_username = mysqli_real_escape_string($conn, $entered_username);
	$entered_password = mysqli_real_escape_string($conn, $entered_password);

	// Поиск пользователя в базе данных
	$sql = "SELECT * FROM admin_users WHERE username='$entered_username'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$stored_password = $row['password'];

		// Проверка введенного пароля
		if ($entered_password == $stored_password) {
			$_SESSION['admin_user'] = $entered_username;
			header("Location: admin_panel.php");
			exit();
		} else {
			$error_message = "Неверный пароль";
		}
	} else {
		$error_message = "Неверное имя пользователя";
	}

	// Закрытие соединения с базой данных
	$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Вход в административную панель</title>
</head>

<body>

	<h2>Вход в административную панель</h2>

	<?php
	if (isset($error_message)) {
		echo "<p style='color: red;'>$error_message</p>";
	}
	?>

	<form method="post">
		<label for="username">Имя пользователя:</label>
		<input type="text" id="username" name="username" required>

		<label for="password">Пароль:</label>
		<input type="password" id="password" name="password" required>

		<button type="submit">Войти</button>
	</form>

</body>

</html>