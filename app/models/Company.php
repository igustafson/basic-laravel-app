<?php

class Company extends Eloquent {

  public function stores()
  {
    return $this->hasMany('Store');
  }

}