<?php
namespace MOC\MocPoll\Domain\Model;

/**
 * Class Response
 *
 * @package MOC\MocPoll\Domain\Model
 */
class Response extends ResponseBase {

	/**
	 * Constructer
	 */
	public function __construct() {
		$this->count = 0;
	}

	/**
	 * @return void
	 */
	public function incCount() {
		$this->count++;
	}
}
