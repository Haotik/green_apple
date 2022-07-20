<?php
function debug($data){
	echo "<pre>".print_r($data,1)."</pre>";
}

function getBlocks(){

		$fSections = CIBlockSection::GetList(
	    false,
	    Array("IBLOCK_ID" => 5, "ID" => getIdbyCode()),
	    false,
	    Array("UF_BLOCKS","UF_TITLE","UF_BANNER_TEXT","UF_BANNER_IMG"),
	    false
	);
	$flSections = $fSections->Fetch();
	$sections = $flSections["UF_BLOCKS"];

	foreach ($sections as $section) {
		$rsRes= CUserFieldEnum::GetList(array(), array(
	                    "ID" => $section
	                ));
	                if($arGender = $rsRes->GetNext())
	                   $result["sections"][] = $arGender;
	}
	$result["title"] = $flSections['UF_TITLE'];
	$result["banner_text"] = $flSections['UF_BANNER_TEXT'];
	$result["banner_img"] = CFile::GetPath($flSections['UF_BANNER_IMG']);
	return $result;
}

function getSubBlocks(){

	if (isset($_REQUEST['ELEMENT_CODE'])) {
		$section = getIdbyCode();
		$iterator = CIBlockElement::GetPropertyValues(5, array('ACTIVE' => 'Y'), true);
		while ($row = $iterator->Fetch())
		{
		  if ($row["IBLOCK_ELEMENT_ID"] == $section) {
		    $PROPS["sections"][] = $row[138];
		    $sections['title'] = $row[161];
		    $sections['banner_text'] = $row[160];
		    $sections['banner_img'] = CFile::GetPath($row[159]);
		  }
		}

		foreach ($PROPS["sections"] as $key => $value) {
			if (empty($value)) continue;
				$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>25, "ACTIVE"=>"Y","CODE"=>"SECTIONS", "ID"=>$value));
					while($enum_fields = $property_enums->GetNext()){
					  $sections["sections"][] = $enum_fields["VALUE"];
					}
		}
	}
	return $sections;
}
function getSubBlocks2($array){

	if (isset($_REQUEST['ELEMENT_CODE'])) {
		$section = getIdbyCode();
		$iterator = CIBlockElement::GetPropertyValues(5, array('ACTIVE' => 'Y'), true);
		//$iterator = CIBlockElement::GetProperty(25,$section, array("sort" => "asc"), array());
		while ($row = $iterator->GetNext())
		{
		  if ($row["IBLOCK_ELEMENT_ID"] == $section) {
		    $PROPS["sections"][] = $row[177];
		    $sections['title'] = $row['~161'];
		    $sections['banner_text'] = $row['~160'];
		    $sections['banner_img'] = CFile::GetPath($row[159]);
		  }
		}

		foreach ($PROPS['sections'] as $value) {
			foreach ($value as $section) {
				$sections["sections"][] = $array[$section]["UF_LINK"];
			}
		}
	}

	return $sections;
}


function getSections($items){
	foreach($items as $arItem){
		$chain = GetIBlockSectionPath(5, $arItem['IBLOCK_SECTION_ID']);
		$parent_sect = $chain->arResult[1]["IBLOCK_SECTION_ID"];
		if (!empty($parent_sect)) $arItem['IBLOCK_SECTION_ID'] = $parent_sect;
		$result[$arItem['IBLOCK_SECTION_ID']][] = $arItem;
	}

	foreach ($result as $key => $value) {
		$res = CIBlockSection::GetByID($key);
		if($ar_res = $res->GetNext()){
			$result[$key]["NAME"] = $ar_res["NAME"];
			$result[$key]["SORT"] = $ar_res["SORT"];
			$result[$key]["DETAIL_TEXT"] = $ar_res["DESCRIPTION"];
			$result[$key]["LINK"] = $ar_res["SECTION_PAGE_URL"];
			$result[$key]["img"] = CFile::GetPath($ar_res["DETAIL_PICTURE"]);
		}
	}
	return $result;
}

function sort_by_sort($a,$b){
	if ($a['SORT'] == $b['SORT']) {
        return 0;
    }
    return ($a['SORT'] < $b['SORT']) ? -1 : 1;
}

function allFlatSections(){
$res = CIBlockElement::GetElementGroups(getIdbyCode(), true);
if($ar_res = $res->GetNext()) {
	$home_section = ($ar_res["IBLOCK_SECTION_ID"] == '')?'513':$ar_res["IBLOCK_SECTION_ID"];
}
else{$home_section = 513;}
	$order = Array();
	$filter =  Array("SECTION_ID"=>$home_section, "INCLUDE_SUBSECTIONS"=>"Y");
	$select = $arSelect = array('*','PROPERTY_*');
	$res = CIBlockElement::GetList(
	    $order,
	    $filter,
	    false,
	    false,
	    $select
	);
	$k = 0;
	while ($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		if ($arProps["PRICE_METR"]["VALUE"] == "") continue;
		if ($arFields["ID"] == "2784") continue; 
		$result[$k]["NAME"] = $arFields["NAME"];
		$result[$k]["ID"] = $arFields["ID"];
		foreach($arProps as $key => $value){
			if (strpos($key,"RICE")) {
				$result[$k][$key][]=($value["VALUE"] != '')?$value["VALUE"]:'0';
			}
		}
		$k++;
	}
	
	$result[$k] = $result[$k-1];
	$result[$k]["NAME"]="”борка квартиры после ремонта (с мебелью)";
	$result[$k]['PRICE_METR'] = $result[$k-1]["PRICE_SPEC_METR"];
	$result = new_array_order($result);
	return $result;
}

