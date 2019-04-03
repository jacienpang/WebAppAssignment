
<script src="resources/assets/js/bootstrap-confirmation.js"></script>
<?php

?>
@extends('layouts.appAdmin')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class = "panel-body">
        @if (count($tenants) > 0)
            <table class = "table table-striped task-table">
                <!-- Table Headings -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Shop Name</th>
                        <th>Lot Number</th>
                        <th>Zone</th>
                        <th>Floor</th>
                        <th>Category</th>
                        <th>Owner Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($tenants as $i => $tenant)
                        <tr>

                            <td class = "table-text">
                                <div>{{ $i+1 }}</div>
                            </td>


                            <td class = "table-text">
                                <div>
                                    {!! link_to_route(
                                        'tenant.show',
                                        $title = $tenant->shop_name,
                                        $parameters = [
                                            'id' => $tenant->id,
                                        ]
                                    ) !!}
                                </div>
                            </td>


                            <td class = "table-text">
                                <div>{{ $tenant->lot_number }}</div>
                            </td>


                            <td class = "table-text">
                                <div>{{ $tenant->zone->code }}</div>
                            </td>


                            <td class = "table-text">
                                <div>{{ $tenant->floor->code }}</div>
                            </td>


                            <td class = "table-text">
                                <div>{{ $tenant->category->name }}</div>
                            </td>


                            <td class = "table-text">
                                <div>{{ $tenant->owner_name }}</div>
                            </td>


                            <td class = "table-text">
                                <div>{{ $tenant->email }}</div>
                            </td>


                            <td class = "table-text">
                                <div>{{ $tenant->phone }}</div>
                            </td>


                            <td class = "table-text">
                                <div>{{ $tenant->created_at }}</div>
                            </td>


                            <td class = "table-text">
                                <div>

                                      {!! link_to_route(
                                          'tenant.edit',
                                          $title = 'Edit',
                                          $parameters = [
                                              'id' => $tenant->id
                                          ]
                                      ) !!}


                                    {!! link_to_route(
                                        'tenant.delete',
                                        $title = 'Delete',
                                        $parameters = [
                                            'id' => $tenant->id
                                        ]
                                    ) !!}
                                </div>
                            </td>
                        </tr>
                      @endforeach
                </tbody>
            </table>
        @else
          <div>
            <div class="container">
              <div class="row justify-content-md-center mt-5">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-center">
                        There is no record found for tenant.
                      </div>
                      <div class="text-center" style="margin: 20px">
                        <a href="{{ url('tenant/create') }}" class="btn btn-dark" role="button">Create A Tenant</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
    </div>
@endsection
