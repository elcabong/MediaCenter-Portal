</p>
<?php
if(!isset($log)) {
	require_once "startsession.php";
}
$log->LogDebug("User $authusername loaded " . basename(__FILE__) . " from " . $_SERVER['SCRIPT_FILENAME']);
if (!empty($_FILES)) {
	$set = '';
	if(isset($_GET['user'])) {
		$usernumber = $_GET['user'];
		$upload_dir = '../media/Users';
		$set = "users";
	} else if(isset($_GET['program'])) {
		$program = $_GET['program'];
		$upload_dir = '../media/Programs';
		$set = "programs";
	} else if(isset($_GET['db'])) {
		$db = $_GET['db'];
		$upload_dir = "$INCLUDES/sessions/";
		$set = "db";
	} else if(isset($_GET['addon'])) {
		$addon = $_GET['addon'];
		$upload_dir = "../addons";
		$set = "addons";
	} else {
		return false;
		exit;
	}

	$tempFile = $_FILES['file']['tmp_name'];
	// using DIRECTORY_SEPARATOR constant is a good practice, it makes your code portable.
	$targetPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $upload_dir . DIRECTORY_SEPARATOR;
	// Adding timestamp with image's name so that files with same name can be uploaded easily.
	//if($usernumber) { $filename = 'user'.$usernumber.'.jpg'; } else { $filename = $program.'.png'; }
	switch ($set) {
		case "users" :
			$filename = 'user'.$usernumber.'.jpg';
			break;

		case "programs" :
			$filename = $program.'.png';
			break;
			
		case "db" :
			$filename = 'config.db';
			copy("$INCLUDES/sessions/config.db", "$INCLUDES/sessions/config-bak.db");
			break;
			
		case "addons" :
			//$filename = 'temp.zip';
			break;			
	}

	$mainFile = $targetPath.$filename;
	move_uploaded_file($tempFile,$mainFile);
	
	switch ($set) {
		case "addons" :
			// unzip new file and overwrite addon folder if exists.
			break;
	}
	

	if($set="db"){ ?>
		<script>
		top.window.location='../servercheck.php';
		</script>
	<?php
	}
} ?>
<p style="text-align: justify;">