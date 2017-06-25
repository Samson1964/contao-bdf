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
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'FrontendAusgabe'    => 'system/modules/bdf/classes/FrontendAusgabe.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_bdfboxen'        => 'system/modules/bdf/templates',
));
