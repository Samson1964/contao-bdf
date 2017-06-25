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

/**
 * Backend-Modul BdF anlegen und einfügen
 */

$bdf = array(
	'bdf' => array
	(
		'boxen' => array
		(
			'tables'      => array('tl_bdf_boxen', 'tl_content'),
			'icon'        => 'system/modules/bdf/assets/images/boxen.png'
		)
	)
);
array_insert($GLOBALS['BE_MOD'], 1, $bdf);

/**
 * Front end modules
$GLOBALS['FE_MOD']['bdf'] = array
(
	'bdfboxen_list'     => 'FrontendAusgabe'
);
 */

/**
 * -------------------------------------------------------------------------
 * CONTENT ELEMENTS
 * -------------------------------------------------------------------------
 */
$GLOBALS['TL_CTE']['bdf']['bdfboxen'] = 'FrontendAusgabe';

/**
 * -------------------------------------------------------------------------
 * Voreinstellungen
 * -------------------------------------------------------------------------
 */

?>