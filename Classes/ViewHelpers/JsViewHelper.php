<?php
class Tx_MocPoll_ViewHelpers_JsViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper{
  function render(){
    $GLOBALS['TSFE']->pSetup['includeJSFooter.']['poll_init'] = $this->getExtensionRealPath().'Resources/Public/Js/init.js';
    return "Hello, View";
  }

  protected function getExtensionRealPath(){
    return '/'.t3lib_extMgm::siteRelPath($this->getExtensionDirName());
  }

  protected function getExtensionDirName(){
    return t3lib_div::camelCaseToLowerCaseUnderscored('moc_poll');
  }
}