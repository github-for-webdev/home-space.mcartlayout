<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>
<? $APPLICATION->SetTitle("Регистрация"); ?>
<? $APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"register",
	Array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array(),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array(
			"NAME",
			"LAST_NAME"
		),
		"SUCCESS_PAGE" => "",
		"USER_PROPERTY" => array(),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y"
	)
); ?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>