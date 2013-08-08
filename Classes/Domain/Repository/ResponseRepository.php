<?php
namespace MOC\MocPoll\Domain\Repository;

/**
 * Class ResponseRepository
 *
 * @package MOC\MocPoll\Domain\Repository
 */
class ResponseRepository extends \MOC\MocHelpers\Domain\Repository\AbstractRepository {

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryInterface
	 */
	public function createQuery() {
		$query = parent::createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		return $query;
	}
}