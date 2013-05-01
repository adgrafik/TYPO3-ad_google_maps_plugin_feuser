#
# Table structure for table 'tx_adgooglemaps_domain_model_layer'
#
CREATE TABLE tx_adgooglemaps_domain_model_layer (
	tx_adgooglemapspluginfeuser_feusers int(11) unsigned DEFAULT '0' NOT NULL,
	tx_adgooglemapspluginfeuser_fegroups int(11) unsigned DEFAULT '0' NOT NULL,
);


#
# Table structure for table 'tx_adgooglemapspluginfeuser_layer_feuser_mm'
#
CREATE TABLE tx_adgooglemapspluginfeuser_layer_feuser_mm (
	uid_local int(11) DEFAULT '0' NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);


#
# Table structure for table 'tx_adgooglemapspluginfeuser_layer_fegroups_mm'
#
CREATE TABLE tx_adgooglemapspluginfeuser_layer_fegroups_mm (
	uid_local int(11) DEFAULT '0' NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);


#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (
	tx_adgooglemapspluginfeuser_coordinates text,
#	sorting int(11) unsigned DEFAULT '0' NOT NULL
);


#
# Table structure for table 'fe_groups'
#
#CREATE TABLE fe_groups (
#	sorting int(11) unsigned DEFAULT '0' NOT NULL
#);