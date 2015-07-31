<?php

namespace Askedio\Laravelcp\Helpers;

class HookHelper{
	static public $dash;

  public static function Initialize(){
    if(!self::$dash) self::$dash=collect();
  }

  public static function Add($data){
    self::$dash->push($data);
  }

 

}