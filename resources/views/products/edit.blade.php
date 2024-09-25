<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <h1>Edit a Product</h1>
    <form action="{{route('product.update', ['product' => $product])}}" method="post">
        @csrf
        @method('put')
            <div>
                <label>Name</label>
                <input type="text" name="name" value="{{$product->name}}"/>
            </div>
            <div>
                <label>Qty</label>
                <input type="text" name="qty" value="{{$product->qty}}"/>
            </div>
            <div>
                <label>Price</label>
                <input type="text" name="price" value="{{$product->price}}"/>
            </div>
            <div>
                <label>Description</label>
                <input type="text" name="description" value="{{$product->description}}"/>
            </div>
            <div>
                <input type="submit" value="Update Product"/>
            </div>
    </form>
   
</body>
</html>