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
    <div class="contenner ">
        <h1 class="m-4">Products</h1>
        <table class="table table-hover text-center">
           <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Description</td>
                <td>Image</td>
                <td>Action</td>
               </tr>
           </thead>
           <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>${{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td><img src="{{asset($product->image)}}" alt="Product Image" style="width: 50px; height: 50px;"></td>
                    <td>
                        <a class="btn btn-info" href="{{route('products.show', $product->id)}}">View</a>
                        <a class="btn btn-warning" href="{{route('products.edit', $product->id)}}">Edit</a>
                        
                        <form action="{{route('products.destroy', $product->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
           </tbody>
        </table>
        
        <div>
            <a href="{{route('products.create')}}" class="btn btn-primary m-2 ">Create Product</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>