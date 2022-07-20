<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
* Bitrix vars
*
* @var array $arParams
* @var array $arResult
* @var CBitrixComponentTemplate $this
* @global CMain $APPLICATION
* @global CUser $USER
*/
?>
<section class="main_form">
	<div class="container">
		<?if(!empty($arResult["ERROR_MESSAGE"]))
		{
		foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
		}
		if($arResult["OK_MESSAGE"] <> '')
		{
		?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
		}
		?>
		<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
			<div>
				<h2 class="main_form-title">Закажите консультацию</h2>
				<h3 class="main_form-subtitle">Оставьте свои контакты и наш сотрудник свяжется с вами в ближайшее время.</h3>
				<?=bitrix_sessid_post()?>
				<div class="mf-name">
					<div class="mf-text">
						<?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
					</div>
					<input type="text" class="main_form-name" name="user_name" placeholder="ФИО" value="<?=$arResult["AUTHOR_NAME"]?>">
				</div>
				<div class="mf-email">
					<div class="mf-text">
						<?=GetMessage("MFT_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
					</div>
					<input type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>">
				</div>
				<div class="mf-message">
					<div class="mf-text">
						<?=GetMessage("MFT_MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
					</div>
					<textarea name="MESSAGE" rows="5" cols="40"><?=$arResult["MESSAGE"]?></textarea>
				</div>
				<?if($arParams["USE_CAPTCHA"] == "Y"):?>
				<div class="mf-captcha">
					<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
					<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
					<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
					<input type="text" name="captcha_word" size="30" maxlength="50" value="">
				</div>
				<?endif;?>
				<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
				<div class="main_form-agree">
                    <input name="agree" id="main-form-agree"  type="checkbox" required checked>
                    <label for="main-form-agree">Согласен(-на) на обработку персональных данных<span>*</span></label>
               </div>
                <div class="main_form-confirm">
                    <input name="confirm" id="main-form-confirm" type="checkbox" required checked>
                    <label for="main-form-confirm">Ознакомлен(-а) с <a href="#">Политикой конфеденциальности пользователя</a><span>*</span></label>
                </div>
				<input type="submit" name="submit" class="main_form-submit" value="<?=GetMessage("MFT_SUBMIT")?>">
			</div>
		</form>
	</div>
</section>