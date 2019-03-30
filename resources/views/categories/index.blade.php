<?php

?>
@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class = "panel-body">
        @if (count($categories) > 0)
            <table class = "table table-striped task-table">
                <!-- Table Headings -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Category Name</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($categories as $i => $category)
                        <tr>
                            <td class = "table-text">
                                <div>{{ $i+1 }}</div>
                            </td>
                            <td class = "table-text">
                                <div>
                                    {!! link_to_route(
                                        'category.show',
                                        $title = $category->name,
                                        $parameters = [
                                            'id' => $category->id,
                                        ]
                                    ) !!}
                                </div>
                            </td>
                            <td class = "table-text">
                                <div>{{ $category->created_at }}</div>
                            </td>
                            <td class = "table-text">
                                <div>
                                    {!! link_to_route(
                                        'category.edit',
                                        $title = 'Edit',
                                        $parameters = [
                                            'id' => $category->id
                                        ]
                                    ) !!}

                                    {!! link_to_route(
                                        'category.delete',
                                        $title = 'Delete',
                                        $parameters = [
                                            'id' => $category->id
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
