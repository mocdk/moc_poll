<?php
namespace MOC\MocPoll\Domain\Model;

/**
 * Class PollBase
 *
 * @package MOC\MocPoll\Domain\Model
 */
class PollBase extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string
	 */
	protected $question;

	/**
	 * @lazy
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MOC\MocPoll\Domain\Model\Response>
	 */
	protected $responses;

	/**
	 * Constructer
	 */
	public function __construct() {
		$this->responses = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * @return string
	 */
	public function getQuestion() {
		return $this->question;
	}

	/**
	 * @param string $question
	 * @return void
	 */
	public function setQuestion($question) {
		$this->question = $question;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MOC\MocPoll\Domain\Model\Response>
	 */
	public function getResponses() {
		return $this->responses;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MOC\MocPoll\Domain\Model\Response> $responses
	 * @return void
	 */
	public function setResponses(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $responses) {
		$this->responses = $responses;
	}

	/**
	 * @param \MOC\MocPoll\Domain\Model\Response $responses
	 * @return void
	 */
	public function addResponse(\MOC\MocPoll\Domain\Model\Response $responses) {
		$this->responses->attach($responses);
	}
}
