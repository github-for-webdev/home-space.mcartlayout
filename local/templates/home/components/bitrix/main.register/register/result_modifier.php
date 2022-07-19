<?
$obEnum = new \CUserFieldEnum;
$rsEnum = $obEnum->GetList(array(), array("USER_FIELD_NAME" => "UF_STATUS"));

$enum = [];
while($arEnum = $rsEnum->Fetch())
{
 $enum[] = $arEnum["VALUE"];
}

$arResult["STATUS"] = $enum;