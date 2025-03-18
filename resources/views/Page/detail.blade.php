@extends('master')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$product->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('homepage') }}">Home</a> / <span>Details</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="/source/image/product/{{$product->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <h2 class="single-item-title">{{$product->name}}</h2>
                            <p class="single-item-price" style="text-align:left;font-size: 15px;">
                                @if($product->promotion_price == 0)
                                    <span class="flash-sale">{{number_format($product->unit_price)}} Đồng</span>
                                @else
                                    <span class="flash-del">{{number_format($product->unit_price)}} Đồng</span>
                                    <span class="flash-sale">{{number_format($product->promotion_price)}} Đồng</span>
                                @endif
                            </p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <div class="single-item-desc">
                            <p>{{$product->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <p>Số lượng:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="color">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="/themgiohang/{{$product->id}}">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-comment">Comments</a></li>
                    </ul>
                    <div class="panel" id="tab-description">
                        <p>Product description content goes here...</p>
                    </div>
                    <div class="panel" id="tab-comment">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <form method="post" action="/comment/{{$product->id}}">
                                            @csrf
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" required></textarea>
                                            </div>
                                            <button type="submit" class="beta-btn primary">Bình luận</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($comments))
                            @foreach($comments as $comment)
                                <p class="border-bottom">
                                    <b class="pull-left">{{$comment->username}}</b>
                                    <p>{{$comment->comment}}</p>
                                </p>
                            @endforeach
                            <div class="row">{{$comments->links("pagination::bootstrap-4")}}</div>
                        @else
                            <p>Chưa có bình luận nào cả!</p>
                        @endif
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Related Products</h4>
                    <div class="row">
                        @foreach($related_products as $sp)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('product.detail', ['id' =>$sp->id]) }}">
                                            <img src="/source/image/product/{{$sp->image}}" alt="">
                                        </a>
                                    </div>
                                    @if($sp->promotion_price != 0)
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>
                                    @endif
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sp->name}}</p>
                                        <p class="single-item-price" style="text-align:left;font-size: 15px;">
                                            @if($sp->promotion_price == 0)
                                                <span class="flash-sale">{{number_format($sp->unit_price)}} Đồng</span>
                                            @else
                                                <span class="flash-del">{{number_format($sp->unit_price)}} Đồng</span>
                                                <span class="flash-sale">{{number_format($sp->promotion_price)}} Đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="/themgiohang/{{$sp->id}}">
                                            <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <a class="beta-btn primary" href="{{ route('product.detail', ['id' =>$sp->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">{{$related_products->links("pagination::bootstrap-4")}}</div>
                </div>
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="#">
                                    <img src="{{asset('source/assets/dest/images/products/sales/1.png')}}" alt="">
                                </a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <!-- Additional best sellers can be added here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
