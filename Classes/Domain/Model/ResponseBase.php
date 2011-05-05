<?php
class Tx_MocPoll_Domain_Model_ResponseBase extends Tx_Extbase_DomainObject_AbstractEntity{
/**
* @var string
*/
protected $reply;
/**
* @var integer
*/
protected $count;
/**
* @var Tx_MocPoll_Domain_Model_Poll
*/
protected $poll;
function __construct(){
}
/**
* @return string
*/
function getReply(){
return $this->reply;
}
/**
* @param string $reply
*/
function setReply($reply){
$this->reply = $reply;
}
/**
* @return integer
*/
function getCount(){
return $this->count;
}
/**
* @param integer $count
*/
function setCount($count){
$this->count = $count;
}
/**
* @return Tx_Extbase_Persistence_ObjectStorage<Tx_MocPoll_Domain_Model_Poll>
*/
function getPolls(){
return $this->poll;
}
/**
* @param Tx_Extbase_Persistence_ObjectStorage<Tx_MocPoll_Domain_Model_Poll> $poll
*/
function setPolls(Tx_Extbase_Persistence_ObjectStorage $poll){
$this->poll = $poll;
}
/**
* @param Tx_MocPoll_Domain_Model_Poll $poll
*/
function addPoll(Tx_MocPoll_Domain_Model_Poll $poll){
$this->poll->attach($poll);
}
}
