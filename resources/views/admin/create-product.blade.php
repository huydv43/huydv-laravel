@extends('admin.home_master')
@section('content')
<div class="container mt-3">
    <div class="d-flex flex-row">
      <div class="col-12 px-0">
        <form action="{{ route('post.create.product') }}" method="post">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="name">name</label>
            <input type="text" class="form-control rounded-0" id="name" placeholder="Name" name="name">
          </div>

          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="id_type">id_type</label>
            <input type="text" class="form-control rounded-0" id="id_type" placeholder="id_type" name="id_type">
          </div>

          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="description">description</label>
            <input type="text" class="form-control rounded-0" id="description" placeholder="description" name="description">
          </div>

          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="description">unit_price</label>
            <input type="text" class="form-control rounded-0" id="description" placeholder="unit_price" name="unit_price">
          </div>

          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="description">promotion_price</label>
            <input type="text" class="form-control rounded-0" id="description" placeholder="promotion_price" name="promotion_price">
          </div>

          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
              <option selected>Choose</option>
              <option>hộp</option>
              <option>cái</option>
            </select>
          </div>
             </div>
      
                <div class="col-md-4">
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $message }}</strong>
                  </div>
                  <img src="images/{{ Session::get('image') }}">
                  @endif
            
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
            
                  <form action="{{ route('post.create.product') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
            
                          <div class="col-md-6">
                              <input type="file" name="image" class="form-control">
                          </div>
             
                          <div class="col-md-6">
                              <button type="submit" class="btn btn-success">Upload</button>
                          </div>
             
                      </div>
                  </form>
            
                </div>
              </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-danger text-uppercase rounded-0 font-weight-bold">
                confirm
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection