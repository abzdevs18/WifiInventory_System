$('#q').keyup(function(){
	var searchName = $('#q').val();
	if (searchName!='') {
		$.get('../search.php',{searchName:searchName},
			function(data){
				$('#searchResult').html(data);
			});
	};
	else{
		$('#searchResult').html('');
	}
});