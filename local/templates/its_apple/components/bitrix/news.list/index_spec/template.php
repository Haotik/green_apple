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
?>
<section class="spec">
            <div class="container">
                <h2 class="spec-title">Наши врачи</h2>
                <ul class="spec_list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<li class="spec_list-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                            <div class="spec_list-item-img">
                                <img src="<?=$arItem["PREVIEW_PICTURE"]["SAFE_SRC"]?>" alt="Наши врачи">
                            </div>
                            <h3 class="spec_list-item-name"><?=$arItem["NAME"]?></h3>
                            <p class="spec_list-item-text"><?=$arItem["PROPERTIES"]["JOB"]["VALUE"]?></p>
                        </a>
                    </li>
	
<?endforeach;?>
			</ul>
		</div>
</section>