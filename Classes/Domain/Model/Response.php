<?php
namespace MOC\MocPoll\Domain\Model;

/**
 * Class Response
 *
 * @package MOC\MocPoll\Domain\Model
 */
class Response extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string
	 */
	protected $reply;

	/**
	 * @var integer
	 */
	protected $count = 0;

	/**
	 * @var \MOC\MocPoll\Domain\Model\Poll
	 */
	protected $poll;

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
	 * @return \MOC\MocPoll\Domain\Model\Poll
	 */
	public function getPoll() {
		return $this->poll;
	}

	/**
	 * @param \MOC\MocPoll\Domain\Model\Poll $poll
	 * @return void
	 */
	public function setPoll(\MOC\MocPoll\Domain\Model\Poll $poll) {
		$this->poll = $poll;
	}

	/**
	 * @return void
	 */
	public function incrementCount() {
		$this->count++;
	}

}