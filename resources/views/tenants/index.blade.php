@include('tenants._filters')

<?php

?>
@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class = "panel-body">
        @if (count($tenants) > 0)
            <table class = "table table-striped task-table">
                <!-- Table Headings -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Lot Number</th>
                        <th>Zone</th>
                        <th>Floor</th>
                        <th>Category</th>
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
                                        $title = $tenant->name,
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
                                <div>{{ $tenant->created_at }}</div>
                            </td>


                            <td class = "table-text">
                                <div>
                                  {!! link_to_route(
                                     'tenant.upload',
                                     $title = 'Upload Photo',
                                     $parameters = [
                                     'id' => $tenant->id,
                                     ]
                                     ) !!}

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
                No records found
            </div>
        @endif
    </div>
@endsection
