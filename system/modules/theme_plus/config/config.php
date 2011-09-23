<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

#copyright


/**
 * RC Hack!
 */
if (VERSION == 2.10 && BUILD == 'RC1' && file_exists(TL_ROOT . '/system/modules/theme_plus/config/runonce.php'))
{
	class ThemePlusHack extends System
	{
		public function __construct() {}
		public function run()
		{
			$this->import('Database');
			$this->Database->execute("INSERT INTO tl_runonce (name) VALUES ('system/modules/theme_plus/config/runonce.php')");
		}
	}
	$objThemePlusHack = new ThemePlusHack();
	$objThemePlusHack->run();
}


/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['design']['themes']['tables'][] = 'tl_theme_plus_file';
$GLOBALS['BE_MOD']['design']['themes']['tables'][] = 'tl_theme_plus_variable';


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['includes']['script_source'] = 'ScriptSource';


/**
 * Content elements
 */
$GLOBALS['TL_CTE']['includes']['script_source'] = 'ScriptSource';


/**
 * Settings
 */
$GLOBALS['TL_CONFIG']['theme_plus_exclude_contaocss']       = '';
$GLOBALS['TL_CONFIG']['theme_plus_exclude_mootools']        = '';
$GLOBALS['TL_CONFIG']['theme_plus_lesscss_mode']            = 'phpless';


/**
 * HOOKs
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('ThemePlus', 'hookReplaceInsertTags');


/**
 * Page types
 */
$GLOBALS['TL_PTY']['regular'] = 'ThemePlusPageRegular';


/**
 * easy_themes integration
 */
$GLOBALS['TL_EASY_THEMES_MODULES']['theme_plus_file'] = array
(
	'href_fragment' => 'table=tl_theme_plus_file',
	'icon'          => 'system/modules/theme_plus/html/icon.png'
);
$GLOBALS['TL_EASY_THEMES_MODULES']['theme_plus_variable'] = array
(
	'href_fragment' => 'table=tl_theme_plus_variable',
	'icon'          => 'system/modules/theme_plus/html/variable.png'
)
