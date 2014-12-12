<?php

class StoreController extends BaseController {

  public function showList()
  {
    $stores = Store::with('company')->paginate(50);
    return View::make('stores')->with('stores', $stores);
  }

}
