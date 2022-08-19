<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$users = array(
    array(
        'email' => 'check1@gmail.com',
        'id' => '0',
        'name' => 'Васин Олег'
    ),
    array(
        'email' => 'check2@gmail.com',
        'id' => '1',
        'name' => 'Пупкин Вася'
    ),
    array(
        'email' => 'check3@gmail.com',
        'id' => '2',
        'name' => 'Митин Гена'
    )
);


$error = $success = '';

$inputLogin = test_input($_POST['inputLogin']);
$inputEmail = test_input($_POST['inputEmail']);
$firstPass = test_input($_POST['firstPass']);
$secPass = test_input($_POST['secPass']);

if (filter_var($inputEmail, FILTER_VALIDATE_EMAIL) == false) {
    $error = "Введите правильный Email!";
} elseif ($firstPass !== $secPass) {
    $error = "Пароли не совпадают!";
}

foreach ($users as $user) {
    if ($user['email'] == $inputEmail) {

        $logFile = 'logs.txt';
        $logData = "Вход пользователя " . $user['name'] . "(" . $user['email'] . ") в " . date("H:i:s") . ". Дата: " . date("m.d.y");

        file_put_contents($logFile, PHP_EOL . $logData, FILE_APPEND | LOCK_EX);
    }
}


if (isset($_FILES['imgFile'])) {

    $file = $_FILES['imgFile'];

    $path = SITE_TEMPLATE_PATH . '/img/';
    $name = "img.jpeg";
    if (move_uploaded_file($file['tmp_name'], $path . $name)) {
        // Далее можно сохранить название файла в БД и т.п.
        // $success = '<p style="color: green">Файл «' . $name . '» успешно загружен.</p>';
        $success = "Вы успешно зарегестрировались";
    } else {
        // $error = 'Не удалось загрузить файл.';
        $error = "Возникла ошибка при загрузке файла";
    }
} else {
    $error = "Прикрепите файл";
}
$data = array(
    'error'   => $error,
    'success' => $success,
);

header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
exit();
