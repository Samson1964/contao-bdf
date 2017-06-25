<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Table tl_bdf_boxen
 */
$GLOBALS['TL_DCA']['tl_bdf_boxen'] = array
(

	// Grundeinstellungen
	'config' => array
	(
		'dataContainer'    => 'Table',
		'enableVersioning' => true,
		'sql'              => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		),
	),

	// Listendarstellung
	'list' => array
	(
		'sorting' => array
		(
			'mode'        => 2,
			'fields'      => array('title'),
			'flag'        => 1,
			'panelLayout' => 'filter;sort,search,limit'
		),

		// Bezeichnungen in der Listendarstellung
		'label' => array
		(
			'fields' => array('title'),
			'format' => '%s',
		),

		// Globale Bearbeitungslinks
		'global_operations' => array
		(
			'all' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),

		// Bearbeitungslinks für die Listeneinträge
		'operations' => array
		(
			'edit' => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['edit'],
				'href'            => 'act=edit',
				'icon'            => 'edit.gif'
			),
			'copy' => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['copy'],
				'href'            => 'act=copy',
				'icon'            => 'copy.gif'
			),
			'delete' => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['delete'],
				'href'            => 'act=delete',
				'icon'            => 'delete.gif',
				'attributes'      => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['show'],
				'href'            => 'act=show',
				'icon'            => 'show.gif',
				'attributes'      => 'style="margin-right:3px"'
			)
		)
	),

	// Paletten
	'palettes' => array
	(
		'__selector__' => array
		(
			'bdfbox1',
			'bdfbox2',
			'bdfbox3',
			'bdfbox4',
			'bdfbox5'
		),
		'default' => 'title;{bdfbox_legend1},bdfbox1;{bdfbox_legend2},bdfbox2;{bdfbox_legend3},bdfbox3;{bdfbox_legend4},bdfbox4;{bdfbox_legend5},bdfbox5;{protected_legend:hide},protected;{expert_legend:hide},guest,cssID,space;{invisible_legend},invisible,start,stop'
	),

	// Unterpaletten
	'subpalettes' => array
	(
		'bdfbox1'   => 'boxtext1,boxhfarbe1,boxebene1,boxposition1,boxlineheight1',
		'bdfbox2'   => 'boxtext2,boxhfarbe2,boxebene2,boxposition2,boxlineheight2',
		'bdfbox3'   => 'boxtext3,boxhfarbe3,boxebene3,boxposition3,boxlineheight3',
		'bdfbox4'   => 'boxtext4,boxhfarbe4,boxebene4,boxposition4,boxlineheight4',
		'bdfbox5'   => 'boxtext5,boxhfarbe5,boxebene5,boxposition5,boxlineheight5',
		'protected' => 'groups'
	),

	// Felder
	'fields' => array
	(
		'id' => array
		(
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		),

		'tstamp' => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),

		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'mandatory'           => true,
				'maxlength'           => 255,
				'tl_class'            => 'long'
			),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'protected' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['protected'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'groups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['groups'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_member_group.name',
			'eval'                    => array('mandatory'=>true, 'multiple'=>true),
			'sql'                     => "blob NULL",
			'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
		),
		'guests' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['guests'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'cssID' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['cssID'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>2, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'space' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['space'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>2, 'rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'invisible' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['invisible'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'start' => array
		(
			'exclude'                 => true,
			'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['start'],
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'stop' => array
		(
			'exclude'                 => true,
			'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['stop'],
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
	)
);

// Weitere Felder hinzufügen
for($x=1;$x<12;$x++)
{
	$GLOBALS['TL_DCA']['tl_bdf_boxen']['fields']['boxtext'.$x] = array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['boxtext'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'textarea',
		'eval'                    => array(
			'mandatory'=>true,
			'rte'=>'tinyMCE',
			'rows' => 3,
			'helpwizard'=>true
		),
		'explanation'             => 'insertTags',
		'sql'                     => "mediumtext NULL"
	);

	$GLOBALS['TL_DCA']['tl_bdf_boxen']['fields']['boxhfarbe'.$x] = array
	(
		'label'         => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['boxhfarbe'],
		'inputType'     => 'text',
		'default'       => 'ffb266',
		'eval'          => array('maxlength'=>6, 'multiple'=>true, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
		'sql'           => "varchar(64) NOT NULL default ''"
	);

	$GLOBALS['TL_DCA']['tl_bdf_boxen']['fields']['boxebene'.$x] = array
	(
		'label'         => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['boxebene'],
		'inputType'     => 'text',
		'eval'          => array(
			'tl_class'  => 'w50',
			'rgxp'      => 'digit',
			'maxlength' => 5
		),
		'sql'           => "varchar(5) NOT NULL default ''"
	);

	$GLOBALS['TL_DCA']['tl_bdf_boxen']['fields']['boxposition'.$x] = array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['boxposition'],
		'exclude'                 => true,
		'inputType'               => 'trbl',
		'options'                 => array('px', '%', 'em', 'rem', 'ex', 'pt', 'pc', 'in', 'cm', 'mm'),
		'eval'                    => array(
			'includeBlankOption' => true,
			'rgxp' => 'digit',
			'tl_class'=>'w50'
		),
		'sql'                     => "varchar(128) NOT NULL default ''"
	);

	$GLOBALS['TL_DCA']['tl_bdf_boxen']['fields']['bdfbox'.$x] = array
	(
		'label'         => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['bdfbox'],
		'exclude'       => true,
		'inputType'     => 'checkbox',
		'eval'          => array('tl_class'=>'clr','isBoolean' => true,'submitOnChange'=>true),
		'sql'           => "char(1) NOT NULL default ''"
	);

	$GLOBALS['TL_DCA']['tl_bdf_boxen']['fields']['boxlineheight'.$x] = array
	(
		'label'         => &$GLOBALS['TL_LANG']['tl_bdf_boxen']['boxlineheight'],
		'exclude'       => true,
		'inputType'     => 'checkbox',
		'eval'          => array('tl_class'=>'w50','isBoolean' => true),
		'sql'           => "char(1) NOT NULL default ''"
	);

}

?>