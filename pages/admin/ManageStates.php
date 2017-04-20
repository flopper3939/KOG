<?php


?>
  <h2>Active Item in a List Group</h2>


  <div class="container-fluid">
  	<div class="row">
  			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			    <div class="list-group main-state">
			    <button class="list-group-item active" value="1">First item</a>
			    <button class="list-group-item" value="2">Second item</a>
			    <button class="list-group-item" value="3">Third item</a>
			  </div>
			</div>
  	</div>
  	<div class="row row-eq-height">
  		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="display: flex;">
  			<div class="state-change-name">
  				<input type="text" class="form-control" placeholder="Name">
  			</div>
  		</div>
<div class="clearfix visible-xs-block"></div>
  		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	  		<div class="row change-state">
	  			<label style="padding-left: 46px;">Color for name:</label>
	  			<div class="colorpicker">
			  		<div id="cp1" class="input-group colorpicker-component">
					    <input type="text" value="#00AABB" class="form-control" />
					    <span class="input-group-addon"><i></i></span>
					</div>
				</div>
	  		</div>
	  		<div class="row change-state">
	  		<label>Color for background:</label>
	  			<div class="colorpicker">
			  		<div id="cp2" class="input-group colorpicker-component">
					    <input type="text" value="#00AABB" class="form-control" />
					    <span class="input-group-addon"><i></i></span>
					</div>
				</div>
	  		</div>
  		</div>
<div class="clearfix visible-xs-block"></div>
  		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="display: flex;">
  			<div class="state-change-name">
  				<label for="test">Ulovlig fravær:</label>
  				<input type="radio" name="test" class="form-control">
  			</div>
  		</div>
  		 <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="display: flex;">
  			<div class="state-change-name">
  				<button type="button" class="btn btn-primary">Save</button>
  			</div>
  		</div>


	





  	</div>
	  <div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
			<h2>Transitions</h2>
			  <div class="list-group trans-option">
			  	
			  </div>
			</div>


			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h2>Preview</h2>
						<div class="preview-button" style="display:table;height:100%;text-align: center;font-size: 2.5vw;width: 100%;">
							<span style="display:table-cell;width:100%;vertical-align: middle;"></span>

						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="rules-div" style="height:100%;" >
							<h2>Rules</h2>
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

					</div>
				</div>
			</div>
		</div>
  </div>






  <script type="text/javascript">
  var TokenString = "<?php echo CSRF::getAjaxToken(); ?>".split(":");
  var token = TokenString[0];
  var tokenID = TokenString[1].replace("'", "");
	$(document).on('click', ".main-state > .list-group-item", function(){ 
  		$(".list-group-item").removeClass("active");
  		$(this).addClass("active");
  		var parrentThis = this;
  		getToken(function(data) {
  			var postData = {};
  			postData[data[0]] = data[1];
  			postData['state_id'] = $(parrentThis).val();
			$.ajax({
			  method: "POST",
			  url: "/ajax/getState.php",
			  data: postData
			})
			  .done(function( json ) {
			  	if (json == 2)
			  		location.reload();
			    var obj = JSON.parse(json);
			    console.log(obj);
			    $(".preview-button").css("background-color", "#" + obj.state_color_hex);
			    $(".preview-button > span").html(obj.state_text);
			    $(".preview-button > span").css("color", "#" + obj.state_color_text);
			    $(".trans-option").html("");
			    
			    obj.options.forEach(popOptions);
			    function popOptions(item, index) {
			    	$(".trans-option").append('<button class="list-group-item" value="' + item.id_state + '">' + item.state_text + '</a>');
			    }
			  });

  		})
  	})



  	$(document).on('click', ".trans-option > .list-group-item", function(){ 
  		$(".trans-option > .list-group-item").removeClass("active");
    	$(this).addClass("active");
	});



	$(function() {
        $('#cp1').colorpicker({
        	color: '#AA3399',
            format: 'rgb'
        });
    });
	$(function() {
        $('#cp2').colorpicker({
        	color: '#AA3399',
            format: 'rgb'
        });
    });

  </script>