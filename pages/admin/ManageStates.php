<?php
$states = state::getAllState();
?>
  <h2>Active Item in a List Group</h2>
  <div class="container-fluid">
  	<div class="row">
  			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			    <div class="list-group main-state">
  				<?php
  				foreach ($states as $value) {
  					echo '<button class="list-group-item" value="'.$value->id_state.'">'.$value->state_text.'</button>';
  				}
  				?>
			  </div>
			</div>
  	</div>
  	<div class="row row-eq-height temp-hidden">
  		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="display: flex;">
  			<div class="state-change-name">
  				<label>Navn: </label>
  				<input type="text" class="form-control" placeholder="Name" id="input-state-name">
  			</div>
  		</div>
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
  		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="display: flex;">
  			<div class="state-change-name">
  				<label for="test">Ulovlig fravær:</label>
  				<input type="checkbox" name="test" class="form-control">
  			</div>
  		</div>
  		 <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="display: flex;">
  			<div class="state-change-name">
  				<button type="button" class="btn btn-primary save-btn">Save</button>
  			</div>
  		</div>
  	</div>
	  <div class="row temp-hidden">
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
						<div class="rules-div">
							<h2>Rules</h2>
							<div style="display: table; width: 100%; margin-bottom: 1vh;">
								<div class="dow radio">
									<b>Mandag</b>
									<br>
									<input name="day" type="radio" value="1" checked>
								</div>
								<div class="dow radio">
									<b>Tirsdag</b>
									<br>
									<input name="day" type="radio" value="2">
								</div>
								<div class="dow radio">
									<b>Onsdag</b>
									<br>
									<input name="day" type="radio" value="3">
								</div>
								<div class="dow radio">
									<b>Torsdag</b>
									<br>
									<input name="day" type="radio" value="4">
								</div>
								<div class="dow radio">
									<b>Fredag</b>
									<br>
									<input name="day" type="radio" value="5">
								</div>
								<div class="dow radio">
									<b>Lørdag</b>
									<br>
									<input name="day" type="radio" value="6">
								</div>
								<div class="dow radio">
									<b>Søndag</b>
									<br>
									<input name="day" type="radio" value="7">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							  <div class="list-group day-1 day-rules-list">
							  </div>
							  <div class="list-group day-2 day-rules-list" style="display: none;">
							  </div>
							  <div class="list-group day-3 day-rules-list" style="display: none;">
							  </div>
							  <div class="list-group day-4 day-rules-list" style="display: none;">
							  </div>
							  <div class="list-group day-5 day-rules-list" style="display: none;">
							  </div>
							  <div class="list-group day-6 day-rules-list" style="display: none;">
							  </div>
							  <div class="list-group day-7 day-rules-list" style="display: none;">
							  </div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							controlls here
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </div>






<script type="text/javascript">
	var day = 1;
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
			    // No reason to set button color here since it is auto update when colorpicker change, so we only need to set those.
			    //$(".preview-button").css("background-color", "#" + obj.state_color_hex);
			    //$(".preview-button > span").css("color", "#" + obj.state_color_text);
			    $(".preview-button > span").html(obj.state_text);
			    $(".trans-option").html("");
			    $(".temp-hidden").removeClass("temp-hidden");
			    $("#input-state-name").val(obj.state_text);
			    $('#cp1').colorpicker('setValue', obj.state_color_text);
				$('#cp2').colorpicker('setValue', obj.state_color_hex);
			    obj.options.forEach(popOptions);
			    function popOptions(item, index) {
			    	$(".trans-option").append('<button class="list-group-item" value="' + item.id_state + '">' + item.state_text + '</button>');
			    }
			  });
			});
		});

		$(document).on('click', ".trans-option > .list-group-item", function(){ 
			$(".trans-option > .list-group-item").removeClass("active");
			$(this).addClass("active");
			$(".day-rules-list").html("");
			var tempthis = this;
			// Get rules?
			getToken(function(data) {
				var postData = {};
				postData[data[0]] = data[1];
				postData['from_state_id'] = $(".main-state > .active").val();
				postData['to_state_id'] = $(tempthis).val();
				$.ajax({
					method: "POST",
					url: "/ajax/getStateTransitionRules.php",
					data: postData
				}).done(function(json) {
					var obj = JSON.parse(json);
					obj.forEach(popRules);
					function popRules(item, index) {
						var fromhours = item.time_from / 60 / 60;
						var frommins = (item.time_to / 60) % 60;
						var tohours = item.time_to / 60 / 60;
						var tomins = (item.time_to / 60) % 60;
						if (fromhours.toString().length == 1)
							fromhours = '0' + fromhours.toString();
						if (frommins.toString().length == 1)
							frommins = '0' + frommins.toString();
						if (tohours.toString().length == 1)
							tohours = '0' + tohours.toString();
						if (tomins.toString().length == 1)
							tomins = '0' + tomins.toString();
						$(".day-" + item.day_of_week).append('<button class="list-group-item rule-list-item" value="'+item.id+'">' + fromhours + ':' + frommins + ' - ' + tohours + ':' + tomins + '</button><button class="list-group-item delete-rule"><i class="fa fa-trash" aria-hidden="true"></i></button>')
					}
					console.log(obj);
				});
			});
	});
	$("input[name='day'").change(function() {
		if (day == this.value)
			return;
		tempthis = this;
		$(".day-" + day).slideUp(100, function() {
			$(".day-" + tempthis.value).slideDown(100);
			day = tempthis.value;
		});
	});

	$(function() {
	    $('#cp1').colorpicker({
	    	color: '#AA3399',
	        format: 'rgb'
	    }).on('changeColor', function(e) {
	    	$(".preview-button > span").css("color", e.color.toString('hex'));
		});
	});
	$(function() {
	    $('#cp2').colorpicker({
	    	color: '#AA3399',
	        format: 'rgb'
	    }).on('changeColor', function(e) {
	    	$(".preview-button").css("background-color", e.color.toString('hex'));
		});
	});
		$(document).on('click', ".save-btn", function(){ 
		// Get color 
	    var color1 = colorObjectToRGB($('#cp1').data('colorpicker').color);
	    var color2 = colorObjectToRGB($('#cp2').data('colorpicker').color);
	    var gradeObj = getColorGrade(color1, color2);
	    var largeGradeColor = (gradeObj.large == "AAA" ? "green" : (gradeObj.large === "AA" ? "DarkGreen" : "red"));
		var smallGradeColor = (gradeObj.small == "AAA" ? "green" : (gradeObj.small === "AA" ? "DarkGreen" : "red"));
		swal({
		  title: "Are you sure you wanna update this state?",
		  text: "Color large score = <b><span style=\"color:" + largeGradeColor + ";\">" + gradeObj.large + "</span></b><br>" + "Color small score = <b><span style=\"color:" + smallGradeColor + ";\">" + gradeObj.small + "</span></b><br><a href=\"https://www.w3.org/TR/WCAG20/#visual-audio-contrast\" target=\"_blank\">What is this score?</a>",
		  type: "warning",
		  showCancelButton: true,
		  closeOnConfirm: false,
		  showLoaderOnConfirm: true,
		  html: true
		},
		function(){
			// Do ajax for save
		  setTimeout(function(){
		    swal("Ajax request finished!");
		  }, 2000);
		});
	})
</script>