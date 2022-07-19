<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? CJSCore::Init(); ?>
<? if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']) ShowMessage($arResult['ERROR_MESSAGE']); ?>
<? if ($arResult["FORM_TYPE"] == "login") : ?>
	<form class="p-5 bg-white border" name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
		<? if ($arResult["BACKURL"] <> '') { ?><input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/><? } ?>
		<? foreach ($arResult["POST"] as $key => $value) { ?><input type="hidden" name="<?= $key ?>" value="<?= $value ?>" /><? } ?>
		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
		<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold" for="fullname"><?= GetMessage("AUTH_LOGIN") ?></label>
				<input type="text" id="fullname" class="form-control" placeholder="<?= GetMessage("AUTH_LOGIN") ?>" name="USER_LOGIN" maxlength="50" value="" size="17" />
				<script>
					BX.ready(function() {
						var loginCookie = BX.getCookie("<?= CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"]) ?>");
						if (loginCookie)
						{
							var form = document.forms["system_auth_form<?= $arResult["RND"] ?>"];
							var loginInput = form.elements["USER_LOGIN"];
							loginInput.value = loginCookie;
						}
					});
				</script>
			</div>
        </div>
		<div class="row form-group">
            <div class="col-md-12">
				<label class="font-weight-bold" for="password"><?= GetMessage("AUTH_PASSWORD") ?></label>
				<input type="password" id="password" class="form-control" placeholder="<?= GetMessage("AUTH_PASSWORD") ?>" name="USER_PASSWORD" maxlength="255" size="17" autocomplete="off" />
				<? if ($arResult["SECURE_AUTH"]) : ?>
					<span class="bx-auth-secure" id="bx_auth_secure<?= $arResult["RND"] ?>" title="<?= GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
						<div class="bx-auth-secure-icon"></div>
					</span>
					<noscript>
						<span class="bx-auth-secure" title="<?= GetMessage("AUTH_NONSECURE_NOTE") ?>">
							<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
						</span>
					</noscript>
					<script type="text/javascript">
						document.getElementById('bx_auth_secure<?= $arResult["RND"] ?>').style.display = 'inline-block';
					</script>
				<? endif; ?>
			</div>
    	</div>
		<? if ($arResult["STORE_PASSWORD"] == "Y") : ?>
			<tr>
				<td valign="top"><input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" /></td>
				<td width="100%"><label for="USER_REMEMBER_frm" title="<?= GetMessage("AUTH_REMEMBER_ME") ?>"><?= GetMessage("AUTH_REMEMBER_SHORT") ?></label></td>
			</tr>
		<? endif; ?>
		<? if ($arResult["CAPTCHA_CODE"]) : ?>
			<tr>
				<td colspan="2">
				<?= GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br />
				<input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
				<input type="text" name="captcha_word" maxlength="50" value="" /></td>
			</tr>
		<? endif ?>
		<div class="row form-group">
			<div class="col-md-12">
				<input type="submit" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>" class="btn btn-primary  py-2 px-4 rounded-0" name="Login" />
			</div>
		</div>
		<? if ($arResult["NEW_USER_REGISTRATION"] == "Y") : ?>
			<tr>
				<td colspan="2">
					<noindex>
						<a href="<?= $arResult["AUTH_REGISTER_URL"] ?>" rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a>
					</noindex><br />
				</td>
			</tr>
		<? endif ?>
		<tr>
			<td colspan="2">
				<noindex>
					<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a>
				</noindex>
			</td>
		</tr>
	</form>
<? else : ?>
	<form action="<?= $arResult["AUTH_URL"] ?>" class="d-inline">
		<? foreach ($arResult["GET"] as $key => $value) { ?>
			<input type="hidden" name="<?= $key ?>" value="<?= $value ?>" />
		<? } ?>
		<?= bitrix_sessid_post() ?>
		<input type="hidden" name="logout" value="yes" />
		<input type="submit" name="logout_butt" value="<?= GetMessage("AUTH_LOGOUT_BUTTON") ?>" class="btn btn-primary  py-2 px-4 rounded-0" />
	</form>
<? endif; ?>