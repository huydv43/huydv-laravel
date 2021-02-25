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
            <tr class="text-center">
              <th scope="row">{{$detail->id}}</th>
              <td>{{$detail->name}}</td>
              <td>{{$detail->id_type}}</td>
              <td>{{$detail->description}}</td>
              <td>{{$detail->unit_price}}</td>
              <td>{{$detail->promotion_price}}</td>
              <td>{{$detail->image}}</td>
              <td>{{$detail->unit}}</td>
              <td>{{$detail->new}}</td>
              <td>{{$detail->created_at}}</td>
              <td>{{$detail->updated_at}}</td>
              <td class="d-flex align-items-center justify-content-around">
                <form action="{{ route('get.detail.admin',$detail->id) }}" method="get">
                  <button class="btn btn-sm btn-primary rounded-0">
                    Show
                  </button>
                </form>
                <form action="" method="get">
                  <button class="btn btn-sm btn-warning rounded-0">
                    Edit
                  </button>
                </form>
                <form action="" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="_method" value="delete">
                  <button class="btn btn-sm btn-danger rounded-0">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
@endsection