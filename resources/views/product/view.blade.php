@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            @if (session('successdelete'))
              <div class="alert alert-info">
                {{ session('successdelete') }}
              </div>
            @endif
             Product List
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
              </thead>
              @foreach ($products as $product)
                <tr>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->product_price }}</td>
                  <td>{{ $product->product_quantity }}</td>
                  <td>{{ $product->created_at->format('d/m/y H:i:s A') }} <br> {{ $product->created_at->diffForHumans() }}</td>
                  <td>{{ $product->updated_at ? $product->updated_at->diffForHumans():"Not Yet" }}</td>
                  <td> <a class="btn btn-danger" href="{{ url('product/delete') }}/{{ $product->id }}"> <span style="color:white">Delete</span> </a> |
                   <a class="btn btn-info" href="{{ url('product/edit') }}/{{ $product->id }}"> <span style="color:white">Edit</span> </a> </td>
                </tr>
              @endforeach

            </table>
            {{ $products->links() }}
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
            Add Product
          </div>
          <div class="card-body">
            <form action="{{ url('/product/insert') }}" method="post" >
              @csrf
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" value="{{ old('product_name') }}">
              </div>
              <div class="form-group">
                <label>Product Price</label>
                <input type="text" class="form-control" placeholder="Enter Product Price" name="product_price" value="{{ old('product_price') }}">
              </div>
              <div class="form-group">
                <label>Product Quantity</label>
                <input type="text" class="form-control" placeholder="Enter Product Quantity" name="product_quantity" value="{{ old('product_quantity') }}">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
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
