<?php

class main extends api
{
  protected function Reserve()
  {
    return array(
    //  "error" => "Test function call",
    // If any error returns - all execution breaks.
      "design" => "simple"
      );
  }
  
  protected function _Protected()
  {
    return array("data" => "This function could be reached via REST RPC(over HTTP+JSON), and via local calls");
  }
  
  protected function LocalCall()
  { 
    $test = LoadModule('api', 'main');
    $res = $test->_Protected();
    return array("data" => var_export($res, true));
  }

  public function _Public()
  {
    return "This function unreached via RCP, but could be access with LoadModule. ".
    "Never use include, etc files with api modules, except if you php guru.";
  }
  
  private function _Private()
  {
    return 'This function could be called only directly with "$this" variable';
  }
  
  protected function Complex()
  {
    return array("data" => array("comment" => "complex results returns as array", "istrue" => "yes"));
  }
  
  protected function ComplexCall()
  {
    $test = LoadModule('api', 'main');
    $res = $test->Complex();
    return array("error" => var_export($res, true));
  }
}
