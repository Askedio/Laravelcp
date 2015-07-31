<?php

namespace Askedio\Laravelcp\Helpers;

class SearchHelper{
	static public $tables;

  public static function Initialize(){
    if(!self::$tables) self::$tables=collect();
  }

  public static function Add($data){
    self::$tables->push($data);
  }

  static public function Query($string){
    $results=[];
    foreach(self::$tables as $data){
      $query=$data['model']::limit('100');
      $i = 0;
      foreach($data['columns'] as $column){
        $i == 0 ? 
          $query->where($column, 'LIKE', '%'.$string.'%') :
          $query->orWhere($column, 'LIKE', '%'.$string.'%');
        $i++;
      }

      $results[$data['var']] = $query->count() > 0 ? $query->get() : false;
      return $results;
    }
  }
}