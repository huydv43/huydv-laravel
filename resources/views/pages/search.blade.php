@extends('master')
@section('content')
<div class="beta-products-list">
    <h4>Sản Phẩm Mới</h4>
    <div class="beta-products-details">
        <p class="pull-left">Tìm Thấy {{count($search)}} Sản Phẩm</p>
        <div class="clearfix"></div>
    </div>

    <div class="row">
        @foreach($search as $item)
        <div class="col-sm-3">
            <div class="single-item">
                @if ($item->promotion_price != 0)
                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div>
                </div>
                @endif
                <div class="single-item-header">
                    <a href="{{route('chitietsanpham',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt="" height="250px"></a>
                </div>
                <div class="single-item-body">
                    <p class="single-item-title">{{$item->name}}</p>
                    <p class="single-item-price" style="font-size: 18px">
                    @if($item->promotion_price == 0)
                        <span class="flash-sale">{{$item->unit_price}} VND</span>
                    @else
                        <span class="flash-del">{{number_format($item->unit_price)}}</span>
                        <span class="flash-sale">{{number_format($item->promotion_price)}} VND</span>
                    @endif
                    </p>

                </div>
                <div class="single-item-caption">
                    <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <a class="beta-btn primary" href="{{route('chitietsanpham',$item->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- <div class="d-flex justify-content-center">{{ $search->links() }}</div> --}}
</div> <!-- .beta-products-list -->
@endsection