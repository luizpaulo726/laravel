<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!-- jQuery library -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
   
    <style>
        body {
            padding:20px;
        }
        .navbar {
            margin-bottom:20px;
        }
        .modal-backdrop {
  background-color: transparent !important;
}
    </style>
    <title>Estoque</title>
</head>
<body>
    <div class="container"> 
    @component('componente_navbar',["current" => $current ])
    @endcomponent
       <main role="main">
          @hasSection('body')  
            @yield('body')
          @endif  
       </main> 
    </div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@hasSection('javascript')
    @yield('javascript')
@endif   

</body>
</html>