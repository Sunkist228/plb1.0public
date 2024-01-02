<?php
include 'db_config.php';

$conn->set_charset("utf8");

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    // Получаем данные из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $consent = $_POST['consent'] == 'on' ? 1 : 0; // Преобразуем 'on' в 1, иначе в 0

    // Готовим SQL-запрос для проверки наличия данных в базе по номеру телефона
    $check_sql = "SELECT * FROM applications WHERE phone = '$phone'";

    // Выполняем запрос
    $check_result = $conn->query($check_sql);

    // Проверяем, есть ли совпадающие данные в базе
    if ($check_result->num_rows > 0) {
        // Совпадающие данные уже существуют
        $response = array('success' => false, 'message' => 'Такой номер телефона уже существует в базе данных');
        echo json_encode($response);
        exit;
    } else {
        // Совпадающих данных нет, продолжаем обработку заявки

        // Готовим SQL-запрос
        $sql = "INSERT INTO applications (name, email, phone, message, consent) VALUES ('$name', '$email', '$phone', '$message', $consent)";

        // Проверяем успешность выполнения запроса
        if ($conn->query($sql) === TRUE) {
            // Заявка успешно добавлена

            // Получаем идентификаторы чата из базы данных
            $chatIds = getTelegramChatIds();

            // Отправка уведомления в Telegram каждому идентификатору чата
            $telegramBotToken = '6922889033:AAFuzU7C1n_28fkypOyXpscwkhrDgF-AfE0';
            $telegramMessage = "Новая заявка!\nИмя: $name\nEmail: $email\nТелефон: $phone\nСообщение: $message";

            foreach ($chatIds as $chatId) {
                sendTelegramMessage($telegramBotToken, $chatId, $telegramMessage);
            }

            $response = array('success' => true, 'message' => 'Заявка успешно отправлена. Мы свяжемся с вами в ближайшее время.');
            echo json_encode($response);
            exit;
        } else {
            // Ошибка при выполнении запроса
            $response = array('success' => false, 'message' => 'Ошибка при отправке заявки: ' . $conn->error);
            echo json_encode($response);
            exit;
        }
    }
} else {
    // Если форма не была отправлена, просто выводим стандартную страницу
    // Можно добавить дополнительный код или редирект на нужную страницу
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Ваши метатеги и стили -->
</head>

<body>
    <!-- Весь ваш HTML-код -->
</body>

</html>
<?php
}
// Закрываем соединение
$conn->close();

function sendTelegramMessage($token, $chatId, $message)
{
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = array(
        'chat_id' => $chatId,
        'text' => $message,
    );

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($data),
        ),
    );

    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}
?>
