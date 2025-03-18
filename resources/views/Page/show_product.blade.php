<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/vendors/colorbox/example3/colorbox.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/settings.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/responsive.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/css/animate.css') }}">
	<link rel="stylesheet" title="style" href="{{ asset('source/assets/dest/css/huong-style.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/style.css') }}">
</head>
<body>
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-3">
                <div class="single-item">
                    <div class="single-item-header">
                        <a href="product"><img src="{{ asset('source/image/product/'.$product->image) }}" alt=""></a>
                    </div>
                    <div class="single-item-body">
                        <p class="single-item-title">{{ $product->name}}</p>
                        <p class="single-item-price">
                            <span style="">{{ $product->description}}</span>
                        </p>
                        <p class="single-item-price">
                            <span>{{ $product->unit_price}}</span>
                        </p>
                    </div>
                    <div class="single-item-caption">
                        <a class="add-to-cart pull-left" href="shopping_cart"><i class="fa fa-shopping-cart"></i></a>
                        <a class="beta-btn primary" href="product">Details <i class="fa fa-chevron-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>