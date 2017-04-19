<?php
if ($context->logged_in) {
	$state = $context->student->getState();
	$canChange = $state->getOptions();
	$html = '
			<div class="container-fluid">';
	$ending = count($canChange) % 3;
	$length = count($canChange);
	foreach ($canChange as $key => $value) {
		if ($key == 0) {
			$html .= '
				<div class="row">';
		}
		else if ($key % 3 == 0) {
			$html .= '
			</div>
			<div class="row">';
		}
		if ($ending == 1 && $key == $length - 1) {
		$html .= '
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<button class="btn-state-change btn btn-primary btn-block" style="color:#'.$value->state_color_text.';background-color:#'.$value->state_color_hex.';border-color:#'.$value->state_color_hex.';" value="'.$value->id_state.'">'.$value->state_text.'</button>
					</div>';
		}
		else if ($ending == 2 && ($key == $length - 1 || $key == $length - 2)) {
		$html .= '
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<button class="btn-state-change btn btn-primary btn-block" style="color:#'.$value->state_color_text.';background-color:#'.$value->state_color_hex.';border-color:#'.$value->state_color_hex.';" value="'.$value->id_state.'">'.$value->state_text.'</button>
					</div>';
		}
		else {
		$html .= '
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<button class="btn-state-change btn btn-primary btn-block" style="color:#'.$value->state_color_text.';background-color:#'.$value->state_color_hex.';border-color:#'.$value->state_color_hex.';" value="'.$value->id_state.'">'.$value->state_text.'</button>
					</div>';
		}
	}
	$html .= '
				</div>
			</div>
		';
	echo $html;

}
else {
	echo "Not logged in!";
}
$js = 
'<script type="text/javascript">
	$( document ).ready(function() {
    	var w = $(".btn-state-change").width();
		$(".btn-state-change").css("height", w / 2);
	});
	window.onresize = function(event) {
		var w = $(".btn-state-change").width();
		$(".btn-state-change").css("height", w / 2);
	};
	$(".btn-state-change").on( "click", function() {
	  	$.post( "/ajax/changeState.php", { id_state: this.value, '.CSRF::getAjaxToken().' }).done(function( data ) {
	  		if (data == 2) {
	  			location.reload();
	  		}
	  		else if (data == 1){
	  			location.reload();
	  		}
	  		else {
				swal("State not changed");
	  		}

		});
	});

</script>';
echo $js;
?>