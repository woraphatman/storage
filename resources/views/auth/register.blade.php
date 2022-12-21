<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-image: url({{asset('assets/img/background.png')}});
height: 100%;
weight:100%;"> 
    <div class="container">
        <div class="card mt-5 w-50 mx-auto">
            <h1 class="mx-3">Register</h1>
            <div class="card-body">
                <form method="POST" action="{{ url('register') }}">
                    @csrf()
                    <div class="mb-3">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback d-block">{{ $errors->first('name') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address *</label>
                        <input  type="text" class="form-control" id="exampleFormControlInput1" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                        @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="password" class="form-label">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                        @error('password')
                        <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmation-Password *</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                        @error('password')
                        <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>