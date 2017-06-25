<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   bdf
 * @author    Frank Hoppe
 * @license   GNU/LGPL
 * @copyright Frank Hoppe 2014
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['bdfboxen'] = '{type_legend},type;{include_legend},bdftitelbox;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['bdftitelbox'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['bdftitelbox'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_bdf', 'getBoxen'),
	'eval'                    => array
	(
		'mandatory'           => true, 
		'chosen'              => true, 
		'submitOnChange'      => true,
		'tl_class'            => 'long'
	),
	'wizard'                  => array
	(
		array('tl_content_bdf', 'editBox')
	),
	'sql'                     => "int(10) unsigned NOT NULL default '0'"
);

class tl_content_bdf extends Backend
{

	public function getBoxen()
	{

		$arrForms = array();
		$objForms = $this->Database->execute("SELECT id, title FROM tl_bdf_boxen ORDER BY title");

		while ($objForms->next())
		{
			$arrForms[$objForms->id] = $objForms->title . ' (ID ' . $objForms->id . ')';
		}

		return $arrForms;
	}

	public function editBox(DataContainer $dc)
	{
		return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=boxen&amp;act=edit&amp;id=' . $dc->value . '&amp;popup=1&amp;nb=1&amp;rt=' . REQUEST_TOKEN . '" titel="' . sprintf(specialchars($GLOBALS['TL_LANG']['tl_content']['editalias'][1]), $dc->value) . '" style="padding-left:3px" onclick="Backend.openModalIframe({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", sprintf($GLOBALS['TL_LANG']['tl_content']['editalias'][1], $dc->value))) . '\',\'url\':this.href});return false">' . Image::getHtml('alias.gif', $GLOBALS['TL_LANG']['tl_content']['editalias'][0], 'style="vertical-align:top"') . '</a>';
	}
}

?>
