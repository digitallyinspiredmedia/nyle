<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Base
 * @since Base v1.1
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div class="container">
      <section class="error-404 not-found" style="text-align:center;">
       404
				<header class="page-header">
          <img  src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ3Ny4wNjUgNDc3LjA2NSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDc3LjA2NSA0NzcuMDY1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPGc+Cgk8cGF0aCBkPSJNNDUxLjYxMiwzNC43MzlIMjUuNDUzQzExLjM5OSwzNC43MzksMCw0Ni4xMzgsMCw2MC4xOTJ2MjY5LjIxOWMwLDE0LjA1NCwxMS4zOTksMjUuNDUzLDI1LjQ1MywyNS40NTNoMTY4LjY5NyAgIGwtMjIuNzE5LDU0LjY2NGgtMTAuNDIxYy05LjA1MywwLTE2LjM5OCw3LjM0NS0xNi4zOTgsMTYuMzk4czcuMzQ1LDE2LjQsMTYuMzk4LDE2LjRoMTU1LjA0NmM5LjA1MywwLDE2LjQtNy4zNDcsMTYuNC0xNi40ICAgcy03LjM0Ny0xNi4zOTgtMTYuNC0xNi4zOThoLTEwLjQyMWwtMjIuNzE5LTU0LjY2NGgxNjguNjk2YzE0LjA1NCwwLDI1LjQ1My0xMS4zOTksMjUuNDUzLTI1LjQ1M1Y2MC4xOTIgICBDNDc3LjA2NSw0Ni4xMzgsNDY1LjY2NiwzNC43MzksNDUxLjYxMiwzNC43Mzl6IE0zNjkuMjkxLDMzOC4zOTRjLTYuNTg1LDAtMTEuOTI3LTUuMzQyLTExLjkyNy0xMS45MjcgICBjMC02LjU4NSw1LjM0MS0xMS45MjcsMTEuOTI3LTExLjkyN2M2LjU4MywwLDExLjkyNyw1LjM0MSwxMS45MjcsMTEuOTI3QzM4MS4yMTcsMzMzLjA1MiwzNzUuODc0LDMzOC4zOTQsMzY5LjI5MSwzMzguMzk0eiAgICBNNDA4LjA1MiwzMzguMzk0Yy02LjU4NSwwLTExLjkyNy01LjM0Mi0xMS45MjctMTEuOTI3YzAtNi41ODUsNS4zNDEtMTEuOTI3LDExLjkyNy0xMS45MjdjNi41ODMsMCwxMS45MjcsNS4zNDEsMTEuOTI3LDExLjkyNyAgIEM0MTkuOTc5LDMzMy4wNTIsNDE0LjYzNiwzMzguMzk0LDQwOC4wNTIsMzM4LjM5NHogTTQzMS42NDIsMjkwLjM5M2MwLDYuMTQ5LTQuOTg1LDExLjEzNS0xMS4xMzUsMTEuMTM1SDU2LjU1NyAgIGMtNi4xNDksMC0xMS4xMzUtNC45ODUtMTEuMTM1LTExLjEzNVY5Ni42NTZjMC02LjE1MSw0Ljk4NS0xMS4xMzUsMTEuMTM1LTExLjEzNWgzNjMuOTQ5YzYuMTQ5LDAsMTEuMTM1LDQuOTg0LDExLjEzNSwxMS4xMzUgICBWMjkwLjM5M3oiIGZpbGw9IiMwMDAwMDAiLz4KCTxwYXRoIGQ9Ik0xNzkuMDIzLDE5NS43NzloLTMuMzM4di01NS4yMzhjMC0yLjk0Mi0yLjM3Ny01LjMxOS01LjMxMS01LjMxOWgtMjEuMzA3Yy0xLjgzMiwwLTMuNTQsMC45NDgtNC41MDQsMi41MDlsLTM1Ljc4LDU3LjU5ICAgYy0xLjE2NCwxLjg1Ni0xLjc3LDMuOTk5LTEuNzcsNi4xODl2Ny4wNjVjMCwyLjk0NCwyLjM3Niw1LjMxOSw1LjMxMSw1LjMxOWg0MC40Njl2MTMuMTkyYzAsNi4zMjEsNS4xMjUsMTEuNDQ1LDExLjQ0NSwxMS40NDUgICBjNi4zMjEsMCwxMS40NDYtNS4xMjQsMTEuNDQ2LTExLjQ0NXYtMTMuMTkyaDMuMzM4YzUuMDAxLDAsOS4wNTMtNC4wNTMsOS4wNTMtOS4wNjEgICBDMTg4LjA3NiwxOTkuODMyLDE4NC4wMjQsMTk1Ljc3OSwxNzkuMDIzLDE5NS43Nzl6IE0xNTIuNzk0LDE3Mi44ODl2MjIuODloLTIzLjIwMXYtMC4zMThsMTMuODIyLTIyLjU3MiAgIGMzLjQ5NC02LjUxNSw2LjE5NS0xMi41NTYsOS41MzUtMTkuMjI2aDAuNjM2QzE1My4xMDQsMTYwLjMzMywxNTIuNzk0LDE2Ni42OTIsMTUyLjc5NCwxNzIuODg5eiIgZmlsbD0iIzAwMDAwMCIvPgoJPHBhdGggZD0iTTIzNi4xMjUsMTMzLjQ3NmMtMjYuNzExLDAtMzkuNDI5LDIzLjY4MS0zOS40MjksNTMuNTZjMC4xNzIsMjkuMjQyLDExLjkyNyw1My4yNDMsMzguNjIzLDUzLjI0MyAgIGMyNi4zODMsMCwzOS4yNTgtMjEuOTM1LDM5LjI1OC01My44OEMyNzQuNTc2LDE1OC4xMTMsMjYzLjc2NywxMzMuNDc2LDIzNi4xMjUsMTMzLjQ3NnogTTIzNS45NTQsMjIyLjAwMSAgIGMtOS4zNjUsMC0xNS4wOTQtMTEuMjgzLTE0Ljk0LTM0Ljk2NmMtMC4xNTQtMjQsNS44ODctMzUuMjgyLDE0Ljc4NC0zNS4yODJjOS42OTEsMCwxNC42MjgsMTIuMDgzLDE0LjYyOCwzNC45NjQgICBDMjUwLjQyNywyMTAuMjQ1LDI0NS4zMzMsMjIyLjAwMSwyMzUuOTU0LDIyMi4wMDF6IiBmaWxsPSIjMDAwMDAwIi8+Cgk8cGF0aCBkPSJNMzU1LjUzMSwxOTUuNzc5aC0zLjMzOHYtNTUuMjM4YzAtMi45NDItMi4zNzctNS4zMTktNS4zMTEtNS4zMTloLTIxLjMwN2MtMS44MzIsMC0zLjU0LDAuOTQ4LTQuNTAzLDIuNTA5bC0zNS43OCw1Ny41OSAgIGMtMS4xNjQsMS44NTYtMS43NywzLjk5OS0xLjc3LDYuMTg5djcuMDY1YzAsMi45NDQsMi4zNzYsNS4zMTksNS4zMTEsNS4zMTloNDAuNDY5djEzLjE5MmMwLDYuMzIxLDUuMTI1LDExLjQ0NSwxMS40NDUsMTEuNDQ1ICAgYzYuMzIxLDAsMTEuNDQ2LTUuMTI0LDExLjQ0Ni0xMS40NDV2LTEzLjE5MmgzLjMzOGM1LjAwMSwwLDkuMDU1LTQuMDUzLDkuMDU1LTkuMDYxICAgQzM2NC41ODUsMTk5LjgzMiwzNjAuNTMyLDE5NS43NzksMzU1LjUzMSwxOTUuNzc5eiBNMzI5LjMwMiwxNzIuODg5djIyLjg5aC0yMy4yMDF2LTAuMzE4bDEzLjgyMi0yMi41NzIgICBjMy40OTQtNi41MTUsNi4xOTUtMTIuNTU2LDkuNTM1LTE5LjIyNmgwLjYzNkMzMjkuNjEyLDE2MC4zMzMsMzI5LjMwMiwxNjYuNjkyLDMyOS4zMDIsMTcyLjg4OXoiIGZpbGw9IiMwMDAwMDAiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location.', 'base' ); ?></p>
          <p> Contact us <a href="#"> admin </a> </p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
      </div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>

