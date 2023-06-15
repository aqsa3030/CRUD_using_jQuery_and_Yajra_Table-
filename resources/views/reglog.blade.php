<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <h2 class="fw-bold mb-5">Sign Up </h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" name="name" />
                    @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                    <label class="form-label" for="form3Example1">First name</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline mb-4">
                        <input type="email" id="form3Example3" class="form-control" name="email" />
                        @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                        <label class="form-label" for="form3Example3">Email address</label>
                      </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1" class="form-control" name="p_no"/>
                      @if ($errors->has('p_no'))
                                <span class="text-danger">{{ $errors->first('p_no') }}</span>
                                @endif
                      <label class="form-label" for="form3Example1">Phone Number</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example2" class="form-control" name="country" />
                      @if ($errors->has('country'))
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                                @endif
                      <label class="form-label" for="form3Example2">Country</label>
                    </div>
                  </div>
                </div>
      
              </div>

              
              <!-- Email input -->
              
  
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
                Sign up
              </button>
  
              <!-- Register buttons -->
              <div class="text-center">
                <p>Do you have account then please/  <a href="{{ url('login')}}">Login:</a> </p>
              
               
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