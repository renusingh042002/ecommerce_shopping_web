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
<div class="container p-3" style="text-align: center">
  <h1>Edit Products</h1>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <div class="card p-5">
      <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf  
@method('PUT')
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        <div class="mb-3">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$product->name}}">
        </div>
        <div class="mb-3">
          <label>Size</label>
           <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name=size required>
          <option value="">Select</option>
           <option {{$product->size == "XS" ? 'selected' : ''}} value="XS">XS</option>
           <option {{$product->size == "S" ? 'selected' : ''}} value="S">S</option>
           <option {{$product->size == "M" ? 'selected' : ''}} value="M">M</option>
           <option {{$product->size == "L" ? 'selected' : ''}} value="L">L</option>
           <option {{$product->size == "XL" ? 'selected' : ''}} value="XL">XL</option>
        </select>
        </div>
        <div class="mb-3">
         <label>Category</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name=category required>
          <option value="">Select</option>
          <option {{$product->category == "Male" ? 'selected' : ''}} value="Male">Male</option>
           <option {{$product->category == "Female" ? 'selected' : ''}} value="Female">Female</option>
        </select>
</div>
       <div class="mb-3">
          <label>Price</label>
          <input type="number" name="price" class="form-control" placeholder="Enter Price" value="{{$product->price}}">
        </div>
         <div class="mb-3">
          <label>Description</label>
          <textarea class="form-control" rows="4" name="description">{{$product->description}}</textarea>
        </div>
        @foreach(json_decode($product->images) as $img)
        <a target="_blank" href="{{url('/images/'.$img)}}">{{$img}}</a><br>
        @endforeach
        <div class="mb-3">
          <label>Images</label>
          <input type="file" class="form-control" name="documents[]" multiple/>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>