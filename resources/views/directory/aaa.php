@foreach ($tenants as $i => $tenant)
    <div class="card">
        <img class="card-img-top" src="https://www.aucklandairport.co.nz/-/media/Images/Traveller/Retail/Stores/Store-Main-Images/Adidas.ashx?mw=1300&hash=A76FE9990B9D3A83358256755B0823BDA9727D55" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"> {{ $tenant->name }} </h5>
            <h6 class="card-subtitle mb-2 text-muted"> {{ $tenant->floor->code."-".$tenant->zone->code."-".$tenant->lot_number }}</h6>
            <p class="card-text"> {{ $tenant->category->name }} </p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
@endforeach


<h1>Masonry - Initialize in HTML</h1>

<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 160 }'>
  <div class="grid-item"></div>
  <div class="grid-item grid-item--width2 grid-item--height2"></div>
  <div class="grid-item grid-item--height3"></div>
  <div class=""></div>
  <div class="grid-item grid-item--width3"></div>
  <div class="grid-item"></div>
  <div class="grid-item"></div>
  <div class="grid-item grid-item--height2"></div>
  <div class="grid-item grid-item--width2 grid-item--height3"></div>
  <div class="grid-item"></div>
  <div class="grid-item grid-item--height2"></div>
  <div class="grid-item"></div>
  <div class="grid-item grid-item--width2 grid-item--height2"></div>
  <div class="grid-item grid-item--width2"></div>
  <div class="grid-item"></div>
  <div class="grid-item grid-item--height2"></div>
  <div class="grid-item"></div>
  <div class="grid-item"></div>
  <div class="grid-item grid-item--height3"></div>
  <div class="grid-item grid-item--height2"></div>
  <div class="grid-item"></div>
  <div class="grid-item"></div>
  <div class="grid-item grid-item--height2"></div>
</div>
