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
 * Repository: FrontendUserGroup.
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class Tx_AdGoogleMapsPluginFeuser_Domain_Repository_FrontendUserGroupRepository extends Tx_Extbase_Domain_Repository_FrontendUserGroupRepository {

	/**
	 * Returns the FrontendUsers of the group recursively.
	 *
	 * @param mixed $frontendUserGroups
	 * @param integer $level
	 * @return array
	 */
	public function getFrontendUsersRecursively($frontendUserGroups, $level = 0) {
		// Search frontendUsers.
		$frontendUserRepository = t3lib_div::makeInstance('Tx_AdGoogleMapsPluginFeuser_Domain_Repository_FrontendUserRepository');
		$query = $frontendUserRepository->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);

		$frontendUsers = array();
		foreach ($frontendUserGroups as $frontendUserGroup) {
			$result = $query->matching(
				$query->logicalOr(
					$query->contains('usergroup', $frontendUserGroup),
					$query->equals('usergroup', $frontendUserGroup)
				)
			)->execute();

			if (count($result) > 0) {
				$frontendUsers = array_merge($frontendUsers, $result->toArray());
			}
		}

		// TODO: Recursion don't works ... ?
		// Search sub groups.
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		$frontendUserSubGroups = $query->matching(
			$query->in('subgroup', $frontendUserGroups)
#			->setOrderings(array('title' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING))
		)->execute();
		if (count($frontendUserSubGroups) > 0 && $level < 99) {
			$frontendUsers = array_merge($frontendUsers, $this->getFrontendUsersRecursively($frontendUserSubGroups, $level++));
		}

		return $frontendUsers;
	}

}
?>