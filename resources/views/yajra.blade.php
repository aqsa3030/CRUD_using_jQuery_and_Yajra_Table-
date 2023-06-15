<!DOCTYPE html>
<html>
<head>
    <title>user</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
     
<div class="container">
    <br>
    
    <div class="row ">
        <h1> Users Information </h1>
        <a class="btn btn-success" href="javascript:void(0)" id="createNewUser"> Create New User</a>
    </div>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>P_NO</th>
                <th>Country</th>

                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <br>
    </table>
    <br>
    <br>
</div>
   
{{-- <--modal--> --}}
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="" maxlength="50" required="">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="p_no" class="col-sm-2 control-label">Phone_Number</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="p_no" name="p_no" placeholder="Enter Phone Number" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="" maxlength="50" required="">
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
     
<script type="text/javascript">
  $(function () {

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
      
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajaxuser.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'p_no', name: 'p_no'},
            {data: 'country', name: 'country'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            
            
        ]
    });

    $('#createNewUser').click(function () {
        $('#saveBtn').val("create-user");
        $('#id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Create New User");
        $('#saveBtn').html("Add User");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editUser', function () {
      var id = $(this).data("id");
      $.get("{{ route('ajaxuser.index')}}" + '/' + id + '/edit', function (data) {
          $('#modelHeading').html("Edit User"+ id);
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#name').val(data.name);
          $('#email').val(data.email);
          $('#p_no').val(data.p_no);
          $('#country').val(data.country);
          
      })
   });

   $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#productForm').serialize(),
          url: "{{ route('ajaxuser.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#productForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
              console.log(data);
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });


   $('body').on('click', '.deleteUser', function () {
     
     var id = $(this).data('id');
     confirm("Are You sure want to delete !" + id);
   
     $.ajax({
         type: "DELETE",
         url: "{{ route('ajaxuser.store') }}"+'/'+id,
         success: function (data) {
             table.draw();
         },
         error: function (data) {
             console.log('Error:', data);
         }
     });
 });


      
  });
</script>
</html>