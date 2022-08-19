<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

?>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("create_request");
?>



<div>
    <form>
        <div class="mb-3 row">
            <label for="request_text" class="col-xs-4 col-form-label">Название статьи</label>
            <input type="text" class="form-control" name="request_text" id="request_text" placeholder="Название статьи">
        </div>
        <div class="mb-3 row">
            <label for="request_text_area" class="col-xs-4 col-form-label">Текст статьи</label>
            <input type="text" class="form-control" name="request_text_area" id="request_text_area" placeholder="Текст статьи">
        </div>
        <div class="mb-3">
            <label for="imgFile" class="form-label">Картинка для статьи</label>
            <input type="file" class="form-control" name="imgFile" id="imgFile" placeholder="" aria-describedby="fileHelpId">
        </div>
        <div class="mb-3">
            <label for="req_select" class="form-label">Выбор темы статьи</label>
            <select class="form-control" name="req_select" id="req_select">
                <option value="2">заявка на зарплату</option>
                <option value="3">завка на отпуск</option>
                <option value="4">заявка на работу</option>
            </select>
        </div>
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" class="btn btn-primary" id="req_send_butt">Отправить</button>
            </div>
        </div>
    </form>
</div>
<?

?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>