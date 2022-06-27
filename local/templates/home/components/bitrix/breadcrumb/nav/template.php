<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
if (empty($arResult)) return "";
$itemSize = count($arResult);
$strReturn = '
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(' . SITE_TEMPLATE_PATH . '/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2">' . $APPLICATION->GetTitle() . '</h1>
                        <div><a href="' . SITE_DIR . '">' . $arResult[0]["TITLE"] . '</a>
';
for ($index = 1; $index < $itemSize; $index++)
{
    if ($arResult[$index]["LINK"] == $arResult[$index - 1]["LINK"]) continue;
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1)
    {
        $strReturn .= '
            <span class="mx-2 text-white">&bullet;</span>
            <a href="' . $arResult[$index]["LINK"] . '"<strong class="text-white">' . $title . '</strong></a>
        ';
    }
    else
    {
        $strReturn .= '
            <span class="mx-2 text-white">&bullet;</span>
            <strong class="text-white">' . $title . '</strong>
        ';
    }
}
$strReturn .= '</div></div></div></div></div>';
return $strReturn;