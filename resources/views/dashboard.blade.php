<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dashboard</title>

    <style>
       h1{

        
       }
    </style>
</head>
<body>
    <center>
        <h1>
            Dashboard
            
        </h1>
        <br>
        
        <button onclick="window.location='{{ url('/ajaxuser')}}'" type="submit" class="btn btn-primary btn-block mb-4 " >
            View Users Record
            </button >
            <b><p>Please click here to view users</a> </p></b>
    </center>
    



        <!-- Register buttons -->
          
</body>

</html>