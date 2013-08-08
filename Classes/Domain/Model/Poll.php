<?php
namespace MOC\MocPoll\Domain\Model;

/**
 * Class Poll
 *
 * @package MOC\MocPoll\Domain\Model
 */
class Poll extends PollBase {

	/**
	 * @return int
	 */
	public function getTotalCount() {
		$count = 0;
		foreach ($this->getResponses() as $response) {
			$count += $response->getCount();
		}
		return $count;
	}
}
