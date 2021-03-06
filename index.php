<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("HomeSpace — Colorlib Website Template"); ?>
<? $GLOBALS["arFilter"] = array(
    "IBLOCK_ID" => 5,
    "ACTIVE" => "Y",
    "PROPERTY_PRIORITY_DEAL_VALUE" => "Y",
); ?>
<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "slider_top",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "/ads/#ELEMENT_CODE#.html",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            "NAME",
            "PREVIEW_PICTURE"
        ),
        "FILTER_NAME" => "arFilter",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "5",
        "IBLOCK_TYPE" => "ads",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "20",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            "PRIORITY_DEAL",
            "LOCATION",
            "PRICE"
        ),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N"
    )
); ?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/property_left.php"
                    )
                ); ?>
            </div>
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/property_middle.php"
                    )
                ); ?>
            </div>
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/property_right.php"
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>
<div class="site-section site-section-sm bg-light">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.line",
            "new_properties",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "DETAIL_URL" => "/ads/#ELEMENT_CODE#.html",
                "FIELD_CODE" => array(
                    "NAME",
                    "PREVIEW_PICTURE",
                    "PROPERTY_PRICE",
                    "PROPERTY_LOCATION",
                    "PROPERTY_TOTAL_AREA",
                    "PROPERTY_NUM_BEDS",
                    "PROPERTY_NUM_BATHROOMS",
                    "PROPERTY_NUM_GARAGES",
                ),
                "IBLOCKS" => array("5"),
                "IBLOCK_TYPE" => "ads",
                "NEWS_COUNT" => "9",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC"
            )
        ); ?>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.line",
            "our_services",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "300",
                "CACHE_TYPE" => "A",
                "DETAIL_URL" => "",
                "FIELD_CODE" => array(
                    "NAME",
                    "PROPERTY_CLASS_FLATICON"
                ),
                "IBLOCKS" => array("7"),
                "IBLOCK_TYPE" => "services",
                "NEWS_COUNT" => "20",
                "SORT_BY1" => "ID",
                "SORT_BY2" => "",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => ""
            )
        ); ?>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.line",
            "our_blog",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "300",
                "CACHE_TYPE" => "A",
                "DETAIL_URL" => "/about/news/#ELEMENT_CODE#.html",
                "FIELD_CODE" => array(
                    "NAME",
                    "PREVIEW_TEXT",
                    "PREVIEW_PICTURE",
                    "DATE_CREATE",
                ),
                "IBLOCKS" => array("1"),
                "IBLOCK_TYPE" => "news",
                "NEWS_COUNT" => "3",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC"
            )
        ); ?>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.line",
            "slider_agents",
            array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "300",
                "CACHE_TYPE" => "A",
                "DETAIL_URL" => "",
                "FIELD_CODE" => array(
                    0 => "ID",
                    1 => "CODE",
                    2 => "NAME",
                    3 => "PREVIEW_TEXT",
                    4 => "PREVIEW_PICTURE",
                    5 => "DETAIL_TEXT"
            ),
            "IBLOCKS" => array(
                0 => "6",
            ),
            "IBLOCK_TYPE" => "agents",
            "NEWS_COUNT" => "20",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "",
            "COMPONENT_TEMPLATE" => "slider_agents"
            ),
            false
        ); ?>
    </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>