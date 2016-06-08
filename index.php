<?php

if (!include("include/cookiecheck.php"))
{
	header("Location: logout.php");
	exit;
}


require_once("include/head.php");




if ($user["type"] == 0) //if the user is an EGYOSZ member, only uploading the paper questionary or administrate
{
	$userfunctions = "";
	
	if ($user["canadd"])
	{
		$userfunctions .= "
		<li>
			<a href='sendform.php'>Válasz beküldése</a>
		</li>
		<li>
			<a href='unnamedform.php'>Névtelen értékelés</a>
		</li>";
	}
	if ($user["canview"])
	{
		$userfunctions .= "
		<li>
			<a href='viewall.php?all'>Válaszok megtekintése</a>
		</li>";
	}
	if ($user["canmanageusers"])
	{
		$userfunctions .= "	
		<li>
			<a href='manageusers.php'>Felhasználók kezelése</a>
		</li>";
	}
	


	echo "
			<div class='navbar navbar-warning'>
				<div class='navbar-header'>
					<a class='navbar-brand' href='http://" . $_SERVER['HTTP_HOST'] . "'>$maintitle</a>
				</div>
				<div class='navbar-collapse collapse navbar-warning-collapse'>
					<ul class='nav navbar-nav navbar-right'>
						" .$userfunctions. "
						<li>
							<a href='logout.php'>Kijelentkezés</a>
						</li>
					</ul>
				</div>
			</div>

			<h2 class='well'>Köszöntünk a honlapon, " .$user["fullname"]. "!</h2>";
			exit;
}
exit;
?>