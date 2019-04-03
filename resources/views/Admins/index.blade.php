@extends('layouts.appAdmin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-9">
                           {!! link_to_route(
                               'zone.create',
                               $title = 'New Zone',
                               $parameters = [],
                               $attributes = array('class' => 'btn btn-default')
                           ) !!}
                        </div>
                        <div class="col-md-9">
                           {!! link_to_route(
                               'floor.create',
                               $title = 'New Floor',
                               $parameters = [],
                               $attributes = array('class' => 'btn btn-default')
                           ) !!}
                        </div>
                        <div class="col-md-9">
                           {!! link_to_route(
                               'category.create',
                               $title = 'New Category',
                               $parameters = [],
                               $attributes = array('class' => 'btn btn-default')
                           ) !!}
                        </div>
                        <div class="col-md-9">
                           {!! link_to_route(
                               'tenant.create',
                               $title = 'New Tenant',
                               $parameters = [],
                               $attributes = array('class' => 'btn btn-default')
                           ) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
