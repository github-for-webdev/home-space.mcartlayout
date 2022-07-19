<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
if (!$arResult["NavShowAlways"]) { if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false)) return; }
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<div style="display: flex; justify-content: center; text-align: center;">
    <div class="site-pagination">
        <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]) { ?>
            <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) { ?>
                <a href="<?= $arResult["sUrlPath"] ?><?= $navQueryStringFull ?>" class="active"><?= $arResult["nStartPage"]; ?></a>
            <? } elseif ((1 == $arResult["nStartPage"]) && (false == $arResult["bSavePage"])) { ?>
                <a href="<?= $arResult["sUrlPath"] ?><?= $navQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
            <? } else { ?>
                <a href="<?= $arResult["sUrlPath"] ?>?<?= $navQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
            <? } ?>
            <? $arResult["nStartPage"]++ ?>
        <? } ?>
    </div>
</div>