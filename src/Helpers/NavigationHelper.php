<?php

namespace Askedio\Laravelcp\Helpers;

class NavigationHelper{
	static public $nav;

  public static function Initialize(){
    if(!self::$nav) self::$nav=collect();
  }

  public static function Add($data){
    self::$nav->push($data);
  }

}