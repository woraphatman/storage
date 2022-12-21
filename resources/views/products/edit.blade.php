<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />


</head>
<body style="background-image: url({{('https://products.ls.graphics/mesh-gradients/images/47.-Whisper.jpg')}});">
    <div class="container ">
        <div class="card mt-5 w-50 mx-auto p-20">
            <h1 class="mx-3">Edit Product</h1>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('products.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group my-3">
                                <strong>Code</strong>
                                <input type="text" name="code" value="{{ $product->product_code }}"
                                    class="form-control" placeholder="Code" />
                                @error('code')
                                    <div class="invalid-feedback d-block">{{ $errors->first('code') }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-3">
                                    <strong>List</strong>
                                    <input type="text" name="list" value="{{ $product->product_list }}"
                                        class="form-control" placeholder="List" />
                                    @error('list')
                                        <div class="invalid-feedback d-block">{{ $errors->first('list') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-3">
                                    <strong>Type</strong>
                                    <input type="text" name="type" value="{{ $product->product_type }}"
                                        class="form-control" placeholder="Type" />
                                    @error('type')
                                        <div class="invalid-feedback d-block">{{ $errors->first('type') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-3">
                                    <strong>Detail</strong>
                                    <input type="text" name="detail"value="{{ $product->product_detail }}"
                                        class="form-control" placeholder="Detail" />
                                    @error('detail')
                                        <div class="invalid-feedback d-block">{{ $errors->first('detail') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-3">
                                    <strong>Category</strong>
                                    <input type="text" name="category"
                                        value="{{ $product->product_category }}"class="form-control"
                                        placeholder="Category" />
                                    @error('category')
                                        <div class="invalid-feedback d-block">{{ $errors->first('category') }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                        <a href="{{ route('products.index') }}" class="btn btn-primary float-end">Home</a>
    
                    </form>
                </div>
            </div>
        </div>
    </bodyhttps:>
    
    </html>
    
