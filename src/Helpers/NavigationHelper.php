<?php

namespace Askedio\Laravelcp\Helpers;

class NavigationHelper{
	static public $nav;

  public static function Add($data){
    if(!self::$nav) self::$nav=collect();
    self::$nav->push($data);
  }

}