<?php
if ($context->logged_in) {
	$state = $context->student->getState();
	$canChange = $state->getOptions();
	$html = '
			<div class="container-fluid">';
	$ending = count($canChange) % 3;
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
		
		echo $ending;
		if ($ending == 1 && $key == count($canChange) - 1) {
		$html .= '
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-color:#'.$value->state_color_hex.'">
						'.$value->state_text.'
					</div>';
		}
		else if ($ending == 2 && ($key == count($canChange) - 1 || $key == count($canChange) - 2)) {
		$html .= '
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="background-color:#'.$value->state_color_hex.'">
						'.$value->state_text.'
					</div>';
		}
		else {
		$html .= '
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background-color:#'.$value->state_color_hex.'">
						'.$value->state_text.'
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

?>