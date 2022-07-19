<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? ShowMessage($arParams["~AUTH_RESULT"]); ?>
<? ShowMessage($arResult['ERROR_MESSAGE']); ?>

<div class="site-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8 mb-5">
				<form action="<?= $arResult["AUTH_URL"] ?>" method="post" class="p-5 bg-white border" target="_top" name="form_auth">
					<input type="hidden" name="AUTH_FORM" value="Y" />
					<input type="hidden" name="TYPE" value="AUTH" />
					<? if ($arResult["BACKURL"] <> '') { ?><input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>" /><? } ?>
					<? foreach ($arResult["POST"] as $key => $value) { ?><input type="hidden" name="<?= $key ?>" value="<?= $value ?>" /><? } ?>
					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="fullname"><?= GetMessage("AUTH_LOGIN") ?></label>
							<input type="text" id="fullname" class="form-control" value="<?= $arResult["LAST_LOGIN"] ?>" placeholder="<?= GetMessage("AUTH_LOGIN") ?>" maxlength="255" name="USER_LOGIN" />
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for="password"><?= GetMessage("AUTH_PASSWORD") ?></label>
							<input type="password" id="password" class="form-control" placeholder="<?= GetMessage("AUTH_PASSWORD") ?>" maxlength="255" name="USER_PASSWORD" autocomplete="off" />
						</div>
					</div>
					<? if ($arResult["SECURE_AUTH"]) : ?>
						<span class="bx-auth-secure" id="bx_auth_secure" title="<?= GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
							<div class="bx-auth-secure-icon"></div>
						</span>
						<noscript>
							<span class="bx-auth-secure" title="<?= GetMessage("AUTH_NONSECURE_NOTE") ?>">
								<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
							</span>
						</noscript>
						<script type="text/javascript">
							document.getElementById('bx_auth_secure').style.display = 'inline-block';
						</script>
					<? endif; ?>
					<? if ($arResult["CAPTCHA_CODE"]) : ?>
						<tr>
							<td></td>
							<td><input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>" />
							<img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA" /></td>
						</tr>
						<tr>
							<td class="bx-auth-label"><?= GetMessage("AUTH_CAPTCHA_PROMT") ?>:</td>
							<td><input class="bx-auth-input form-control" type="text" name="captcha_word" maxlength="50" value="" size="15" autocomplete="off" /></td>
						</tr>
					<? endif; ?>
					<? if ($arResult["STORE_PASSWORD"] == "Y") : ?>
						<tr>
							<td></td>
							<td><input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" /><label for="USER_REMEMBER">&nbsp;<?= GetMessage("AUTH_REMEMBER_ME") ?></label></td>
						</tr>
					<? endif; ?>
					<div class="row form-group">
                		<div class="col-md-12 mb-3 mb-md-0">
							<p class="authorize-submit-cell"><input type="submit" class="btn btn-primary" name="Login" value="<?= GetMessage("AUTH_AUTHORIZE") ?>" /></p>
						</div>
					</div>
					<? if ($arParams["NOT_SHOW_LINKS"] != "Y") : ?>
							<noindex>
								<p>
									<a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>" rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a>
								</p>
							</noindex>
					<? endif; ?>
					<? if ($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y" && $arParams["AUTHORIZE_REGISTRATION"] != "Y") : ?>
							<noindex>
								<p>
									<a href="<?= $arResult["AUTH_REGISTER_URL"] ?>" rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a><br />
									<?= GetMessage("AUTH_FIRST_ONE") ?>
								</p>
							</noindex>
					<? endif ?>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	<? if ($arResult["LAST_LOGIN"] <> '') { ?>
		try {
			document.form_auth.USER_PASSWORD.focus();
		}
		catch(e) {}
	<? } else { ?>
		try {
			document.form_auth.USER_LOGIN.focus();
		}
		catch(e) {}
	<? } ?>
</script>


