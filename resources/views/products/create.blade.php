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
  <h1>New Products</h1>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <div class="card p-5">
      <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf  

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
          <input type="text" name="name" class="form-control" placeholder="Enter Name">
        </div>
        <div class="mb-3">
          <label>Size</label>
           <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name=size required>
          <option value="">Select</option>
          <option value="XS">XS</option>
           <option value="S">S</option>
           <option value="M">M</option>
           <option value="L">L</option>
           <option value="XL">XL</option>
        </select>
        </div>
        <div class="mb-3">
         <label>Category</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name=category required>
          <option value="">Select</option>
          <option value="Male">Male</option>
           <option value="Female">Female</option>
        </select>
</div>
       <div class="mb-3">
          <label>Price</label>
          <input type="number" name="price" class="form-control" placeholder="Enter Price">
        </div>
         <div class="mb-3">
          <label>Description</label>
          <textarea class="form-control" rows="4" name="description"></textarea>
        </div>
        <div class="mb-3">
          <label>Images</label>
          <input type="file" class="form-control" name="documents[]" multiple required/>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>