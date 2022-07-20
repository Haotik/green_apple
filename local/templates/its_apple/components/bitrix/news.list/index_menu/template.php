<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$sections = getSections($arResult["ITEMS"]);

?>
<section class="services">
    <div class="container">
        <h2 class="services-title">Услуги</h2>
        <ul class="services_list">
<?foreach($sections as $arItem){?>
	<li class="services_list-item green">
                        <a href="<?=$arItem["LINK"]?>">
                            <img src="<?=$arItem["img"]?>" alt="">
                            <h3 class="services_list-item-title"><?=$arItem["NAME"]?></h3>
                            <p class="services_list-item-text"><?=$arItem["DETAIL_TEXT"]?></p>
                        </a>
                    </li>
<?}?>
 		</ul>
    </div>
</section>