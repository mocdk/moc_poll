<?php
namespace MOC\MocPoll\ViewHelpers;
/**
 * Class PercentViewHelper
 *
 * @package MOC\MocPoll\ViewHelpers
 */
class PercentViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @param integer $total
	 * @param integer $issueCount
	 * @return float
	 */
	public function render($total, $issueCount) {
		return round($issueCount / $total * 100);
	}
}