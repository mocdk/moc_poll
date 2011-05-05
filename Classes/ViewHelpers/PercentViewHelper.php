<?php
class Tx_MocPoll_ViewHelpers_PercentViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
	 * @param int $total
	 * @param int $response
	 */
	function render($total, $issueCount){
		return round($issueCount / $total * 100);
	}
}