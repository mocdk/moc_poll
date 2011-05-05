<?php
class Tx_MocPoll_Domain_Model_Response extends Tx_MocPoll_Domain_Model_ResponseBase{
	public function __construct(){
		$this->count = 0;
	}

	public function incCount(){
		$this->count ++;
	}
}
