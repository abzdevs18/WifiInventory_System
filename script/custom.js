$(document).ready(function(){
	$('#search').keyup(function(){
				$("#back_result").show();
				var x = $(this).val();
				$.ajax({
					type:'GET',
					url:'get_users.php',
					data:'search='+x,
					success:function(data){
						$("#back_result").html(data);
					},
				});

			}); 
	$('.threeDotMenu').click(function(){
		var option= $('.logout').css("visibility");
		if (option == "hidden") {
			$('.logout').css({
				"visibility":"visible",
				"margin-top":"63px",
				"z-index":"1"});
			$('#home').css({
				"z-index":"-3"});
		}else{
			$('.logout').css({
				"visibility":"hidden",
				"margin-top":"-83px"});
			$('#home').css({
				"z-index":"1"});
		}
	});
	$('.resMenu').click(function(){
		var menu=$('#sideMenu').css("visibility");
		if (menu == "hidden") {
			$('.hiddenMenu').css("visibility","visible");
		}else{
			$('.hiddenMenu').css("visibility","hidden");
		}
	});
	$('#d-s').datepicker({
		changeYear:true
	});
	$('#d-e').datepicker({
		changeYear:true
	});
	$('.navIcons').click(function(){
		$('.navIcons').removeClass('active');
		$(this).addClass('active');
	});
	$('#logout').click(function(){

	});
	

});


