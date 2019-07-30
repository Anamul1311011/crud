@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
            Edit Product
          </div>
          <div class="card-body">
            <form action="{{ url('/product/update') }}" method="post" >
              @csrf
              <div class="form-group">
                <label>Product Name</label>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" value="{{ $product->product_name }}">
              </div>
              <div class="form-group">
                <label>Product Price</label>
                <input type="text" class="form-control" placeholder="Enter Product Price" name="product_price" value="{{ $product->product_price }}">
              </div>
              <div class="form-group">
                <label>Product Quantity</label>
                <input type="text" class="form-control" placeholder="Enter Product Quantity" name="product_quantity" value="{{ $product->product_quantity }}">
              </div>

              <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <br>
            @if ($errors->all())
              <div class="alert alert-danger">
                @foreach ($errors->all() as $value)
                  <li>{{ $value }}</li>
                @endforeach
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
