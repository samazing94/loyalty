<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="_token" content="{{csrf_token()}}" />

		

		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="crossorigin="anonymous"></script>
		<script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
		<script src ="https://cdn.datatables.net/1.10.17/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<script src=https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js></script>
		<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
		<script src="https://cdn.datatables.net/select/1.2.6/js/dataTables.select.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
		<!-- <script src ="../../extensions/Editor/js/dataTables.editor.min.js"></script> -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>



		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.17/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.6/css/select.dataTables.min.css">
		<!-- <link rel="stylesheet" href="../../extensions/Editor/css/editor.dataTables.min.css"> -->


	</head>

	<body>
		<div class="container ">

			<br><br>
		
			@yield('content')

		</div>

		<script>
			$(document).ready(function() {
				
				@yield('script')

			});
		</script>

		@yield('footer')

	</body>
</html>