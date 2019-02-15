<html>
	<head>
		<meta charset="utf-8" />
		<title>Shorten URL</title>
	</head>
	<body>
		URL to be shortened: (must include protocol like http:// or https:// etc.)<br />
		<form method="post">
			<textarea rows='3' name="url" style="width:100%"></textarea><br />
			<input type="submit" value="submit" />
		<form><br />
		<?php
			if (isset($_POST['url'])) {
				$origin = $_POST['url'];
				if (strlen($origin) > 10) {
					$filename = count(scandir('.')) - 3;	// skip php self . ..
					file_put_contents($filename, 
						'<script type="text/javascript">location.href="'.$origin.'"</script>');
					$shortened = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/'.$filename;
					echo 'Original URL is<br /><a href="'.$origin.'">'.$origin.'</a><br />'
						.'Shortened URL is<br /><a href="'.$shortened.'">'.$shortened.'</a>';
				} else {
					echo "The URL you entered is NOT valid.";
				}
			}
		?>
	</body>
</html>

