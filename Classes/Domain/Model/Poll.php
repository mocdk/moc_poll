<?php
class Tx_MocPoll_Domain_Model_Poll extends Tx_MocPoll_Domain_Model_PollBase{
	public function getTotalCount(){
		$count = 0;
		foreach($this->getResponses() as $response){
			$count += $response->getCount();
		}
		return $count;
	}
}
