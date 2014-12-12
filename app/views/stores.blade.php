@extends('layout')

@section('content')

    <h2>Stores</h2>

    <nav class="navbar navbar-default">
      <div class="fluid">
        {{ Form::open(array('action' => 'StoreController@showList', 'method' => 'get', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
          {{ Form::label('company_id', 'Company') }}
          {{ Form::select('company_id', array('all' => '- All -')+$company_options, $list_filters['company_id']) }}
          {{ Form::label('city', 'City') }}
          {{ Form::text('city', $list_filters['city']) }}
          {{ Form::label('address', 'Address') }}
          {{ Form::text('address', $list_filters['address']) }}
          {{ Form::submit('Apply Filters') }}
        {{ Form::close() }}
      </div>
    </nav>

    <div class="text-center">{{ $stores->appends(Input::except(array('page')))->links() }}</div>

    <table class="table table-striped">

      <thead>
        <tr>
          <th>Company Name</th>
          <th>
            @if ($sort_field == 'address' && $sort_order == 'asc')
              <span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
              {{
                link_to_action(
                  'StoreController@showList',
                  'Address',
                  array(
                    'sort_field' => 'address',
                    'sort_order' => 'desc'
                  )+Input::except(array('sort_field','sort_order')),
                  array('class'=>'asc')
                )
              }}
            @elseif ($sort_field == 'address')
              <span class="glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>
              {{
                link_to_action(
                  'StoreController@showList',
                  'Address',
                  array(
                    'sort_field' => 'address',
                    'sort_order' => 'asc'
                  )+Input::except(array('sort_field','sort_order')),
                  array('class'=>'desc')
                )
              }}
            @else {{
              link_to_action(
                'StoreController@showList',
                'Address',
                array(
                  'sort_field' => 'address',
                  'sort_order' => 'asc'
                )+Input::except(array('sort_field','sort_order'))
              )
            }}
            @endif
          </th>
          <th>
            @if ($sort_field == 'city' && $sort_order == 'asc')
              <span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
              {{
                link_to_action(
                  'StoreController@showList',
                  'City',
                  array(
                    'sort_field' => 'city',
                    'sort_order' => 'desc'
                  )+Input::except(array('sort_field','sort_order')),
                  array('class'=>'asc')
                )
              }}
            @elseif ($sort_field == 'city')
              <span class="glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>
              {{
                link_to_action(
                  'StoreController@showList',
                  'City',
                  array(
                    'sort_field' => 'city',
                    'sort_order' => 'asc'
                  )+Input::except(array('sort_field','sort_order')),
                  array('class'=>'desc')
                )
              }}
            @else {{
              link_to_action(
                'StoreController@showList',
                'City',
                array(
                  'sort_field' => 'city',
                  'sort_order' => 'asc'
                )+Input::except(array('sort_field','sort_order'))
              )
            }}
            @endif
          </th>
          <th>
            @if ($sort_field == 'state' && $sort_order == 'asc')
              <span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
              {{
                link_to_action(
                  'StoreController@showList',
                  'State',
                  array(
                    'sort_field' => 'state',
                    'sort_order' => 'desc'
                  )+Input::except(array('sort_field','sort_order')),
                  array('class'=>'asc')
                )
              }}
            @elseif ($sort_field == 'state')
              <span class="glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>
              {{
                link_to_action(
                  'StoreController@showList',
                  'State',
                  array(
                    'sort_field' => 'state',
                    'sort_order' => 'asc'
                  )+Input::except(array('sort_field','sort_order')),
                  array('class'=>'desc')
                )
              }}
            @else {{
              link_to_action(
                'StoreController@showList',
                'State',
                array(
                  'sort_field' => 'state',
                  'sort_order' => 'asc'
                )+Input::except(array('sort_field','sort_order'))
              )
            }}
            @endif
          </th>
          <th>
            @if ($sort_field == 'postal_code' && $sort_order == 'asc')
              <span class="glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
              {{
                link_to_action(
                  'StoreController@showList',
                  'Zip Code',
                  array(
                    'sort_field' => 'postal_code',
                    'sort_order' => 'desc'
                  )+Input::except(array('sort_field','sort_order')),
                  array('class'=>'asc')
                )
              }}
            @elseif ($sort_field == 'postal_code')
              <span class="glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>
              {{
                link_to_action(
                  'StoreController@showList',
                  'Zip Code',
                  array(
                    'sort_field' => 'postal_code',
                    'sort_order' => 'asc'
                  )+Input::except(array('sort_field','sort_order')),
                  array('class'=>'desc')
                )
              }}
            @else {{
              link_to_action(
                'StoreController@showList',
                'Zip Code',
                array(
                  'sort_field' => 'postal_code',
                  'sort_order' => 'asc'
                )+Input::except(array('sort_field','sort_order'))
              )
            }}
            @endif
          </th>
        </tr>
      </thead>

      <tbody>
      @forelse($stores as $store)
        <tr>
          <td>{{{ is_null($store->company) ? '' : $store->company->name }}}</td>
          <td>{{{ $store->address }}}</td>
          <td>{{{ $store->city }}}</td>
          <td>{{{ $store->state }}}</td>
          <td>{{{ $store->postal_code }}}</td>
        </tr>
      @empty
        <tr>
          <td colspan="0">No stores found</td>
        </tr>
      @endforelse
      </tbody>>

    </table>

    <div class="text-center">{{ $stores->appends(Input::except(array('page')))->links() }}</div>

@stop