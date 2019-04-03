
<?php

?>
@extends('layouts.appAdmin')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class = "panel-body">
        @if (count($zones) > 0)
            <table class = "table table-striped task-table">
                <!-- Table Headings -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Zone Code</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($zones as $i => $zone)
                        <tr>
                            <td class = "table-text">
                                <div>{{ $i+1 }}</div>
                            </td>
                            <td class = "table-text">
                                <div>
                                    {!! link_to_route(
                                        'zone.show',
                                        $title = $zone->code,
                                        $parameters = [
                                            'id' => $zone->id,
                                        ]
                                    ) !!}
                                </div>
                            </td>
                            <td class = "table-text">
                                <div>{{ $zone->created_at }}</div>
                            </td>
                            <td class = "table-text">
                                <div>
                                    {!! link_to_route(
                                        'zone.edit',
                                        $title = 'Edit',
                                        $parameters = [
                                            'id' => $zone->id
                                        ]
                                    ) !!}

                                    {!! link_to_route(
                                        'zone.delete',
                                        $title = 'Delete',
                                        $parameters = [
                                            'id' => $zone->id
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
                          There is no record found for zone.
                        </div>
                        <div class="text-center" style="margin: 20px">
                          <a href="{{ url('zone/create') }}" class="btn btn-dark" role="button">Create A Zone</a>
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
