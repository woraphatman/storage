<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Storage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
</head>
<body style="background-image: url({{('https://products.ls.graphics/mesh-gradients/images/47.-Whisper.jpg')}});">
    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-9 text-center">
                <h2>
                    Product
                </h2>
            </div>

            <div class=" text-end">       
             User  {{ Auth::user()->name }}
                <a href="{{ url('logout') }}" role="button" class="btn btn-danger">Logout</a>
            </div>

        </header>
    </div>
    <div class="container mt-2">
        <div class="row">
           
            <form action="{{ route('products.index') }}" method="GET" enctype="multipart/form-data">
            <div data-element="fields"class="d-flex d-inline-block justify-content-center my-3">
                <div class="form-outline w-50" style="min-width: 250px">
                  <input type="search" id="search" name="search" class="form-control">
                  <label class="form-label" for="search" style="margin-left: 0px;">Search</label>
                  <input class="form-control" name="date" type="date" > 
                </div>
                <button class="btn btn-primary ms-2" data-element="submit">
                    Search
                </button>
           
                <div>
                    <a href="{{ route('products.create') }}" class="btn btn-success  ms-2">Create Product</a> 
                </div>
            </div>
            </form>
            @if ($message = Session::get('success'))
                <div class="alert alert-success ">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-striped table-hover">
                <tr>
                    <th>Date</th>
                    <th>Code</th>
                    <th>List</th>
                    <th>Type</th>
                    <th>Detail </th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                @if (count($products) < 1)
                    <tr>
                        <td  colspan="7" class="text-center">No Data Found</td>
                    </tr>
                
                @endif
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->product_code}}</td>
                        <td>{{ $product->product_list}}</td>
                        <td>{{ $product->product_type }}</td>
                        <td>{{ $product->product_detail}}</td>
                        <td>{{ $product->product_category}}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id)}}" method="POST">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $products->links('pagination::bootstrap-5') !!}
        </div>
    </div>
    
</body>
</html>