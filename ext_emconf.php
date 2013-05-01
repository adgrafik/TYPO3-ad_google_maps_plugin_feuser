<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "ad_google_maps_plugin_feuser".
 *
 * Auto generated 03-04-2013 10:25
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'ad: Google Maps Plugin Frontend Users Coordinates Provider',
	'description' => 'Extends the extension ad: Google Maps (ad_google_maps) with a coordinates provider for fe_users and fe_groups.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.0.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => 'bottom',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Arno Dudek',
	'author_email' => 'webmaster@adgrafik.at',
	'author_company' => 'ad:grafik',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-0.0.0',
			'extbase' => '1.3.0-0.0.0',
			'fluid' => '1.3.0-0.0.0',
			'ad_google_maps' => '1.1.3-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:20:{s:9:"ChangeLog";s:4:"6b32";s:16:"ext_autoload.php";s:4:"6da1";s:21:"ext_conf_template.txt";s:4:"8e73";s:12:"ext_icon.gif";s:4:"f587";s:14:"ext_tables.php";s:4:"db5a";s:14:"ext_tables.sql";s:4:"36d8";s:37:"Classes/Domain/Model/FrontendUser.php";s:4:"7e54";s:42:"Classes/Domain/Model/FrontendUserGroup.php";s:4:"1181";s:30:"Classes/Domain/Model/Layer.php";s:4:"ce07";s:57:"Classes/Domain/Repository/FrontendUserGroupRepository.php";s:4:"5dce";s:52:"Classes/Domain/Repository/FrontendUserRepository.php";s:4:"f6a3";s:45:"Classes/Domain/Repository/LayerRepository.php";s:4:"7982";s:61:"Classes/MapBuilder/CoordinatesProvider/FrontendUserGroups.php";s:4:"17c9";s:56:"Classes/MapBuilder/CoordinatesProvider/FrontendUsers.php";s:4:"4a2d";s:43:"Classes/Service/FrontendUserPostProcess.php";s:4:"5f40";s:34:"Configuration/TypoScript/setup.txt";s:4:"427d";s:48:"Resources/Private/Language/locallang_extconf.xml";s:4:"f1a6";s:44:"Resources/Private/Language/locallang_tca.xml";s:4:"5641";s:54:"Resources/Private/Language/locallang_tca_csh_layer.xml";s:4:"21f9";s:14:"doc/manual.sxw";s:4:"384f";}',
);

?>