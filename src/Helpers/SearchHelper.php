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

      $query->count() > 0 ? $results[$data['var']] =  array_merge($data, ['results' => $query->get()->toArray()]) : null;
      return $results;
    }
  }
}