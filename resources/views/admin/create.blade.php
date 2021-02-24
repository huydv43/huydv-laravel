@extends('admin.index')
@section('content')
<div class="container mt-3">
    <div class="d-flex flex-row">
      <div class="col-12 px-0">
        <form action="{{ route('post.create.admin') }}" method="post"  enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="name">Tên Bánh</label>
            <input type="text" class="form-control rounded-0" id="name" placeholder="Name" name="name">
          </div>

          <div >
            <label for="inputState">Loại Bánh</label>
                <select id="inputState" class="form-control" name="id_type">
                <option selected>Chọn loại bánh</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                </select>
          </div>

            <div class="form-group ">
                <label class="text-uppercase font-weight-bold" for="description">Mô Tả Sản Phẩm</label>
                <input type="text" class="form-control rounded-0" id="description" placeholder="description" name="description">
          </div>

          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="description">Giá Sản Phẩm</label>
            <input type="text" class="form-control rounded-0" id="description" placeholder="unit_price" name="unit_price">
          </div>

          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="description">Giá Khuyến Mãi</label>
            <input type="text" class="form-control rounded-0" id="description" placeholder="promotion_price" name="promotion_price">
          </div>

          <div class="form-group col-md-2">
            <label for="inputState">Đơn Vị</label>
            <select id="inputState" class="form-control">
              <option selected>chọn đơn vị</option>
              <option>hộp</option>
              <option>cái</option>
            </select>
          </div>
             </div>
      
                
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $message }}</strong>
                  </div>
                  <img src="images/{{ Session::get('image') }}">
                  @endif


                 <div class="col-md-12">
                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif 
                    <div class="row">
                      <div class="col-md-8">
                          <input type="file" name="fimage" class="form-control">
                      </div>
                  </div>

            <div class="form-group">
            <button type="submit" class="btn btn-primary">CREATE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection