<?php
class Tx_MocPoll_Domain_Model_PollBase extends Tx_Extbase_DomainObject_AbstractEntity{
/**
* @var string
*/
protected $question;
/**
* @lazy
* @var Tx_Extbase_Persistence_ObjectStorage<Tx_MocPoll_Domain_Model_Response>
*/
protected $responses;
function __construct(){
$this->responses = new Tx_Extbase_Persistence_ObjectStorage();
}
/**
* @return string
*/
function getQuestion(){
return $this->question;
}
/**
* @param string $question
*/
function setQuestion($question){
$this->question = $question;
}
/**
* @return Tx_Extbase_Persistence_ObjectStorage<Tx_MocPoll_Domain_Model_Response>
*/
function getResponses(){
return $this->responses;
}
/**
* @param Tx_Extbase_Persistence_ObjectStorage<Tx_MocPoll_Domain_Model_Response> $responses
*/
function setResponses(Tx_Extbase_Persistence_ObjectStorage $responses){
$this->responses = $responses;
}
/**
* @param Tx_MocPoll_Domain_Model_Response $responses
*/
function addResponse(Tx_MocPoll_Domain_Model_Response $responses){
$this->responses->attach($responses);
}
}
