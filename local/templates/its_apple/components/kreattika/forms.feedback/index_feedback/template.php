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
<?if(!empty($arResult["ERROR_MESSAGE"])):
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
endif;

if(strlen($arResult["OK_MESSAGE"]) > 0):
	?><div class="kff-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
else:
?>
        <section class="main_form">
            <div class="container">
<form action="<?=$APPLICATION->GetCurPage()?>" method="POST">
<?=bitrix_sessid_post()?>
<div>
        <h2 class="main_form-title">Закажите консультацию</h2>
        <h3 class="main_form-subtitle">Оставьте свои контакты и наш сотрудник свяжется с вами в ближайшее время.</h3>

		<input type="text" name="f_name" class="main_form-name" value="<?=$arResult["NAME"]?>"<?if($arParams["CHECK_FIELD_NAME"]=="Y"):?> required="required"<?endif?>>
		<input type="text" name="f_phone" class="main_form-phone" value="<?=$arResult["PHONE"]?>"<?if($arParams["CHECK_FIELD_PHONE"]=="Y"):?> required="required"<?endif?>>
		<div class="main_form-agree">
            <input name="agree" id="main-form-agree"  type="checkbox" required checked>
            <label for="main-form-agree">Согласен(-на) на обработку персональных данных<span>*</span></label>
        </div>
        <div class="main_form-confirm">
            <input name="confirm" id="main-form-confirm" type="checkbox" required checked>
            <label for="main-form-confirm">Ознакомлен(-а) с <a href="#">Политикой конфеденциальности пользователя</a><span>*</span></label>
        </div>
		<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
		<input type="submit" class="main_form-submit" name="submit" value="<?=$arParams["SUBMIT_TITLE"]?>">
</form>
</div>
</section>
<?endif;?>