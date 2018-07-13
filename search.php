<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="search.css">
	<script type="text/javascript" src="script/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(e){
			$('#search').keyup(function(){
				$("#back_result").show();
				var x = $(this).val();
				$.ajax({
					type:'GET',
					url:'get_users.php',
					data:'search='+x,
					success:function(data){
						$("#back_result").html(data);
					}
					,
				});

			});
		});
	</script>
</head>

<body>

					<div id="searchInput">
						<form method="GET" action="get_users.php">
								<input id="search" type="text" name="search" placeholder="Search your name...">
							<div id="searchIcon">
								<img src="img/search.png">
							</div>
						</form>
						<div id="back_result"></div>						
					</div>

</body>
</html>