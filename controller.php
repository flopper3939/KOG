<?php 
$page = tools::getValue('page');
if ($page == '')
	$title = 'Homepage';
else
	$title = $page;
if (!$context->logged_in)
	$title = 'Login';
if (tools::getValue('tk') != '')
	$title = 'Reset password';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">

   		<!-- Jquery -->
		<script src="/lib/jquery-3.1.1.min.js"></script>

		<!-- Bootstap -->
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
   		<link rel="stylesheet" href="/lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
   		<script src="/lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

		<!-- SweetAlert -->
		<script src="/lib/sweetalert/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/lib/sweetalert/sweetalert.css">


		<!-- Fancybox -->
		<link rel="stylesheet" href="/lib/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<script type="text/javascript" src="/lib/fancybox/jquery.fancybox.pack.js"></script>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="/lib/font-awesome-4.7.0/css/font-awesome.min.css">


		<!-- Menu Theme -->
		<link rel="stylesheet" href="/lib/sidebar/sidebar-collapse.css">

		<!-- Pagenation -->
		<script type="text/javascript" src="/lib/Pagination/jquery.simplePagination.js"></script>
		<link rel="stylesheet" href="/lib/Pagination/simplePagination.css">

		<!-- Custom JS -->
		<script type="text/javascript" src="/js/custom.js"></script>

		<!-- Bootstrap color picker -->
		<link href="/lib/bootstrap-colorpicker-master/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
		<script src="/lib/bootstrap-colorpicker-master/dist/js/bootstrap-colorpicker.js"></script>

		<!-- DatePicker for Bootstrap -->
		<link href="/lib/datepicker/css/datepicker.css" rel="stylesheet">
		<script src="/lib/datepicker/js/bootstrap-datepicker.js"></script>

		<!-- Override CSS -->
		<link rel="stylesheet" href="/css/override.css">



		<title><?php echo $title;?></title>
	</head>
	<body><?php
// Checking for CSRF errors
if (isset($_SESSION['CTRF_ERROR'])) {
	if ($_SESSION['CTRF_ERROR'] == 1) {
		echo '<script type="text/javascript">swal("Expired", "This form has expired, please try again.", "error");</script>';
	}
	elseif ($_SESSION['CTRF_ERROR'] == 2) {
		echo '<script type="text/javascript">swal("Error", "The token did not match the server. Please try again. If this problem presists, pleas contact support.", "error");</script>';
	}
	elseif ($_SESSION['CTRF_ERROR'] == 3) {
		echo '<script type="text/javascript">swal("Not set", "The token was not set.", "error");</script>';
	}
}
unset($_SESSION['CTRF_ERROR']);

	if ($context->logged_in) {
		require_once('menu.php');
		if ($context->admin >= 1) {
			require_once('adminmenu.php');
			$menu['admin'] = $adminMenu;
		}
		echo generate_header($menu, $context);
		echo '
		<div class="header">
			<div class="row" style="height:100%;">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 header-column">
					<div class="header-blocks">
						<div class="header-status-block">
							<span class="fa fa-user-circle fa-3x header-status" aria-hidden="true" style="background-color:#'.$context->student->getState()->state_color_hex.';"> Status - '.$context->student->getState()->state_text.'</span>
						</div>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 header-column">
				
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 header-column">
					<div class="header-blocks">
						<span class="fa fa-clock-o fa-3x time" aria-hidden="true"></span>
					</div>
				</div>
			</div>





		</div>';
		echo '
		<div class="main-content">';

	}
		// REQUIRE LOGIN

		if (!$context->logged_in) {
			if (tools::getValue('page') == "stateChanger") {
				require_once('pages/stateChanger.php');
			}
			else {
				if (tools::getValue('page') == "")
					require_once('pages/login.php');
				elseif (tools::getValue('page') == "passwordReset")
					require_once('pages/forgotPassword.php');
			}
		}
		else {

			$page = tools::getValue('page');
			if ($page == '')
				$page = 'homepage';
			$page .= '.php';

			$page = str_replace('admin', 'admin/', $page);
			if (!file_exists('pages/'.$page))
				require_once('errors/404.php');
			else
				require_once('pages/'.$page);
		}
		if ($context->logged_in) {
		?>
		<script type="text/javascript">
			var ST = <?php echo time(); ?>;
			var LT = +Date.now();
			var TD = ST * 1000 - LT;

			// Only for initialzing
			var CT1 = new Date(Date.now() + TD);
			$(".time").html(" " + CT1.toTimeString().split(' ')[0]);

			setInterval(function () {
				var CT = new Date(Date.now() + TD);
				$(".time").html(" " + CT.toTimeString().split(' ')[0]);
			}, 1000);

			setInterval(function () {
				$.post( "/ajax/getTime.php", function( data ) {
					ST = data;
					LT = +Date.now();
					TD = ST * 1000 - LT;
				});
				// Millisekunder gange sekunder gange minutter
			}, 1000*60*15)

			$(function () {
				var links = $('.sidebar-links > div');
				links.on('click', function () {
					links.removeClass('selected');
					$(this).addClass('selected');
				});
			});
		<?php 
			$page = str_replace('.php', '', $page);
			$page = str_replace('admin/', 'admin', $page);
			foreach ($menu as $key => $value) {
				foreach ($value as $value1) {

					if ($value1['pagelink'] == $page) {
						echo '	$("a:contains(\''.$key.'\')").parent().addClass("selected");
			
		';
					}
				}
			}
		}
		echo "</script>";
		if ($context->logged_in)
			echo '</div>
';
		?>
	</body>
</html>