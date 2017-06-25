<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   bdf
 * Version    1.0.0
 * @author    Frank Hoppe
 * @license   GNU/LGPL
 * @copyright Frank Hoppe 2014
 */
class FrontendAusgabe extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_bdfboxen';

	/**
	 * Generate the module
	 */
	protected function compile()
	{

		//global $objPage,$objArticle;
		//print_r($GLOBALS);
		//echo "ID=".$objPage->id;

		$this->Template = new \FrontendTemplate($this->strTemplate);

		//echo "<pre>";
		//print_r($this);
		//echo "</pre>";

		// Titelbox-Datensatz laden
		$boxid = $this->bdftitelbox;
		$result = $this->Database->prepare("SELECT * FROM tl_bdf_boxen WHERE id=?")
		                         ->execute($boxid)
		                         ->fetchAllAssoc();

		// Template füllen
		$this->Template->class = "ce_bdfboxen";
		$this->Template->boxindex = array(1,2,3,4,5);
		$this->Template->boxstatus = array($result[0]['bdfbox1'],$result[0]['bdfbox2'],$result[0]['bdfbox3'],$result[0]['bdfbox4'],$result[0]['bdfbox5']);
		$this->Template->boxtext = array($result[0]['boxtext1'],$result[0]['boxtext2'],$result[0]['boxtext3'],$result[0]['boxtext4'],$result[0]['boxtext5']);

		// CSS laden und umwandeln
		$boxebene[] = $result[0]['boxebene1'];
		$boxebene[] = $result[0]['boxebene2'];
		$boxebene[] = $result[0]['boxebene3'];
		$boxebene[] = $result[0]['boxebene4'];
		$boxebene[] = $result[0]['boxebene5'];
		$boxfarbe[] = unserialize($result[0]['boxhfarbe1']);
		$boxfarbe[] = unserialize($result[0]['boxhfarbe2']);
		$boxfarbe[] = unserialize($result[0]['boxhfarbe3']);
		$boxfarbe[] = unserialize($result[0]['boxhfarbe4']);
		$boxfarbe[] = unserialize($result[0]['boxhfarbe5']);
		$boxposition[] = unserialize($result[0]['boxposition1']);
		$boxposition[] = unserialize($result[0]['boxposition2']);
		$boxposition[] = unserialize($result[0]['boxposition3']);
		$boxposition[] = unserialize($result[0]['boxposition4']);
		$boxposition[] = unserialize($result[0]['boxposition5']);
		$boxlineheight[] = $result[0]['boxlineheight1'];
		$boxlineheight[] = $result[0]['boxlineheight2'];
		$boxlineheight[] = $result[0]['boxlineheight3'];
		$boxlineheight[] = $result[0]['boxlineheight4'];
		$boxlineheight[] = $result[0]['boxlineheight5'];

		// CSS einbauen
		$css = array();
		for($x=0;$x<count($boxebene);$x++)
		{
			$css[$x] = "";
			if($boxebene[$x]) $css[$x] = "z-index:".$boxebene[$x].";";
			if($boxfarbe[$x]) $css[$x] .= "background-color:#".$boxfarbe[$x][0].";";
			if($boxposition[$x])
			{
				if($boxposition[$x]['bottom']) $css[$x] .= "width:".$boxposition[$x]['bottom']."px;";
				if($boxposition[$x]['left']) $css[$x] .= "height:".$boxposition[$x]['left']."px;";
				if($boxposition[$x]['right']) $css[$x] .= "top:".$boxposition[$x]['right']."px;";
				if($boxposition[$x]['top']) $css[$x] .= "left:".$boxposition[$x]['top']."px;";
				if($boxlineheight[$x]) $css[$x] .= "line-height:".$boxposition[$x]['left']."px;";
			}
		}
		$this->Template->boxcss = $css;

	}


}
?>