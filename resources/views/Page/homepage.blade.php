@extends('master')
@section('content')
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            @foreach($slide as $slIndex => $sl)
                <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $slIndex }}" class="{{ $slIndex == 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>
        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            @foreach($slide as $slIndex => $sl)
                <div class="carousel-item {{ $slIndex == 0 ? 'active' : '' }}">
                    <img src="{{ asset('source/image/slide/'.$sl->image) }}" alt="Bánh" class="d-block w-100" style="height: 500px">
                </div>
            @endforeach
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- New Products Section -->
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($new_product)}} styles found</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($new_product as $new)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="{{ route('product.detail', ['id' =>$new->id]) }}">
                                                    <img width="200" height="200"
                                                         src="/source/image/product/{{$new->image}}" alt="">
                                                </a>
                                            </div>
                                            @if($new->promotion_price != 0)
                                                <div class="ribbon-wrapper position-absolute top-0 start-0 translate-middle" style="width: 100px; height: 100px; overflow: hidden;">
                                                    <div class="ribbon sale text-white fw-bold px-3 py-1" style="position: absolute; top: 20px; left: -25px; transform: rotate(-45deg); box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);">
                                                        SALE
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$new->name}}</p>
                                                <p class="single-item-price" style="text-align:left;font-size: 15px;">
                                                    @if($new->promotion_price == 0)
                                                        <span class="flash-sale">{{number_format($new->unit_price)}} Đồng</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($new->unit_price)}} Đồng</span>
                                                        <span class="flash-sale">{{number_format($new->promotion_price)}} Đồng</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="themgiohang/{{$new->id}}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <a class="add-to-wishlist" href="wishlist/add/{{$new->id}}">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="beta-btn primary" href="/detail/{{$new->id}}">Details <i
                                                            class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{$new_product->links("pagination::bootstrap-4")}}</div>
                        </div>
                        @if(isset($researsSearch))
                            <div class="beta-products-list">
                                <h4>Search results</h4>
                                <div class="beta-products-details">
                                    <p class="pull-left">{{count($resultsSearch)}} styles found</p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    @foreach($resultsSearch as $each)
                                        <div class="col-sm-3">
                                            <div class="single-item">
                                                <div class="single-item-header">
                                                    <a href="{{ route('product.detail', ['id' =>$each->id]) }}">
                                                        <img width="200" height="200"
                                                             src="/source/image/product/{{$each->image}}" alt="">
                                                    </a>
                                                </div>
                                                @if($each->promotion_price != 0)
                                                    <div class="ribbon-wrapper position-absolute top-0 start-0 translate-middle" style="width: 100px; height: 100px; overflow: hidden;">
                                                        <div class="ribbon sale text-white fw-bold px-3 py-1" style="position: absolute; top: 20px; left: -25px; transform: rotate(-45deg); box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);">
                                                            SALE
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="single-item-body">
                                                    <p class="single-item-title">{{$each->name}}</p>
                                                    <p class="single-item-price" style="text-align:left;font-size: 15px;">
                                                        @if($each->promotion_price == 0)
                                                            <span class="flash-sale">{{number_format($each->unit_price)}} Đồng</span>
                                                        @else
                                                            <span class="flash-del">{{number_format($each->unit_price)}} Đồng</span>
                                                            <span class="flash-sale">{{number_format($each->promotion_price)}} Đồng</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="single-item-caption">
                                                    <a class="add-to-cart pull-left" href="themgiohang/{{$each->id}}">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                    <a class="add-to-wishlist" href="wishlist/add/{{$each->id}}">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="beta-btn primary" href="/detail/{{$each->id}}">Details <i
                                                            class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">{{$new_product->links("pagination::bootstrap-4")}}</div>
                            </div>
                        @endif
                        <div class="space50">&nbsp;</div>

                        <!-- Top Products Section -->
                        <div class="beta-products-list">
                            <h4>Top Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($promotion_product)}} founded</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($promotion_product as $km)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="">
                                                    <img width="200" height="200"
                                                         src="/source/image/product/{{$km->image}}" alt="">
                                                </a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$km->name}}</p>
                                                <p class="single-item-price" style="text-align:left;font-size: 15px;">
                                                    @if($km->promotion_price == 0)
                                                        <span class="flash-sale">{{number_format($km->unit_price)}} Đồng</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($km->unit_price)}} Đồng</span>
                                                        <span class="flash-sale">{{number_format($km->promotion_price)}} Đồng</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="themgiohang//{{$km->id}}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <a class="add-to-wishlist" href="wishlist/add/{{$km->id}}">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="beta-btn primary" href="{{ route('product.detail', ['id' =>$km->id]) }}">Details <i
                                                            class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{$promotion_product->links("pagination::bootstrap-4")}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
