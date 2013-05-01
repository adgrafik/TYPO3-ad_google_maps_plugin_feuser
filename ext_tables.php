<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$extensionConfiguration = Tx_AdGoogleMaps_Utility_BackEnd::getExtensionConfiguration('ad_google_maps_plugin_feuser');
// l10n_mode for property fields.
$excludeProperties = Tx_AdGoogleMaps_Utility_BackEnd::getExtensionConfigurationValue('excludeProperties');

// TCA configuration for tx_adgooglemaps_domain_model_layer
t3lib_div::loadTCA('tx_adgooglemaps_domain_model_layer');

$tempColumns = array(
	'tx_adgooglemapspluginfeuser_feusers' => array(
		'label' => 'LLL:EXT:ad_google_maps_plugin_feuser/Resources/Private/Language/locallang_tca.xml:tx_adgooglemaps_domain_model_layer.feusers',
		'exclude' => true,
		'l10n_mode' => $excludeProperties,
		'displayCond' => 'FIELD:coordinates_provider:=:Tx_AdGoogleMapsPluginFeuser_MapBuilder_CoordinatesProvider_FrontendUsers',
		'config' => array(
			'type' => 'select',
			'size' => '5',
			'autoSizeMax' => 15,
			'minitems' => 0,
			'maxitems' => 99,
			'foreign_table' => 'fe_users',
			'foreign_table_where' => (
				$extensionConfiguration['recordStorage'] == 'storagePid'
					? 'AND fe_users.pid = ###STORAGE_PID###'
					: ($extensionConfiguration['recordStorage'] == 'tsConfigId'
						? 'AND fe_users.pid = ###PAGE_TSCONFIG_ID###'
						: ($extensionConfiguration['recordStorage'] == 'tsConfigIdList'
							? 'AND fe_users.pid IN ( ###PAGE_TSCONFIG_IDLIST### )'
							: (
								''
							)
						)
					)
			),
			'MM' => 'tx_adgooglemapspluginfeuser_layer_feuser_mm',
		),
	),
	'tx_adgooglemapspluginfeuser_fegroups' => array(
		'label' => 'LLL:EXT:ad_google_maps_plugin_feuser/Resources/Private/Language/locallang_tca.xml:tx_adgooglemaps_domain_model_layer.fegroups',
		'exclude' => true,
		'l10n_mode' => $excludeProperties,
		'displayCond' => 'FIELD:coordinates_provider:=:Tx_AdGoogleMapsPluginFeuser_MapBuilder_CoordinatesProvider_FrontendUserGroups',
		'config' => array(
			'type' => 'select',
			'size' => '5',
			'autoSizeMax' => 15,
			'minitems' => 0,
			'maxitems' => 99,
			'foreign_table' => 'fe_groups',
			'foreign_table_where' => (
				$extensionConfiguration['recordStorage'] == 'storagePid'
					? 'AND fe_groups.pid = ###STORAGE_PID###'
					: ($extensionConfiguration['recordStorage'] == 'tsConfigId'
						? 'AND fe_groups.pid = ###PAGE_TSCONFIG_ID###'
						: ($extensionConfiguration['recordStorage'] == 'tsConfigIdList'
							? 'AND fe_groups.pid IN ( ###PAGE_TSCONFIG_IDLIST### )'
							: (
								''
							)
						)
					)
			),
			'MM' => 'tx_adgooglemapspluginfeuser_layer_fegroups_mm',
		),
	),
);

t3lib_extMgm::addTCAcolumns('tx_adgooglemaps_domain_model_layer', $tempColumns, 1);
t3lib_extMgm::addLLrefForTCAdescr('tx_adgooglemaps_domain_model_layer', 'EXT:ad_google_maps_plugin_feuser/Resources/Private/Language/locallang_tca_csh_layer.xml');

// Add layer type icon.
$TCA['tx_adgooglemaps_domain_model_layer']['columns']['coordinates_provider']['config']['items'][] = array('LLL:EXT:ad_google_maps_plugin_feuser/Resources/Private/Language/locallang_tca.xml:tx_adgooglemaps_domain_model_layer.coordinatesProvider.feusers', 'Tx_AdGoogleMapsPluginFeuser_MapBuilder_CoordinatesProvider_FrontendUsers');
$TCA['tx_adgooglemaps_domain_model_layer']['columns']['coordinates_provider']['config']['items'][] = array('LLL:EXT:ad_google_maps_plugin_feuser/Resources/Private/Language/locallang_tca.xml:tx_adgooglemaps_domain_model_layer.coordinatesProvider.fegroups', 'Tx_AdGoogleMapsPluginFeuser_MapBuilder_CoordinatesProvider_FrontendUserGroups');

t3lib_extMgm::addToAllTCAtypes(
	'tx_adgooglemaps_domain_model_layer',
	'tx_adgooglemapspluginfeuser_feusers, tx_adgooglemapspluginfeuser_fegroups',
	$extensionConfiguration['pluginFeuser']['addToLayerType'],
	'after:coordinates_provider'
);

// Add static TypoScript
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/', 'ad: Google Maps Plugin Frontend Users Coordinates Provider');

// Add fe_users support.
t3lib_div::loadTCA('fe_users');

if ((boolean) $extensionConfiguration['pluginFeuser']['useMapDrawerForFrontendUser'] === TRUE) {

	$tempColumns = array(
		'tx_adgooglemapspluginfeuser_coordinates' => array(
			'exclude' => true,
			'label'   => 'LLL:EXT:ad_google_maps/Resources/Private/Language/MapDrawer/locallang.xml:tx_adgooglemaps_mapdrawer.coordinates',
			'config'  => array(
				'type' => 'user',
				'size' => 20,
				'eval' => 'required,nospace,trim',
				'userFunc' => 'EXT:ad_google_maps/Classes/MapDrawer/MapDrawerApi.php:tx_AdGoogleMaps_MapDrawer_MapDrawerApi->tx_draw',
			),
		),
	);

	t3lib_extMgm::addTCAcolumns('fe_users', $tempColumns, 1);
	t3lib_extMgm::addLLrefForTCAdescr('fe_users', 'EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_tca_csh_layer.xml');
	t3lib_extMgm::addToAllTCAtypes(
		'fe_users', 
		'--div--;LLL:EXT:ad_google_maps/Resources/Private/Language/MapDrawer/locallang.xml:tx_adgooglemaps_mapdrawer.sheetMapDrawer, tx_adgooglemapspluginfeuser_coordinates;;;;1-1-1',
		'',
		'after:image'
	);
}
/*
if ((boolean) $extensionConfiguration['useSorting'] === TRUE) {

	if (!isset($GLOBALS['TCA']['fe_users']['ctrl']['sortby'])) {
		$GLOBALS['TCA']['fe_users']['ctrl']['sortby'] = 'sorting';
	}

	if (!isset($GLOBALS['TCA']['fe_groups']['ctrl']['sortby'])) {
		t3lib_div::loadTCA('fe_groups');
		$GLOBALS['TCA']['fe_groups']['ctrl']['sortby'] = 'sorting';
	}
}
*/
// Set post process function for fe_users on change.
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['processDatamap_postProcessFieldArray'] = 'EXT:ad_google_maps_plugin_feuser/Classes/Service/FrontendUserPostProcess.php:tx_AdGoogleMapsPluginFeuser_Service_FrontendUserPostProcess';

?>