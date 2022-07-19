<?

/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */




if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

if ($arResult["SHOW_SMS_FIELD"] == true) {
	CJSCore::Init('phone_auth');
}
?>


<div class="site-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8 mb-5">
				<? if ($USER->IsAuthorized()) : ?>
					<p><? echo GetMessage("MAIN_REGISTER_AUTH") ?></p>
				<? else : ?>
					<?
					if (count($arResult["ERRORS"]) > 0) :
						foreach ($arResult["ERRORS"] as $key => $error)
							if (intval($key) == 0 && $key !== 0)
								$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;" . GetMessage("REGISTER_FIELD_" . $key) . "&quot;", $error);
						ShowError(implode("<br />", $arResult["ERRORS"]));
					elseif ($arResult["USE_EMAIL_CONFIRMATION"] === "Y") :
					?>
						<p><? echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT") ?></p>
					<? endif ?>
					<? if ($arResult["SHOW_SMS_FIELD"] == true) : ?>

						<form class="p-5 bg-white border" method="post" action="<?= POST_FORM_ACTION_URI ?>" name="regform">
							<? if ($arResult["BACKURL"] <> '') : ?><input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>" />
							<? endif; ?>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<input type="hidden" name="SIGNED_DATA" value="<?= htmlspecialcharsbx($arResult["SIGNED_DATA"]) ?>" />
									<label class="font-weight-bold" for="sms"><? echo GetMessage("main_register_sms") ?>*</label>
									<input name="SMS_CODE" type="text" value="<?= htmlspecialcharsbx($arResult["SMS_CODE"]) ?>" id="sms" class="form-control" placeholder="Full Name">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<input class="btn btn-primary  py-2 px-4 rounded-0" type="submit" name="code_submit_button" value="<? echo GetMessage("main_register_sms_send") ?>" />
								</div>
							</div>
						</form>

						<script>
							new BX.PhoneAuth({
								containerId: 'bx_register_resend',
								errorContainerId: 'bx_register_error',
								interval: <?= $arResult["PHONE_CODE_RESEND_INTERVAL"] ?>,
								data: <?= CUtil::PhpToJSObject([
											'signedData' => $arResult["SIGNED_DATA"],
										]) ?>,
								onError: function(response) {
									var errorDiv = BX('bx_register_error');
									var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
									errorNode.innerHTML = '';
									for (var i = 0; i < response.errors.length; i++) {
										errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
									}
									errorDiv.style.display = '';
								}
							});
						</script>
						<div id="bx_register_error" style="display:none"><? ShowError("error") ?></div>
						<div id="bx_register_resend"></div>
					<? else : ?>

						<form class="p-5 bg-white border" method="post" action="<?= POST_FORM_ACTION_URI ?>" name="regform" enctype="multipart/form-data">
							<?
							if ($arResult["BACKURL"] <> '') :
							?>
								<input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>" />
							<?
							endif;
							?>
							<div colspan="2"><b><?= GetMessage("AUTH_REGISTER") ?></b></div>
							<? foreach ($arResult["SHOW_FIELDS"] as $FIELD) : ?>

								<? if ($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"] == true) : ?>
									<div class="row form-group">
										<div class="col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold" for="auto_timezone"><? echo GetMessage("main_profile_time_zones_auto") ?><? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y") : ?><span class="starrequired">*</span><? endif ?></label>
											<select name="REGISTER[AUTO_TIME_ZONE]" id="auto_timezone" onchange="this.form.elements['REGISTER[TIME_ZONE]'].disabled=(this.value != 'N')">
												<option value=""><? echo GetMessage("main_profile_time_zones_auto_def") ?></option>
												<option value="Y" <?= $arResult["VALUES"][$FIELD] == "Y" ? " selected=\"selected\"" : "" ?>><? echo GetMessage("main_profile_time_zones_auto_yes") ?></option>
												<option value="N" <?= $arResult["VALUES"][$FIELD] == "N" ? " selected=\"selected\"" : "" ?>><? echo GetMessage("main_profile_time_zones_auto_no") ?></option>
											</select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold" for="timezone"><? echo GetMessage("main_profile_time_zones_zones") ?></label>
											<select id="timezone" name="REGISTER[TIME_ZONE]" <? if (!isset($_REQUEST["REGISTER"]["TIME_ZONE"])) echo 'disabled="disabled"' ?>>
												<? foreach ($arResult["TIME_ZONE_LIST"] as $tz => $tz_name) : ?>
													<option value="<?= htmlspecialcharsbx($tz) ?>" <?= $arResult["VALUES"]["TIME_ZONE"] == $tz ? " selected=\"selected\"" : "" ?>><?= htmlspecialcharsbx($tz_name) ?></option>
												<? endforeach ?>
											</select>
										</div>
									</div>
								<? else : ?>
									<div class="row form-group">
										<div class="col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold" for="<?= $FIELD ?>"><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>:<? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y") : ?><span class="starrequired">*</span><? endif ?></label>
											<?
											switch ($FIELD) {
												case "NAME":
											?>
													<input type="text" name="REGISTER[<?= $FIELD ?>]" id="<?= $FIELD ?>" class="form-control" value="<?= $arResult["VALUES"][$FIELD] ?>">
												<? break;
												case "LAST_NAME":
												?>
													<input type="text" name="REGISTER[<?= $FIELD ?>]" id="<?= $FIELD ?>" class="form-control" value="<?= $arResult["VALUES"][$FIELD] ?>">
												<? break;
												case "LOGIN":
												?>
													<input type="text" name="REGISTER[<?= $FIELD ?>]" id="<?= $FIELD ?>" class="form-control" value="<?= $arResult["VALUES"][$FIELD] ?>">
												<? break;

												case "EMAIL":
												?>
													<input type="text" name="REGISTER[<?= $FIELD ?>]" id="<?= $FIELD ?>" class="form-control" value="<?= $arResult["VALUES"][$FIELD] ?>">
												<? break;
												case "PASSWORD":
												?>
													<input type="password" name="REGISTER[<?= $FIELD ?>]" id="<?= $FIELD ?>" class="form-control" value="<?= $arResult["VALUES"][$FIELD] ?>">
													<? if ($arResult["SECURE_AUTH"]) : ?>
														<span class="bx-auth-secure" id="bx_auth_secure" title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
															<div class="bx-auth-secure-icon"></div>
														</span>
														<noscript>
															<span class="bx-auth-secure" title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
																<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
															</span>
														</noscript>
														<script type="text/javascript">
															document.getElementById('bx_auth_secure').style.display = 'inline-block';
														</script>
													<? endif ?>
												<?
													break;
												case "CONFIRM_PASSWORD":
												?>
													<input type="password" name="REGISTER[<?= $FIELD ?>]" id="<?= $FIELD ?>" class="form-control" value="<?= $arResult["VALUES"][$FIELD] ?>">
												<?
													break;

												case "PERSONAL_GENDER":
												?><select name="REGISTER[<?= $FIELD ?>]">
														<option value=""><?= GetMessage("USER_DONT_KNOW") ?></option>
														<option value="M" <?= $arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : "" ?>><?= GetMessage("USER_MALE") ?></option>
														<option value="F" <?= $arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : "" ?>><?= GetMessage("USER_FEMALE") ?></option>
													</select><?
													break;

												case "PERSONAL_COUNTRY":
												case "WORK_COUNTRY":
													?><select name="REGISTER[<?= $FIELD ?>]"><?
														foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value) {
														?><option value="<?= $value ?>" <? if ($value == $arResult["VALUES"][$FIELD]) : ?> selected="selected" <? endif ?>><?= $arResult["COUNTRIES"]["reference"][$key] ?></option><? } ?></select><?
													break;

												case "PERSONAL_PHOTO":
												case "WORK_LOGO":
													?><input class="font-weight-bold" size="30" type="file" name="REGISTER_FILES_<?= $FIELD ?>" /><?
															break;

												case "PERSONAL_NOTES":
												case "WORK_NOTES":
													?><textarea cols="30" rows="5" name="REGISTER[<?= $FIELD ?>]"><?= $arResult["VALUES"][$FIELD] ?></textarea><?
													break;
												default:
													if ($FIELD == "PERSONAL_BIRTHDAY") : ?><small><?= $arResult["DATE_FORMAT"] ?></small><br /><? endif;
												?><input class="font-weight-bold" size="30" type="text" name="REGISTER[<?= $FIELD ?>]" value="<?= $arResult["VALUES"][$FIELD] ?>" /><?
													if ($FIELD == "PERSONAL_BIRTHDAY")
														$APPLICATION->IncludeComponent(
															'bitrix:main.calendar',
															'',
															array(
																'SHOW_INPUT' => 'N',
																'FORM_NAME' => 'regform',
																'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
																'SHOW_TIME' => 'N'
															),
															null,
															array("HIDE_ICONS" => "Y")
														);
											} ?>
										</div>
									</div>
								<? endif ?>



							<? endforeach ?>
							<? // ********************* User properties ***************************************************
							?>
							<? if ($arResult["USER_PROPERTIES"]["SHOW"] == "Y") : ?>
								<div class="row form-group">
									<div class="col-md-12 mb-3 mb-md-0">
										<? foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField) : ?>
											<label class="font-weight-bold"><?= $arUserField["EDIT_FORM_LABEL"] ?>:<? if ($arUserField["MANDATORY"] == "Y") : ?><span class="starrequired">*</span><? endif; ?></label>
											<? $APPLICATION->IncludeComponent(
												"bitrix:system.field.edit",
												$arUserField["USER_TYPE"]["USER_TYPE_ID"],
												array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"),
												null,
												array("HIDE_ICONS" => "Y")
											); ?>
										<? endforeach; ?>
									</div>
								</div>
							<? endif; ?>
							<? // ******************** /User properties ***************************************************
							?>


							<? if ($arResult["USE_CAPTCHA"] == "Y") { ?>
								<div class="row form-group">
									<div class="col-md-12 mb-3 mb-md-0">
										<div><b><?= GetMessage("REGISTER_CAPTCHA_TITLE") ?></b></div>
										<div>
											<input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>" />
											<img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA" />
										</div>
										<label class="font-weight-bold" for="capcha"><?= GetMessage("REGISTER_CAPTCHA_PROMT") ?>:<span class="starrequired">*</span></label>
										<input class="form-control" type="text" id="capcha" name="captcha_word" maxlength="50" value="" autocomplete="off" />
									</div>
								</div>
							<? } ?>


							<div class="row form-group">
								<div class="col-md-12">
									<input class="btn btn-primary  py-2 px-4 rounded-0" type="submit" name="register_submit_button" value="<?= GetMessage("AUTH_REGISTER") ?>" />
								</div>
							</div>
						</form>

						<p><? echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?></p>

					<? endif ?>

					<p><span class="starrequired">*</span><?= GetMessage("AUTH_REQ") ?></p>
					<p><a href="/login/">Авторизация</a></p>

				<? endif ?>
			</div>
		</div>
	</div>
</div>