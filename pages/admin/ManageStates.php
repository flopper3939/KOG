<?php


?>
  <h2>Active Item in a List Group</h2>
  <div class="list-group">
    <a href="#" class="list-group-item active">First item</a>
    <a href="#" class="list-group-item">Second item</a>
    <a href="#" class="list-group-item">Third item</a>
  </div>
  <h2>Transitions</h2>
  <div class="list-group trans-option">
  </div>

<div class="rules-div" >
	<div class="dow-1">
		

	</div>
	<div class="dow-2">
		
	</div>
	<div class="dow-3">
		
	</div>
	<div class="dow-4">
		
	</div>
	<div class="dow-5">
		
	</div>
	<div class="dow-6">
		
	</div>
	<div class="dow-7">
		
	</div>

</div>




  <script type="text/javascript">
	$(document).on('click', ".list-group-item", function(){ 
  		$(".list-group-item").removeClass("active");
  		$(this).addClass("active");
  		// Do ajax to get content for this state
  		$(".trans-option").html("");
  		$(".trans-option").append('<a href="#" class="list-group-item">' + $(this).html() + '</a>');
  	});

  	$(document).on('click', ".trans-option > .list-group-item", function(){ 
    	swal("test");
	});

  </script>