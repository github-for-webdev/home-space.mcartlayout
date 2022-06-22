<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? IncludeTemplateLangFile(__FILE__); ?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">

<head>
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <? $APPLICATION->ShowHead(); ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">

    <?
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/fonts/icomoon/style.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/fonts/flaticon/font/flaticon.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/bootstrap.min.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/magnific-popup.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/jquery-ui.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/owl.carousel.min.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/owl.theme.default.min.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/bootstrap-datepicker.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/mediaelementplayer.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/animate.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/fl-bigmug-line.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/aos.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/style.css");
    ?>

</head>

<body>
<? $APPLICATION->ShowPanel(); ?>
<div class="site-loader"></div>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="border-bottom bg-white top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-6">
                    <p class="mb-0">
                        <a href="#" class="mr-3"><span class="text-black fl-bigmug-line-phone351"></span>
                            <span class="d-none d-md-inline-block ml-2">
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/include/phone.php"
                                        )
                                    ); ?>
                                </span>
                        </a>
                        <a href="#"><span class="text-black fl-bigmug-line-email64"></span>
                            <span class="d-none d-md-inline-block ml-2">
                                    <? $APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/include/email.php"
                                        )
                                    ); ?>
                                </span>
                        </a>
                    </p>
                </div>
                <div class="col-6 col-md-6 text-right">
                    <div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/social.php"
                            )
                        ); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="site-navbar">
        <div class="container py-1">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <h1 class="">
                        <a href="/" class="h5 text-uppercase text-black"><strong>
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/include/logo.php"
                                    )
                                ); ?>
                                <span class="text-danger">.</span></strong></a>
                    </h1>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "properties",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "3",
                            "MENU_CACHE_GET_VARS" => "",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "Y",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "properties"
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div>