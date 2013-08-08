<?php
namespace MOC\MocPoll\Domain\Model;

/**
 * Class ResponseBase
 *
 * @package MOC\MocPoll\Domain\Model
 */
class ResponseBase extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string
	 */
	protected $reply;

	/**
	 * @var integer
	 */
	protected $count;

	/**
	 * @var \MOC\MocPoll\Domain\Model\Poll
	 */
	protected $poll;

	/**
	 * Constructer
	 */
	public function __construct() {
	}

	/**
	 * @return string
	 */
	public function getReply() {
		return $this->reply;
	}

	/**
	 * @param string $reply
	 * @return void
	 */
	public function setReply($reply) {
		$this->reply = $reply;
	}

	/**
	 * @return integer
	 */
	public function getCount() {
		return $this->count;
	}

	/**
	 * @param integer $count
	 * @return void
	 */
	public function setCount($count) {
		$this->count = $count;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MOC\MocPoll\Domain\Model\Poll>
	 */
	public function getPolls() {
		return $this->poll;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MOC\MocPoll\Domain\Model\Poll> $poll
	 * @return void
	 */
	public function setPolls(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $poll) {
		$this->poll = $poll;
	}

	/**
	 * @param \MOC\MocPoll\Domain\Model\Poll $poll
	 * @return void
	 */
	public function addPoll(\MOC\MocPoll\Domain\Model\Poll $poll) {
		$this->poll->attach($poll);
	}
}
