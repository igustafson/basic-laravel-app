@extends('layout')

@section('content')

    <h2>Stores</h2>

    {{ Form::open(array('action' => 'StoreController@showList', 'method' => 'get')) }}
      {{ Form::label('company_id', 'Company') }}
      {{ Form::select('company_id', array('all' => '- All -')+$company_options, $list_filters['company_id']) }}
      {{ Form::label('city', 'Search by City') }}
      {{ Form::text('city', $list_filters['city']) }}
      {{ Form::label('address', 'Search by Address') }}
      {{ Form::text('address', $list_filters['address']) }}
      {{ Form::submit('Apply Filters') }}
    {{ Form::close() }}

    <table>

      <thead>
        <tr>
          <th>Company Name</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
          <th>Zip Code</th>
        </tr>
      </thead>

      <tbody>
      @forelse($stores as $store)
        <tr>
          <td>{{{ is_null($store->company) ? '' : $store->company->name }}}</td>
          <td>{{{ str_limit($store->address, 50) }}}</td>
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

    {{ $stores->appends(Input::except(array('page')))->links() }}

@stop