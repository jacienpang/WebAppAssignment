
<?php
use App\Zone;
use App\Floor;
use App\Category;
 ?>


@extends('layouts.app')
@include('directory._filters')
@section('content')
    <div class = "panel-body bg-light">
        {{ Form::open(array('route' => array('directory.group', '$tenants', 'zone_id'))) }}
        <div class = "container-fluid bg-default">
            <table class="table table-borderless">
                <thead>
                    <th scope="col"><strong>ZONE<strong></th>
                    <th scope="col"><strong>FLOOR<strong></th>
                    <th scope="col"><strong>CATEGORY<strong></th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <!-- Zone -->
                            <div>
                                {!! Form::select('zone_id',
                                    Zone::pluck('code', 'id'), null, [
                                        'class' => 'form-control',
                                        'placeholder' => '- Select Zone -',
                                    ] )
                                !!}
                            </div>
                        </td>
                        <td>
                            <!-- Floor -->
                            <div>
                                {!! Form::select('floor_id',
                                    Floor::pluck('code', 'id'), null, [
                                        'class' => 'form-control',
                                        'placeholder' => '- Select Zone -',
                                ]) !!}
                            </div>
                        </td>
                        <td>
                            <!-- Category -->
                            <div>
                                {!! Form::select('category_id',
                                    Category::pluck('name', 'id'), null, [
                                        'class' => 'form-control',
                                        'placeholder' => '- Select Zone -',
                                ]) !!}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    {!! Form::close() !!}
</div>
@if (count($tenants) > 0)
    <div class="card-columns" style="margin: 20px 20px 20px 20px">
        @foreach ($tenants as $i => $tenant)
            <div class="card shadow">
                @if(Storage::disk('public')->exists('tenant/'.$tenant->id.'.jpg'))
                <img src="/storage/tenant/{{$tenant->id}}.jpg"
                width="240" alt= {{ $tenant->name}}>
                @else
                @if(Storage::disk('public')->exists('tenant/'.$tenant->id.'.jpg'))
                <img src="/storage/tenant/{{$tenant->id}}.jpg"
                width="240" alt= {{ $tenant->name}}>
                @else
                <img src="http://www.totalbattery.com/wp-content/uploads/2017/04/Under_construction-300x300.png"
                width="240">
                @endif
                @endif
                <div class="card-body">
                    <h5 class="card-title"> {{ $tenant->name }} </h5>
                    <h6 class="card-subtitle mb-2 text-muted"> {{ $tenant->floor->code."-".$tenant->zone->code."-".$tenant->lot_number }}</h6>
                    <p class="card-text"> {{ $tenant->category->name }} </p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div>
        No records found
    </div>
@endif
@endsection
