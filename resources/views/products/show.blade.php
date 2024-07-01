<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Laravel Crud</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light" href="/">Products</a>
        </li>
      </ul>
  </div>
</nav>
<div class="container">
<div class="text-right">
  <a href="products/create" class="btn btn-dark mt-5">New product</a>
</div>
</div>
  <div class="container mt-5">
    <div class="row">
      <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Size</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($getProduct as $product)
    <tr>
      <th>{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->size}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->category}}</td>
      <td>{{$product->description}}</td>
      <td>@foreach(json_decode($product->images) as $img)
        <!-- <img src="{{url('/images/'.$img)}}" alt="Image" width="20px" height="20px" /> -->
        <a target="_blank" href="{{url('/images/'.$img)}}">{{$img}}</a><br>
        @endforeach
      </td>
      <td>{{$product->created_at}}</td>
      <td>
        @if($product->deleted_at == NULL)
          <a href="products/{{$product->id}}/edit" class="btn btn-primary">Edit</a>
           <a href="{{route('products.archive',$product->id)}}" class="btn btn-danger">Archive</a>
        @else
          <a href="{{route('products.restore',$product->id)}}" class="btn btn-warning">Restore</a>
        @endif
      </td>
   </tr>
   @empty
   <td>No Products found!</td>

   @endforelse
  </tbody>
</table>
          </div>
        </div>
</body>
</html>
