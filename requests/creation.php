<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function switcher_en($value)
{
    $converter = array(
        'а' => 'f',    'б' => ',',    'в' => 'd',    'г' => 'u',    'д' => 'l',    'е' => 't',    'ё' => '`',
        'ж' => ';',    'з' => 'p',    'и' => 'b',    'й' => 'q',    'к' => 'r',    'л' => 'k',    'м' => 'v',
        'н' => 'y',    'о' => 'j',    'п' => 'g',    'р' => 'h',    'с' => 'c',    'т' => 'n',    'у' => 'e',
        'ф' => 'a',    'х' => '[',    'ц' => 'w',    'ч' => 'x',    'ш' => 'i',    'щ' => 'o',    'ь' => 'm',
        'ы' => 's',    'ъ' => ']',    'э' => "'",    'ю' => '.',    'я' => 'z',

        'А' => 'F',    'Б' => '<',    'В' => 'D',    'Г' => 'U',    'Д' => 'L',    'Е' => 'T',    'Ё' => '~',
        'Ж' => ':',    'З' => 'P',    'И' => 'B',    'Й' => 'Q',    'К' => 'R',    'Л' => 'K',    'М' => 'V',
        'Н' => 'Y',    'О' => 'J',    'П' => 'G',    'Р' => 'H',    'С' => 'C',    'Т' => 'N',    'У' => 'E',
        'Ф' => 'A',    'Х' => '{',    'Ц' => 'W',    'Ч' => 'X',    'Ш' => 'I',    'Щ' => 'O',    'Ь' => 'M',
        'Ы' => 'S',    'Ъ' => '}',    'Э' => '"',    'Ю' => '>',    'Я' => 'Z',

        '"' => '@',    '№' => '#',    ';' => '$',    ':' => '^',    '?' => '&',    '.' => '/',    ',' => '?',
        ' ' => '-'
    );

    $value = strtr($value, $converter);
    return $value;
}

$request_text = test_input($_POST['request_text']);
$request_text_area = test_input($_POST['request_text_area']);
$req_select = $_POST['req_select'];
if (isset($_FILES['imgFile'])) {

    $file = $_FILES['imgFile'];

    $path = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/img/';
    $name = "img.jpeg";
    // echo $path . $name;
    if (move_uploaded_file($file['tmp_name'], $path . $name)) {
        // Далее можно сохранить название файла в БД и т.п.
        // $success = '<p style="color: green">Файл «' . $name . '» успешно загружен.</p>';
        CModule::IncludeModule('iblock');  // это подключит нужный класс для работы с инфоблоком
        $el = new CIBlockElement;

        $PROP = array();

        $PROP["STRING_TEST"] = $request_text_area;  // свойству с кодом 12 присваиваем значение "Белый"
        $PROP["FILE_TEST"] = CFile::MakeFileArray($path . $name);  // свойству с кодом 12 присваиваем значение "Белый"
        $PROP["LIST_TEST"] = $req_select;  // свойству с кодом 12 присваиваем значение "Белый"

        $en_code_text = switcher_en($request_text);

        $arLoadProductArray = array(
            "CREATED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
            "IBLOCK_ID"      => 3,
            "IBLOCK_CODE" => "request_test",
            "PROPERTY_VALUES" => $PROP,
            "NAME"           => $request_text,
            "ACTIVE"         => "Y",
            "CODE" => $en_code_text
            // "PREVIEW_TEXT"   => "текст для списка элементов",
            // "DETAIL_TEXT"    => "текст для детального просмотра",
            // "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . "/image.gif")
        );

        if ($PRODUCT_ID = $el->Add($arLoadProductArray))
            echo "New ID: " . $PRODUCT_ID;
        else
            echo "Error: " . $el->LAST_ERROR;
    } else {
        echo "Не Добавлена";
    }
}
