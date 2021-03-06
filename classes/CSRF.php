<?php
class CSRF {

	public static function cleanUpTokens() {

		if (isset($_SESSION['tokens'])) {
			$toRemove = array();
			foreach ($_SESSION['tokens'] as $key => $value) {
				if (time() - $value['time'] > $GLOBALS['config']['CSRF']['Token_timeout']) {
					array_push($toRemove, $key);
				}
			}
			foreach ($toRemove as $value) {
				self::removeToken($value, false);
			}
			$_SESSION['tokens'] = array_values($_SESSION['tokens']);
		}
	}


	public static function getFormToken() {
		$newToken = bin2hex(random_bytes(32));
		$tokenArray = array('token' => $newToken, 'time' => time());
		if (isset($_SESSION['tokens'])) {
			$id = array_push($_SESSION['tokens'], $tokenArray);
			$id -= 1;
		}
		else {
			$_SESSION['tokens'] = array($tokenArray);
			$id = 0;
		}
		$html = '<input type="hidden" name="token' . $id . '" value="' . $newToken . '">';
		return $html;
	}
	public static function getAjaxToken() {
		$newToken = bin2hex(random_bytes(32));
		$tokenArray = array('token' => $newToken, 'time' => time());
		if (isset($_SESSION['tokens'])) {
			$id = array_push($_SESSION['tokens'], $tokenArray);
			$id -= 1;
		}
		else {
			$_SESSION['tokens'] = array($tokenArray);
			$id = 0;
		}
		$js = "token" . $id . ":'" . $newToken . "'";
		return $js;

	}
	public static function checkToken($post) {
		foreach($post as $key => $value) {
			if (strpos($key, 'token') !== false) {
				$id = str_replace("token", "", $key);
				if (!isset($_SESSION['tokens'][$id])) {
					// Token is not in session. Properbly cleaned up because of timeout.
					$_SESSION['CTRF_ERROR'] = 1;
					return 0;
				}
				else {
					if ($_SESSION['tokens'][$id]['token'] == $value) {
						// Token is valid
						$_SESSION['CTRF_ERROR'] = 0;
						self::removeToken($id);
						return 1;
					}
					else {
						// Token is invalid
						$_SESSION['CTRF_ERROR'] = 2;
						self::removeToken($id);
						return 0;
					}
				}
			}
		}
		$_SESSION['CTRF_ERROR'] = 3;
		return 0;
	}
	public static function removeToken($id, $reset = true) {
		unset($_SESSION['tokens'][$id]);
		if ($reset) {
			$_SESSION['tokens'] = array_values($_SESSION['tokens']);
		}
	}
}
?>