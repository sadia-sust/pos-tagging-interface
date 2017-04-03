<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
  
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>

	<script type="text/javascript">
		
		$(document).ready( function () {
    
   $('#admin').dataTable( {
    "iDisplayLength": 20,
    "aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
  } );
} );
	</script>


</head>
<body 

        @yield('content')


    <!-- Scripts -->
    
</body>
</html>
