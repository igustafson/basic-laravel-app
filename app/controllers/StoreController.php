<?php

class StoreController extends BaseController {

  public function showList()
  {
    $list_filters = array();

    $stores = Store::with('company');

    $company_id = Input::get('company_id', 'all');
    if ($company_id != 'all') {
      $stores->where('company_id', '=', $company_id);
      $list_filters['company_id'] = $company_id;
    }
    else {
      $list_filters['company_id'] = 'all';
    }

    $stores = $stores->paginate(50);

    $company_options = array();
    foreach (Company::all() as $company) {
      $company_options[$company->id] = $company->name;
    }

    return View::make('stores')->with(array(
      'stores' => $stores,
      'company_options' => $company_options,
      'list_filters' => $list_filters
    ));
  }

}
