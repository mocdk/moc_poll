<?php
class Tx_MocPoll_Controller_PollController extends Tx_Extbase_MVC_Controller_ActionController{
	const COOKIE_PREFIX = 'moc_poll_';

	public function initializeAction() {

	}

  public function pollAction(){
    $resultmode = $this->setResultMode();
    $cObject = $this->request->getContentObjectData();
		$repository = t3lib_div::makeInstance('Tx_MocPoll_Domain_Repository_PollRepository');
    $poll = $repository->findOneByParent($cObject['uid']);


		if(isset($_COOKIE[self::COOKIE_PREFIX.$poll->getUid()])){
			$this->forward('publicOpinion', 'Poll', $this->extensionName, array('pollId' => $poll->getUid()));
		}

    $this->view->assign('poll', $poll);
    $this->view->assign('extUrl', $this->getExtensionRealPath());
  }


  /**
   * @param int $reply
   * @param int $pollId
   * @param string $resultmode
   */
  public function voteAction($reply, $pollId, $resultmode){
    if(!isset($_COOKIE[self::COOKIE_PREFIX.$pollId])){
			$repository = t3lib_div::makeInstance('Tx_MocPoll_Domain_Repository_ResponseRepository');
			$response = $repository->findOneByUid($reply);
			$response->incCount();
			setcookie(self::COOKIE_PREFIX.$pollId, 1, time() + 17280000); //Expires in 200 days
		}
		$this->assignResultAndPoll($pollId,$resultmode);
  }

  protected function setResultMode() {
		if($this->settings['layout']) {
			$this->view->setLayoutPathAndFilename(t3lib_extMgm::siteRelPath('moc_poll').'Resources/Private/Layouts/'.$this->settings['layout'].'.html');
			$this->view->assign("resultpartial","graphresult");
			$resultmode = "graph";
		} else {
			$this->view->assign("resultpartial","simpleresult");
			$this->view->assign("enablegraphresult",0);
			$resultmode = "simple";
		}
		$this->view->assign("resultmode",$resultmode);
		return $resultmode;

  }

  protected function getExtensionRealPath(){
    return t3lib_extMgm::siteRelPath($this->getExtensionDirName());
  }

  protected function getExtensionDirName(){
    return t3lib_div::camelCaseToLowerCaseUnderscored($this->extensionName);
  }

  /**
   * @param int $pollId
   * @param string $resultmode
   */
  public function publicOpinionAction($pollId){
    $resultmode = $this->setResultMode();
    $this->assignResultAndPoll($pollId,$resultmode);
  }

  protected function assignResultAndPoll($pollId, $resultmode) {
	$repository = t3lib_div::makeInstance('Tx_MocPoll_Domain_Repository_PollRepository');
    $poll = $repository->findOneByUid($pollId);
    
	if($resultmode == "simple") {
		$this->view->assign("resultpartial","simpleresult");
		
		// calculate highest poll result for special styling
	    $results = array();
	    $totalCount = $poll->getTotalCount();
	    
		foreach($poll->getResponses() as $response) {
			array_push($results, round($response->getCount() / $totalCount * 100));
		}
		arsort($results);
		$highest = current($results);
		
		$this->view->assign('highest', $highest);
	} else {
		$this->view->assign("resultpartial","graphresult");
	}
	
	$this->view->assign("totalCount",$poll->getTotalCount());
    $this->view->assign('poll', $poll);
  }

}