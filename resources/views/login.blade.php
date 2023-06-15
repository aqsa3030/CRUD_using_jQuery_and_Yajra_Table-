<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @csrf
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
   <!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 300px;
          "></div>
    <!-- Background image -->
  
    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
      <div class="card-body py-5 px-md-5">
  
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">LogIn</h2>

            <form action="{{route('customLogin')}}" method="POST">             
              @csrf
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control"  name="email"/>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <label class="form-label" for="form3Example3">Email address</label>
              </div>
  
              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="password" />
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <label class="form-label" for="form3Example4">Password</label>
              </div>
  
             
  
              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">
              Login
              </button>
  
              <!-- Register buttons -->
              <div class="text-center">
                <p>Don't have an account/  <a href="{{ url('user')}}">Signup:</a> </p>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block --> 
</body>
</html>