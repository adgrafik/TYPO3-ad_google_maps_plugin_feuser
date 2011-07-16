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
 * Post process function to clear the coordinates field when useMapDrawerForFrontendUser is FALSE and address changed.
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class tx_AdGoogleMapsPluginFeuser_Service_FrontendUserPostProcess {

	/**
	 * Post process function for the fe_users record.
	 * 
	 * @param string $status
	 * @param string $table
	 * @param integer $table
	 * @param array $fieldArray
	 * @param t3lib_TCEmain $reference
	 * @return void
	 */
	public function processDatamap_postProcessFieldArray($status, $table, $uid, &$fieldArray, $reference) {
		$disablePositionFixing = (boolean) (array_key_exists('tx_adgooglemapspluginaddress_disable_position_fixing', $fieldArray) 
			? $fieldArray['tx_adgooglemapspluginfeuser_disable_position_fixing'] 
			: $reference->checkValue_currentRecord['tx_adgooglemapspluginfeuser_disable_position_fixing']
		);

			if ($table === 'fe_users' && $disablePositionFixing === FALSE && (
				array_key_exists('zip', $fieldArray) || 
				array_key_exists('city', $fieldArray) || 
				array_key_exists('country', $fieldArray) || 
				array_key_exists('address', $fieldArray))
			) {

			$fieldArray['tx_adgooglemapspluginfeuser_coordinates'] = '';
		}
	}

}

?>