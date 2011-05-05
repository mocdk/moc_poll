<?php
class Tx_MocPoll_Domain_Repository_ResponseRepository  extends Tx_MocHelpers_Domain_Repository_MocRepository {
  public function createQuery(){
		$query = parent::createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		return $query;
	}

  
}