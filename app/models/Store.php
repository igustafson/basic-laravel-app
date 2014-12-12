<?php

class Store extends Eloquent {

  public function company()
  {
    return $this->belongsTo('Company');
  }

}