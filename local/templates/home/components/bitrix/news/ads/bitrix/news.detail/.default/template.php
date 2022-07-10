<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="site-blocks-cover overlay" style="background-image: url(<?= $arResult["DETAIL_PICTURE"]["SRC"]; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?= GetMessage("PROPERTY_DETAILS"); ?></span>
                <h1 class="mb-2"><?= $arResult["NAME"] ?></h1>
                <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?= number_format($arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]); ?></strong></p>
            </div>
        </div>
    </div>
</div>
<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" style="margin-top: -150px;">
                <div class="mb-5">
                    <div class="slide-one-item home-slider owl-carousel">
                        <? if (!$arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"]["ID"]) : ?>
                            <div>
                                <img
                                        src="<?= $arResult["PREVIEW_PICTURE"]["SRC"]; ?>"
                                        alt="<?= $arResult["PREVIEW_PICTURE"]["ALT"]; ?>"
                                        class="img-fluid"
                                >
                            </div>
                        <? endif; ?>
                        <? if ($arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"]["ID"]) : ?>
                            <div>
                                <img
                                    src="<?= $arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"]["SRC"]; ?>"
                                    alt="<?= $arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"]["ORIGINAL_NAME"]; ?>"
                                    class="img-fluid"
                                >
                            </div>
                        <? elseif ($arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"][0]) : ?>
                            <? for ($i = 0; $i < count($arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"]); $i++) : ?>
                                <div>
                                    <img
                                        src="<?=$arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"][$i]["SRC"]?>"
                                        alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"][$i]["ORIGINAL_NAME"]?>"
                                        class="img-fluid">
                                </div>
                            <? endfor; ?>
                        <? endif; ?>
                    </div>
                </div>
                <div class="bg-white">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <strong class="text-success h1 mb-3">$<?= number_format($arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]); ?></strong>
                        </div>
                        <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                <li>
                                    <span class="property-specs"><?= GetMessage("BEDS"); ?></span>
                                    <span class="property-specs-number"><?= $arResult["DISPLAY_PROPERTIES"]["NUM_BEDS"]["VALUE"]; ?><sup>+</sup></span>
                                </li>
                                <li>
                                    <span class="property-specs"><?= GetMessage("BATHS"); ?></span>
                                    <span class="property-specs-number"><?= $arResult["DISPLAY_PROPERTIES"]["NUM_BATHROOMS"]["VALUE"]; ?></span>
                                </li>
                                <li>
                                    <span class="property-specs"><?= GetMessage("SQ_FT"); ?></span>
                                    <span class="property-specs-number"><?= $arResult["DISPLAY_PROPERTIES"]["SQ_FT"]["VALUE"]; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text"><?= GetMessage("HOME_TYPE"); ?></span>
                            <strong class="d-block"><?= $arResult["DISPLAY_PROPERTIES"]["HOME_TYPE"]["VALUE"]; ?></strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text"><?= GetMessage("YEAR_BUILT"); ?></span>
                            <strong class="d-block"><?= $arResult["DISPLAY_PROPERTIES"]["YEAR_BUILT"]["VALUE"]; ?></strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text"><?= GetMessage("PRICE"); ?>/<?= GetMessage("SQ_FT"); ?></span>
                            <strong class="d-block">$<?= number_format($arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"] / $arResult["DISPLAY_PROPERTIES"]["SQ_FT"]["VALUE"], 2); ?></strong>
                        </div>
                    </div>
                    <h2 class="h4 text-black"><?= GetMessage("MORE_INFO"); ?></h2>
                    <p><?= $arResult["DETAIL_TEXT"]; ?></p>
                    <div class="row mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3"><?= GetMessage("PROPERTY_GALLERY"); ?></h2>
                        </div>
                            <? if ($arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"]["ID"]) : ?>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <a href="<?= $arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"]["SRC"]; ?>" class="image-popup gal-item">
                                        <img
                                            src="<?= $arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"]["SRC"]; ?>"
                                            alt="<?= $arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"]["ORIGINAL_NAME"]; ?>"
                                            class="img-fluid"
                                        >
                                    </a>
                                </div>
                            <? elseif ($arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"][0]) : ?>
                                <? for ($i = 0; $i < count($arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"]); $i++) : ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                        <a href="<?= $arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"][$i]["SRC"]; ?>" class="image-popup gal-item">
                                            <img
                                                src="<?= $arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"][$i]["SRC"]; ?>"
                                                alt="<?= $arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"][$i]["ORIGINAL_NAME"]; ?>"
                                                class="img-fluid"
                                            >
                                        </a>
                                    </div>
                                <? endfor; ?>
                            <? else : ?>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-4"><?= GetMessage("NO_IMAGES"); ?></div>
                            <? endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pl-md-5">
                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3"><?= GetMessage("CONTACT_AGENT"); ?></h3>
                    <form action="" class="form-contact-agent">
                        <div class="form-group">
                            <label for="name"><?= GetMessage("NAME"); ?></label>
                            <input type="text" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email"><?= GetMessage("EMAIL"); ?></label>
                            <input type="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone"><?= GetMessage("PHONE"); ?></label>
                            <input type="text" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="phone" class="btn btn-primary" value="<?= GetMessage("SEND_MESSAGE"); ?>">
                        </div>
                    </form>
                </div>
                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3"><?= GetMessage("PARAGRAPH"); ?></h3>
                    <p><?= $arResult["PREVIEW_TEXT"]; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
