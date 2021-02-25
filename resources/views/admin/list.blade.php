@extends('admin.index')
@section('content')
<div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <h2 class="d-flex justify-content-center">admin pages</h2>
        <table class="table table-hover table-bordered">
          <thead>
            <tr class="text-center">
              <th scope="col" class="">#</th>
              <th scope="col" class="">Name</th>
              <th scope="col" class="">type</th>
              <th scope="col" class="">description</th>
              <th scope="col" class="">unit_price</th>
              <th scope="col" class="">promotion_price</th>
              <th scope="col" class="">image</th>
              <th scope="col" class="">unit</th>
              <th scope="col" class="">new</th>
              <th scope="col" class="">created_at</th>
              <th scope="col" class="">updated_at</th>
              <th scope="col" class="">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($list_product as $list)
            <tr class="text-center">
              <th scope="row">{{$list->id}}</th>
              <td>{{$list->name}}</td>
              <td>{{$list->id_type}}</td>
              <td>{{$list->description}}</td>
              <td>{{$list->unit_price}}</td>
              <td>{{$list->promotion_price}}</td>
              <td>{{$list->image}}</td>
              <td>{{$list->unit}}</td>
              <td>{{$list->new}}</td>
              <td>{{$list->created_at}}</td>
              <td>{{$list->updated_at}}</td>
              <td class="d-flex align-items-center justify-content-around">
                <form action="{{ route('get.detail.admin',$list->id) }}" method="get">
                  <button class="btn btn-sm btn-primary rounded-0">
                    Show
                  </button>
                </form>
                <form action="" method="get">
                  <button class="btn btn-sm btn-warning rounded-0">
                    Edit
                  </button>
                </form>
                <form action="{{ route('get.delete.admin',$list->id) }}" method="POST"> 
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="delete">
                  <button class="btn btn-sm btn-danger rounded-0">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">{{ $list_product->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection