<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<? ShowMessage($arParams["~AUTH_RESULT"]); ?>
<div class="site-section">
    <div class="container">
        <div class="row">       
        	<div class="col-md-12 col-lg-8 mb-5">
				<form action="<?= $arResult["AUTH_URL"] ?>" method="post" target="_top" class="p-5 bg-white border" name="bform">
					<? if ($arResult["BACKURL"] <> '') { ?><input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>" /><? } ?>
					<input type="hidden" name="AUTH_FORM" value="Y">
					<input type="hidden" name="TYPE" value="SEND_PWD">
					<p><?= GetMessage("sys_forgot_pass_label") ?></p>
					<div style="margin-top: 16px">
						<div><b><?= GetMessage("sys_forgot_pass_login1") ?></b></div>
						<div>
							<input type="text" class="form-control" value="<?= $arResult["USER_LOGIN"] ?>" name="USER_LOGIN" />
							<input type="hidden" name="USER_EMAIL" />
						</div>
						<div><?= GetMessage("sys_forgot_pass_note_email") ?></div>
					</div>
					<? if ($arResult["PHONE_REGISTRATION"]) : ?>
						<div style="margin-top: 16px">
							<div><b><?= GetMessage("sys_forgot_pass_phone") ?></b></div>
							<div><input type="text" class="form-control" value="<?= $arResult["USER_PHONE_NUMBER"] ?>" name="USER_PHONE_NUMBER" /></div>
							<div><?= GetMessage("sys_forgot_pass_note_phone") ?></div>
						</div>
					<? endif; ?>
					<? if ($arResult["USE_CAPTCHA"]) : ?>
						<div style="margin-top: 16px">
							<div>
								<input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>" />
								<img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA" />
							</div>
							<div><?= GetMessage("system_auth_captcha") ?></div>
							<div><input type="text" name="captcha_word" maxlength="50" value="" /></div>
						</div>
					<? endif; ?>
					<div style="margin-top: 20px">
						<input type="submit" class="btn btn-primary py-2 px-4 rounded-0" value="<?= GetMessage("AUTH_SEND") ?>" name="send_account_info" />
					</div>
					<div style="margin-top: 16px">
						<p><a href="<?= $arResult["AUTH_AUTH_URL"] ?>"><b><?= GetMessage("AUTH_AUTH") ?></b></a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
	document.bform.USER_LOGIN.focus();
</script>