@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($product as $p)
                        <li><a href="{{route('loaisanpham')}}">{{$p->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Sản Phẩm Mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm Thấy {{count($type_product)}} Sản Phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($type_product as $type_item)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if ($type_item->promotion_price != 0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif 
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="source/image/product/{{$type_item->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$type_item->name}}</p>
                                        <p class="single-item-price">
                                            @if ($type_item->promotion_price == 0)
                                                <span class="flash-del">{{number_format($type_item->unit_price)}} VND</span>
                                            @else
                                                <span class="flash-del">{{number_format($type_item->unit_price)}} VND</span>
                                                <span class="flash-sale">{{number_format($type_item->promotion_price)}} VND</span>
                                            @endif                                     
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div> <!-- .beta-products-list -->
                    <div class="d-flex justify-content-center">{{ $type_product->links() }}</div>
                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản Phẩm Khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left"> Tìm Thấy{{count($other_product)}} Sản Phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($other_product as $other)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if ($other->promotion_price != 0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="source/image/product/{{$other->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$other->name}}</p>
                                        <p class="single-item-price">
                                            @if ($other->promotion_price == 0)
                                                <span class="flash-del>{{number_format($other->unit_price)}} VND</span>
                                                @else
                                                <span class="flash-del">{{number_format($other->unit_price)}} VND</span>
                                                <span class="flash-sale">{{number_format($other->promotion_price)}} VND</span>
                                            @endif
                                            
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <div class="d-flex justify-content-center">{{ $type_product->links() }}</div>
                        <div class="space40">&nbsp;</div>
                        
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection