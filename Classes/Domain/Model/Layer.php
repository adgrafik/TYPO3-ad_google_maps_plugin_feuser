<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Arno Dudek <webmaster@adgrafik.at>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Model: Layer.
 * Nearly the same like the Google Maps API
 * @see http://code.google.com/apis/maps/documentation/javascript/reference.html
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 * @api
 */
class Tx_AdGoogleMapsPluginFeuser_Domain_Model_Layer extends Tx_AdGoogleMaps_Domain_Model_Layer {

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_AdGoogleMapsPluginFeuser_Domain_Model_FrontendUser>
	 * @lazy
	 */
	protected $pluginFeuserFrontendUsers;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_AdGoogleMapsPluginFeuser_Domain_Model_FrontendUserGroup>
	 * @lazy
	 */
	protected $pluginFeuserFrontendUserGroups;

	/**
	 * Sets this pluginFeuserFrontendUsers
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_AdGoogleMapsPluginFeuser_Domain_Model_FrontendUser> $pluginFeuserFrontendUsers
	 * @return void
	 */
	public function setPluginFeuserFrontendUsers(Tx_Extbase_Persistence_ObjectStorage $pluginFeuserFrontendUsers) {
		$this->pluginFeuserFrontendUsers = $pluginFeuserFrontendUsers;
	}

	/**
	 * Returns this pluginFeuserFrontendUsers
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_AdGoogleMapsPluginFeuser_Domain_Model_FrontendUser>
	 */
	public function getPluginFeuserFrontendUsers() {
		if ($this->pluginFeuserFrontendUsers instanceof Tx_Extbase_Persistence_LazyLoadingProxy) {
			$this->pluginFeuserFrontendUsers->_loadRealInstance();
		}
		return $this->pluginFeuserFrontendUsers;
	}

	/**
	 * Sets this pluginFeuserFrontendUserGroups
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_AdGoogleMapsPluginFeuser_Domain_Model_FrontendUserGroup> $pluginFeuserFrontendUserGroups
	 * @return void
	 */
	public function setPluginFeuserFrontendUserGroups(Tx_Extbase_Persistence_ObjectStorage $pluginFeuserFrontendUserGroups) {
		$this->pluginFeuserFrontendUserGroups = $pluginFeuserFrontendUserGroups;
	}

	/**
	 * Returns this pluginFeuserFrontendUserGroups
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_AdGoogleMapsPluginFeuser_Domain_Model_FrontendUserGroup>
	 */
	public function getPluginFeuserFrontendUserGroups() {
		if ($this->pluginFeuserFrontendUserGroups instanceof Tx_Extbase_Persistence_LazyLoadingProxy) {
			$this->pluginFeuserFrontendUserGroups->_loadRealInstance();
		}
		return $this->pluginFeuserFrontendUserGroups;
	}

}

?>