function getSubServices(){
	$order = Array();
	$filter = Array("IBLOCK_ID"=>29);
	$select = array('*','PROPERTY_*','NAME');
	$res = CIBlockElement::GetList(
	    $order,
	    $filter,
	    false,
	    false,
	    $select
	);
	while ($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		$result[$arFields["NAME"]]["PRICE"] = $arProps["PRICE"]["VALUE"];
		$result[$arFields["NAME"]]["TYPE"] = $arProps["TYPE"]["VALUE"];
		$result[$arFields["NAME"]]["ID"] = $arFields["ID"];
	}
	//debug($arFields);
return $result;
}

function get_reviews_themes(){
	$order = Array();
	$filter = Array("IBLOCK_ID"=>32);
	$select = array('*','PROPERTY_*','NAME');
	$res = CIBlockElement::GetList(
	    $order,
	    $filter,
	    false,
	    false,
	    $select
	);
	while ($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		
		$result[$arFields["NAME"]]["SORT"] = $arFields["SORT"];
	}

	uasort($result, "sort_by_sort");

return $result;
}

function translit($value)
{
	$converter = array(
		'a' => 'a',    'a' => 'b',    'a' => 'v',    'a' => 'g',    'a' => 'd',
		'a' => 'e',    '?' => 'e',    '?' => 'zh',   'c' => 'z',    'e' => 'i',
		'e' => 'y',    'e' => 'k',    'e' => 'l',    'i' => 'm',    'i' => 'n',
		'i' => 'o',    'i' => 'p',    '?' => 'r',    'n' => 's',    'o' => 't',
		'o' => 'u',    'o' => 'f',    'o' => 'h',    'o' => 'c',    '?' => 'ch',
		'o' => 'sh',   'u' => 'sch',  'u' => '',     'u' => 'y',    'u' => '',
		'y' => 'e',    '?' => 'yu',   'y' => 'ya',
 
		'A' => 'A',    'A' => 'B',    'A' => 'V',    'A' => 'G',    'A' => 'D',
		'A' => 'E',    '?' => 'E',    '?' => 'Zh',   'C' => 'Z',    'E' => 'I',
		'E' => 'Y',    'E' => 'K',    'E' => 'L',    'I' => 'M',    'I' => 'N',
		'I' => 'O',    'I' => 'P',    '?' => 'R',    'N' => 'S',    'O' => 'T',
		'O' => 'U',    'O' => 'F',    'O' => 'H',    'O' => 'C',    '?' => 'Ch',
		'O' => 'Sh',   'U' => 'Sch',  'U' => '',     'U' => 'Y',    'U' => '',
		'Y' => 'E',    '?' => 'Yu',   '?' => 'Ya',	 ' ' => '-',    '/' => ''
	);
 
	$value = strtr($value, $converter);
	return $value;
}


function new_array_order($array){
	$current = $array[0];
	for ($i=0; $i < count($array); $i++) { 
		if ($array[$i]["ID"] == getIdbyCode()) {
			$array[0] = $array[$i];
			$array[$i] = $current;
			break;
		}
	}
	return $array;
}
function replace($string){
	$string = str_replace("/", "", $string); 
	$string = str_replace("(", "", $string); 
	$string = str_replace(")", "", $string); 
	return strtr($string," ","-");
}
function loginReplace($string){
	$string = str_replace("(", "", $string); 
	$string = str_replace(")", "", $string); 
	$string = str_replace(" ", "", $string); 
	return $string;
}

function getMiddle($array){
	foreach ($array as $arItem) {
		$data[] = $arItem["PROPERTIES"]["RATING"]["VALUE"];
	}
	if (count($data) != 0) {
		return array_sum($data) / count($data);
	} else {
		return 0;
	}
}

function getDops($array){
	foreach ($array["VALUE"] as $key=>$value){
		$id = end(explode('#id',$value));
		$items[$key]["ID"] = $id;
		$res = CIBlockElement::GetByID($id);
		$ar_res = $res->GetNextElement();
		$arFields = $ar_res->GetFields();
		$arProps = $ar_res->GetProperties();
		$items[$key]["NAME"] = $arFields["NAME"];
		$items[$key]["PRICE"] = $arProps["PRICE"]["VALUE"];
		$items[$key]["COL"] = $array["DESCRIPTION"][$key];
		$items[$key]["TYPE"] =$arProps["TYPE"]["VALUE"];;
	}

	return $items;
}

function getIdbyCode($iblock_id = 25){
	if (isset($_REQUEST['ELEMENT_CODE'])) {
		$code = $_REQUEST['ELEMENT_CODE'];
		$res=CIBlockElement::GetList(array(),array('IBLOCK_ID'=>$iblock_id,'CODE'=>$code));
	} else {
		$code = $_REQUEST['SECTION_CODE'];
		$res=CIBlockSection::GetList(array(),array('IBLOCK_ID'=>$iblock_id,'CODE'=>$code));
	}	
	$section=$res->Fetch();

	if($res->SelectedRowsCount()!=1) return 'not found';
	else return $section['ID'];
}

AddEventHandler("main", "OnBeforeUserRegister", "OnBeforeUserRegisterHandler");
// создаем обработчик событи€ "OnBeforeUserRegister"
function OnBeforeUserRegisterHandler(&$arFields)
{
// если пользователь регистрируетс€ на сайте https://www.cleaningmos.ru s4
if(SITE_ID=="s4")
{
	// добавл€ем его в группу с id=8 «арегистрированные пользователи cleaningmos.ru
	$arFields["GROUP_ID"][] = 8;
	}
} 