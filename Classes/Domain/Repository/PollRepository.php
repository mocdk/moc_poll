<?php
namespace MOC\MocPoll\Domain\Repository;

/**
 * Class PollRepository
 *
 * @package MOC\MocPoll\Domain\Repository
 */
class PollRepository extends \MOC\MocHelpers\Domain\Repository\AbstractRepository {

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryInterface
	 */
	public function createQuery() {
		$query = parent::createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		return $query;
	}
}