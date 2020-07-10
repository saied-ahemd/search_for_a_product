<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="\css\style.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>live search with php and ajax.</title>
</head>

<body class="bg-secondary">
        <!-- start navbar -->
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Navbar</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
        <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
        </li>
        </ul>
        </div>
        </nav>
        <!-- end navbar -->
        {{-- <div class="container" > --}}
          <div class="row justify-content-center " style="margin-top: 70px ">
             <div class="col-md-10 bg-light mt-3 rounded pb-3">
                <h1 class="text-primary text-center">
                   Live Search
                </h1>
                <hr> 
                   <h4 class="mx-auto text-center lead">Search for the name or the country of the Product.</h4>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="text" name="search" id="search-text" class="form-control rounded-0 border-primary col-10 mx-auto" placeholder="search...">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <h5 style="float: right; margin-top:-32px">
                         Total Data : <span id="total">0</span>
                   </h5>
                <hr>
                <div class="table-responsive">
                <table class=" table table-hover table-light table-striped table-bordered text-center pr-3 mx-auto">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>price</th>
                        <th>country made</th>
                        <th>date</th>
                     </tr>
                  </thead>
                  <tbody  id="table-data">
                       
                  </tbody>
                </table>
                </div>
             </div>
          </div>
        {{-- </div> --}}
        <script>

$(document).ready(function(){
    $('#search-text').keyup(function(){
        var search =$(this).val();
        $.ajax({
            method:"POST",
            url: "{{ route('liveSearch.action')}}",
            dataType: 'json',
            data: {
                   '_token' :$('meta[name="csrf-token"]').attr('content'),
                    query:search,
                  },
            success: function (data) {
                var tablRow ='';
                 $('#total').html(data.count);
                $('#table-data').html(tablRow);
                $.each(data.data_table, function (index, value) { 
                         tablRow= '<tr> <td>'+ value.Item_ID+ '</td> <td>'+ value.Name+ '</td> <td>'+ value.Description+ '</td> <td>'+ value.Price+ '</td> <td>'+ value.Country_Made+ '</td> <td>'+ value.Add_Date+ '</td> </tr>';
                         $('#table-data').append(tablRow);
                });
            },
        });
    });
}); 
        </script>
</body>
</html>