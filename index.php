<?php 
// The main purpose of this file is to extract visitor's information from the internet while on a particular page

// This function is for getting the (Internet protocol)IP address of the device the visitor is using
function getIP() {
    // Although, there are lots of ways of getting the IP address $_SERVER['REMOTE_ADDR'] is the general 
    // and most basic method of doing so.

    $IP_address = $_SERVER['REMOTE_ADDR'];
    // Once a broswer loads this file, line 8 extracts the IP address and line 11 gives you back what has been
    // extracted.
    return $IP_address;
} 
 
// This function is for getting the Operating System(Os) of the device the visitor is using
function getOs() {
    // $_SERVER['HTTP_USER_AGENT'] contains a vast information about the device of the visitor, and to make use 
    // of one only needs to match the Regular Expressions(RegEx) with array of regex already stored in the 
    // super global variable $_SERVER['HTTP_USER_AGENT'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // As earlier stated, the following Os have the corresponding patterns of regex which we only need to match
    // in order to have access to the $_SERVER['HTTP_USER_AGENT'] array
    $win10 = preg_match('/windows nt 10/i', $user_agent); // This will match Windows 10
    $win8_1 = preg_match('/windows nt 6.3/i', $user_agent); // This will match Windows 8.1
    $win8 = preg_match('/windows nt 6.2/i', $user_agent); //... and so on.
    $win7 = preg_match('/windows nt 6.1/i', $user_agent);
    $android = preg_match('/android/i', $user_agent);
    $ipad = preg_match('/ipad/i', $user_agent);
    $iphone = preg_match('/iphone/i', $user_agent);
    $ubuntu = preg_match('/ubuntu/i', $user_agent);
    $linux = preg_match('/linux/i', $user_agent);
    $mac_powerpc = preg_match('/mac_powerpc/i', $user_agent);

    $osName = ''; // An empty variable is defined to store the message for each match
    
    //The browser would match any of the conditions listed below and assign the corresponding message to the
    // empty variable $osName
	if ($win10) {
		$osName = ' Windows 10';
	} else if ($win8_1) {
		$osName = ' Windows 8.1';
	} else if ($win8) {
		$osName = ' Windows 8';
	} else if ($win7){
		$osName = ' Windows 7';
	}  else if ($android) {
		$osName = ' Android';
	} else if ($ipad) {
		$osName = ' Ipad';
	} else if ($iphone) {
		$osName = ' Iphone';
	} else if ($ubuntu) {
		$osName = ' Ubuntu';
	} else if ($linux) {
		$osName = ' Linux';
	} else if ($mac_powerpc) {
		$osName = ' Mac Os';
	}else {
		$osName = 'Not Available';
	}
	return $osName; // Returns the corresponding Operating system
}

// This function is for getting the Browser the visitor is using
function getBrowser() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // Similarly, the following browsers have the corresponding patterns of regex which we only need to match
    // in order to have access to the $_SERVER['HTTP_USER_AGENT'] array
    $internetExplorer = preg_match('/MSIE/i', $user_agent);
    $operaMini = preg_match('/Opera/i', $user_agent);
    $firefox = preg_match('/Firefox/i', $user_agent);
    $chrome = preg_match('/Chrome/i', $user_agent);
    $ubrowser = preg_match('/ubrowser/i', $user_agent);
    
    $browserName = ''; // An empty variable is defined to store the message for each match
    
    //The browser would match any of the conditions listed below and assign the corresponding message to the
    // empty variable $browserName
    if ($internetExplorer) {
		$browserName = ' Internet Explorer';
	} elseif ($firefox) {
		$browserName = ' Mozilla Firefox';
	} elseif ($chrome) {
		$browserName = ' Google Chrome';
	} elseif ($apple) {
		$browserName = ' Apple Safari';
	} elseif ($operaMini) {
		$browserName = ' Opera';
	} else if ($ubrowser) {
		$browserName = ' UC Browser';
	} else {
		$browserName = 'Not Available';
    }
    return $browserName; // Returns the corresponding browser
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Visitor Information</title>
	<link rel="stylesheet" href="bootstrap4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6">
        <!-- The results from each function are displayed through lines 113, 117, & 121 respectively  -->
			<div class="row">
				<div class="col-md-6 h5">IP Address</div>
				<div class="col-md-6"><?php echo getIP();?></div> 
			</div>
			<div class="row">
				<div class="col-md-6 h5">Type of Browser</div>
				<div class="col-md-6"><?php echo getBrowser();?></div>
			</div>
			<div class="row">
				<div class="col-md-6 h5">Type of Operating system</div>
				<div class="col-md-6"><?php echo getOs();?></div>
			</div>
			<div class="row">
            <!-- This is still under study -->
				<div class="col-md-6 h5">Type of Device</div>
				<div class="col-md-6"><?php ?></div>
			</div>
		</div>
		<div class="col-md-6"></div>
	</div>
</div>
</body>
</html>