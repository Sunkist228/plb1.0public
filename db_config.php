<?php
$servername = "localhost";
$username = "u2403240_Plb";
$password = "lK7vB4iR8dlB1wT1";
$dbname = "u2403240_plb";
// Telegram bot configuration
$telegram_bot_token = '6922889033:AAFuzU7C1n_28fkypOyXpscwkhrDgF-AfE0';

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

function getTelegramChatIds()
{
	global $conn;
	$result = $conn->query("SELECT chat_id FROM chat_ids");
	$chatIds = array();

	while ($row = $result->fetch_assoc()) {
		$chatIds[] = $row['chat_id'];
	}

	return $chatIds;
}

function addTelegramChatId($chatId)
{
	global $conn;
	$chatId = mysqli_real_escape_string($conn, $chatId);
	$conn->query("INSERT INTO chat_ids (chat_id) VALUES ('$chatId')");
}

function removeTelegramChatId($chatId)
{
	global $conn;
	$chatId = mysqli_real_escape_string($conn, $chatId);
	$conn->query("DELETE FROM chat_ids WHERE chat_id = '$chatId'");
}
?>