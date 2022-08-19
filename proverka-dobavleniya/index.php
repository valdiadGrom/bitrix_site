<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Страница2");
?>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
?>


&nbsp;<? $APPLICATION->IncludeComponent(
            "bitrix:main.register",
            "test_register",
            array(
                "AUTH" => "N",    // Автоматически авторизовать пользователей
                "REQUIRED_FIELDS" => array(    // Поля, обязательные для заполнения
                    0 => "EMAIL",
                    1 => "NAME",
                    2 => "PERSONAL_PHOTO",
                ),
                "SET_TITLE" => "N",    // Устанавливать заголовок страницы
                "SHOW_FIELDS" => array(    // Поля, которые показывать в форме
                    0 => "EMAIL",
                    1 => "NAME",
                    2 => "PERSONAL_PHOTO",
                ),
                "SUCCESS_PAGE" => "/",    // Страница окончания регистрации
                "USER_PROPERTY" => "",    // Показывать доп. свойства
                "USER_PROPERTY_NAME" => "",    // Название блока пользовательских свойств
                "USE_BACKURL" => "N",    // Отправлять пользователя по обратной ссылке, если она есть
            ),
            false
        ); ?>

<? echo CFile::GetPath($USER->GetParam("PERSONAL_PHOTO")); ?>

<?

global $USER;
if ($USER->IsAuthorized()) {

    $userID = $USER->GetID();
    $photoID = CUser::GetByID($userID)->Fetch()['PERSONAL_PHOTO'];
    $photoPath = CFile::GetPath($photoID);
    if (isset($photoPath)) {

        echo "<img src='" . $photoPath . "'  alt='Картинка'>";
    } else {
        echo "нет картинки в профиле";
    }

    $logFile = 'logs.txt';
    $logData = "Вход пользователя " . $userName = $USER->GetFullName() . "(" . $userEmail = $USER->GetEmail() . ") в " . date("H:i:s") . ". Дата: " . date("m.d.y");

    file_put_contents($logFile, PHP_EOL . $logData, FILE_APPEND | LOCK_EX);
}

?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>