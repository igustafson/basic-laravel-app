<?php

class Store extends Eloquent {

  public function company()
  {
    return $this->belongsTo('Company');
  }

  public function scopeSearchByCity($query, $search_string)
  {
    return $query->where('city', 'LIKE', $search_string);
  }

  public function scopeSearchByAddress($query, $search_string)
  {
    return $query->where('address', 'LIKE', '%'.$search_string.'%');
  }

}