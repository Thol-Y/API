<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="contenner">
        <h1 class="p-4">Product Update</h1>
        <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                
            @endif
            <div class="d-flex justify-content-center">
            <div class="card w-75 mb-3 p-3" style="width: 18rem; ">
                <label for="name"><strong>Name</strong></label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Product Name" value="{{$product->name}}">

                <label for="quantity"><strong>Quantity</strong></label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter Product Quantity" value="{{$product->quantity}}">

                <label for="price"><Strong>Price</Strong></label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter Product Price" value="{{$product->price}}">

                <label for="description"><strong>Discription</strong></label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter Product Description"> {{$product->description}}</textarea>

                <label for="image"><strong>Image</strong></label>
                <input type="file" name="image" id="image" class="form-control" placeholder="Enter Product Image">
                <div class="card-body">
                  <a href="{{route('products.index')}}" class="btn btn-dark">Back</a>
                  <button class="btn btn-success" type="submit">Update Product</button>
                </div>
              </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>