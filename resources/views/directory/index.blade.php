
@extends('layouts.app')

@section('content')

@if (count($tenants) > 0)
    <div class = "row">
        @foreach ($tenants as $i => $tenant)
            <div class="column">
                <div class="card" style="margin: 20px 20px 20px 20px">
                    <img class="card-img-top" style="width:100%" src="https://www.aucklandairport.co.nz/-/media/Images/Traveller/Retail/Stores/Store-Main-Images/Adidas.ashx?mw=1300&hash=A76FE9990B9D3A83358256755B0823BDA9727D55" alt="Card image cap">
                    <div class="container" style="width:100%">
                        <h5 class="card-title"> {{ $tenant->name }} </h5>
                        <h6 class="card-subtitle mb-2 text-muted"> {{ $tenant->floor->code."-".$tenant->zone->code."-".$tenant->lot_number }}</h6>
                        <p class="card-text"> {{ $tenant->category->name }} </p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
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
