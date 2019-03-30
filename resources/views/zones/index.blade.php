<?php

?>
@extends('layouts.app')

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
                No records found
            </div>
        @endif
    </div>
@endsection
