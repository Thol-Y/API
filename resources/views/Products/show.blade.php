<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="contener ">
        <h1 class="p-4">Product Details</h1>
    
        <div class=" d-flex justify-content-center align-items-center">
            

            <div class="card " style="width: 300px; height: 100%;">
                <img src="{{asset($product->image)  }}" class="card-img-top"  alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title"><strong>Name: {{ $product->name }}</strong></h5>
                    <p class="card-text"><strong>Quantity: {{ $product->quantity }}</strong></p>
                    <p class="card-text"><strong>Price: ${{ $product->price }}</strong></p>
                    <p class="card-text"><strong>Description: </strong>{{ $product->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="rating">
                            <span class="star" data-value="1">★</span>
                            <span class="star" data-value="2">★</span>
                            <span class="star" data-value="3">★</span>
                            <span class="star" data-value="4">★</span>
                            <span class="star" data-value="5">★</span>
                          </div> 
                    </div>
                    <a href="{{route('products.index')}}" class="btn btn-dark">Back</a>
                    
                </div>
            </div>
                
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>