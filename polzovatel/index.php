<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Пользователь");
?><? $APPLICATION->IncludeComponent(
		"bitrix:main.profile",
		"",
		array()
	); ?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>