<?php // WP 404 ALERTS @ http://wp-mix.com/wordpress-404-email-alerts/

// set status
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");

// site info
$blog  = get_bloginfo('name');
$site  = get_bloginfo('url') . '/';
$email = get_bloginfo('admin_email');

// theme info
if (!empty($_COOKIE["nkthemeswitch" . COOKIEHASH])) {
	$theme = clean($_COOKIE["nkthemeswitch" . COOKIEHASH]);
} else {
	$theme_data = wp_get_theme();
	$theme = clean($theme_data->Name);
}

// referrer
if (isset($_SERVER['HTTP_REFERER'])) {
	$referer = clean($_SERVER['HTTP_REFERER']);
} else {
	$referer = "undefined";
}
// request URI
if (isset($_SERVER['REQUEST_URI']) && isset($_SERVER["HTTP_HOST"])) {
	$request = clean('http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
} else {
	$request = "undefined";
}
// query string
if (isset($_SERVER['QUERY_STRING'])) {
	$string = clean($_SERVER['QUERY_STRING']);
} else {
	$string = "undefined";
}
// IP address
if (isset($_SERVER['REMOTE_ADDR'])) {
	$address = clean($_SERVER['REMOTE_ADDR']);
} else {
	$address = "undefined";
}
// user agent
if (isset($_SERVER['HTTP_USER_AGENT'])) {
	$agent = clean($_SERVER['HTTP_USER_AGENT']);
} else {
	$agent = "undefined";
}
// identity
if (isset($_SERVER['REMOTE_IDENT'])) {
	$remote = clean($_SERVER['REMOTE_IDENT']);
} else {
	$remote = "undefined";
}
// log time
$time = clean(date("F jS Y, h:ia", time()));

// sanitize
function clean($string) {
	$string = rtrim($string);
	$string = ltrim($string);
	$string = htmlentities($string, ENT_QUOTES);
	$string = str_replace("\n", "<br>", $string);

	if (get_magic_quotes_gpc()) {
		$string = stripslashes($string);
	}
	return $string;
}

$message =
	"TIME: "            . $time    . "\n" .
	"*404: "            . $request . "\n" .
	"SITE: "            . $site    . "\n" .
	"THEME: "           . $theme   . "\n" .
	"REFERRER: "        . $referer . "\n" .
	"QUERY STRING: "    . $string  . "\n" .
	"REMOTE ADDRESS: "  . $address . "\n" .
	"REMOTE IDENTITY: " . $remote  . "\n" .
	"USER AGENT: "      . $agent   . "\n\n\n";

mail($email, "404 Alert: " . $blog . " [" . $theme . "]", $message, "From: $email");

?>
