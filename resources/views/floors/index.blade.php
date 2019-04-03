<?php

?>
@extends('layouts.appAdmin')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class = "panel-body">
        @if (count($floors) > 0)
            <table class = "table table-striped task-table">
                <!-- Table Headings -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Floor Level Code</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($floors as $i => $floor)
                        <tr>
                            <td class = "table-text">
                                <div>{{ $i+1 }}</div>
                            </td>
                            <td class = "table-text">
                                <div>
                                    {!! link_to_route(
                                        'floor.show',
                                        $title = $floor->code,
                                        $parameters = [
                                            'id' => $floor->id,
                                        ]
                                    ) !!}
                                </div>
                            </td>
                            <td class = "table-text">
                                <div>{{ $floor->created_at }}</div>
                            </td>
                            <td class = "table-text">
                                <div>
                                    {!! link_to_route(
                                        'floor.edit',
                                        $title = 'Edit',
                                        $parameters = [
                                            'id' => $floor->id
                                        ]
                                    ) !!}

                                    {!! link_to_route(
                                        'floor.delete',
                                        $title = 'Delete',
                                        $parameters = [
                                            'id' => $floor->id
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
                        There is no record found for floor.
                      </div>
                      <div class="text-center" style="margin: 20px">
                        <a href="{{ url('floor/create') }}" class="btn btn-dark" role="button">Create A Floor</a>
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
