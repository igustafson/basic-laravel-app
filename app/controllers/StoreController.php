<?php

class StoreController extends BaseController {

  public function showList()
  {
    $stores = Store::with('company');

    $list_filters = array();
    $sort = array();

    $company_id = Input::get('company_id', 'all');
    if ($company_id != 'all') {
      $stores->where('company_id', '=', $company_id);
      $list_filters['company_id'] = $company_id;
    }
    else {
      $list_filters['company_id'] = 'all';
    }

    $list_filters['city'] = Input::get('city');
    if ($list_filters['city']) {
      $stores->searchByCity($list_filters['city']);
    }

    $list_filters['address'] = Input::get('address');
    if ($list_filters['address']) {
      $stores->searchByAddress($list_filters['address']);
    }

    $sort_field = Input::get('sort_field');
    $sort_order = Input::get('sort_order', 'asc');
    if ($sort_field) {
      $stores->orderBy($sort_field, $sort_order);
    }

    $stores = $stores->paginate(50);

    $company_options = array();
    foreach (Company::all() as $company) {
      $company_options[$company->id] = $company->name;
    }

    return View::make('stores')->with(array(
      'stores' => $stores,
      'company_options' => $company_options,
      'list_filters' => $list_filters,
      'sort_field' => $sort_field,
      'sort_order' => $sort_order
    ));
  }

}
