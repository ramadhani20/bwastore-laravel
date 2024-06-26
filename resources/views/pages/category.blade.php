@extends('layouts.app')
@section('title','Store Category Page')
@section('content')
<div class="page-content page-home">
    <section class="store-trend-categories">
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h5>All Categories</h5>
          </div>
        </div>
        <div class="row">
            @forelse ($categories as $category)
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{$aos+=100}}">
                <a href="{{route('category.detail', $category->slug)}}" class="components-categories d-block">
                    <div class="categories-images">
                        <img src="{{Storage::url($category->photo)}}" alt="" class="w-100"/>
                    </div>
                    <p class="categories-text ">{{$category->name}}</p>
                </a>
            </div>
            @empty
            <div class="col-12 text center py-5" data-aos="fade-up" data-aos-delay="100">
                No Categories Found
            </div>
            @endforelse
        </div>
      </div>
    </section>

    <section class="store-new products">
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h5>All Products</h5>
          </div>
        </div>
        <div class="row">
            @forelse ($products as $product)
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{$aos+=100}}" >
              <a href="#" class="component-products d-block">
                  <div class="products-thumbnail">
                      <div class="products-images" style="
                          @if($product->galleries)
                          background-image: url('{{Storage::url($product->galleries->first()->photos)}}')
                          @else
                          background-color: #eee
                          @endif
                          "></div>
                  </div>
                  <div class="products-text">{{$product->name}}</div>
                  <div class="products-price">{{$product->price}}</div>
              </a>
          </div>
            @empty
              <div class="col-12 text center py-5" data-aos="fade-up" data-aos-delay="100">
              No Categories Found
              </div>
            @endforelse
        </div>
      <div class="row">
        <div class="col-12 mt-4">
            {{$products->links()}}
        </div>
      </div>
    </section>
</div>
@endsection
