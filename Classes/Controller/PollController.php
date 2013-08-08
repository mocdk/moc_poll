<?php
namespace MOC\MocPoll\Controller;

/**
 * Class PollController
 *
 * @package MOC\MocPoll\Controller
 */
class PollController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	const COOKIE_PREFIX = 'moc_poll_';

	/**
	 * @var \MOC\MocPoll\Domain\Repository\PollRepository
	 * @inject
	 */
	protected $pollRepository;

	/**
	 * @var \MOC\MocPoll\Domain\Repository\ResponseRepository
	 * @inject
	 */
	protected $responseRepository;

	/**
	 * @param \MOC\MocPoll\Domain\Model\Poll $poll
	 * @param string $layout
	 * @return void
	 */
	public function pollAction(\MOC\MocPoll\Domain\Model\Poll $poll = NULL, $layout = '') {
		if (!isset($poll)) {
			$cObject = $this->configurationManager->getContentObject();
			$poll = $this->pollRepository->findOneByParent($cObject->data['uid']);
		}

		$layout = $layout ? $layout : $this->settings['layout'];

		switch ($layout) {
			case 'graphic':
				$resultmode = 'Graph';
				break;
			default:
				$resultmode = 'Simple';
		}

		$totalCount = $poll->getTotalCount();
		$this->view->assignMultiple(array(
			'poll'       => $poll,
			'layout'     => $layout,
			'resultmode' => $resultmode,
			'totalCount' => $totalCount
		));

		if ($resultmode === 'Simple') {
			$results = array();
			$responses = $poll->getResponses();
			foreach ($responses as $response) {
				array_push($results, round($response->getCount() / $totalCount * 100));
			}
			arsort($results);
			$highest = current($results);
			$this->view->assignMultiple(array(
				'responses' => $responses,
				'highest'   => $highest
			));
		}
	}

	/**
	 * @param integer $reply
	 * @param \MOC\MocPoll\Domain\Model\Poll $poll
	 * @param string $layout
	 * @return void
	 */
	public function voteAction($reply, \MOC\MocPoll\Domain\Model\Poll $poll, $layout) {
		if (isset($_COOKIE[self::COOKIE_PREFIX . $poll->getUid()]) === FALSE) {
			$response = $this->responseRepository->findOneByUid($reply);
			$response->incCount();
			$this->responseRepository->update($response);
			setcookie(self::COOKIE_PREFIX . $poll->getUid(), 1, time() + 17280000);
		}
		$this->forward('poll', NULL, NULL, array('poll' => $poll, 'layout' => $layout));
	}
}