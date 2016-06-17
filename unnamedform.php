<?php

if (!include("include/cookiecheck.php"))
{
	header("Location: logout.php");
	exit;
}

require_once("include/head.php");
 
if ($user["canadd"] <> 1)
{
	header("Location: logout.php");
	exit;
}

if (!isset($_GET["send"]) OR res($_GET["send"]) <> 1)
{
	$result = $db->query("SELECT question FROM namedquestions ORDER BY id" );
	$questions = array();
	while ($question = mysqli_fetch_array($result))
	{
		$questions[] = $question;
	}
	$result->free();


	echo "
			<div class='navbar navbar-warning'>
				<div class='navbar-header'>
					<a class='navbar-brand' href='http://" . $_SERVER['HTTP_HOST'] . "'>$maintitle</a>
				</div>
				<div class='navbar-collapse collapse navbar-warning-collapse'>
					<ul class='nav navbar-nav navbar-right'>
						<li>
							<a href='index.php'>Vissza</a>
						</li>
						<li>
							<a href='logout.php'>Kijelentkezés</a>
						</li>
					</ul>
				</div>
			</div>

			<h2 class='well'>Köszöntünk a honlapon, " .$user["fullname"]. "!  Az alábbi űrlapon tudod értékelni az iskolát.</h2>
			<div class='row'>
				<div class='jumbotron col-md-12'>
					<form action='unnamedform.php?send=1' id='regForm' class='form-horizontal' method='POST'>
						<div class='col-md-4'></div>	
						<div class='col-md-4'>
							<label>Mennyire vagy elégedett az Illyésben kapott oktatással?
								<table class='table table-striped table-hover'>
									<tr class='success'>
										<th style='text-align:center;'>1</th>
										<th style='text-align:center;'>2</th>
										<th style='text-align:center;'>3</th>
										<th style='text-align:center;'>4</th>
										<th style='text-align:center;'>5</th>
									</tr>
									<tr>
										<td style='text-align:center;'>
											<div class='radio radio-primary'>
												<label>
													<input name='rating' type='radio' value='1'>
												</label>
											</div>
										</td>
										<td style='text-align:center;'>
											<div class='radio radio-primary'>
												<label>
													<input name='rating' type='radio' value='2'>
												</label>
											</div>
										</td>
										<td style='text-align:center;'>
											<div class='radio radio-primary'>
												<label>
													<input name='rating' type='radio' value='3' checked>
												</label>
											</div>
										</td>
										<td style='text-align:center;'>
											<div class='radio radio-primary'>
												<label>
													<input name='rating' type='radio' value='4'>
												</label>
											</div>
										</td>
										<td style='text-align:center;'>
											<div class='radio radio-primary'>
												<label>
													<input name='rating' type='radio' value='5'>
												</label>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan='5' style='text-align:center;'><button type='submit' class='btn btn-primary'>Elküldés
										</button></td>
									</tr>
								</table>
							</label>
						</div><br>
					</form>
				</div>
			</div>
	";
	exit;
}
if (isset($_GET["send"]) AND res($_GET["send"]) == 1 )
{
	if ($rating = (int)res($_POST["rating"]))
	{
		$rating = (int)res($_POST["rating"]);
	}
	else
	{
		header("Location: unnamedform.php");
		exit;
	}

	$date = '"' . date("Y-m-d H:i:s") . '"';


	$columns = "rating, dateofanswer";
	$values = "$rating, $date";


	if ($db->query("INSERT INTO unnamedanswers ($columns) VALUES ($values)"))
	{
		echo"
			<div class='alert alert-success'>
				<h3>A választ sikeresen eltároltuk.</h3>
			</div>
		";
		header("Refresh: 3; url=unnamedform.php");
		exit;
	}
	else
	{
		echo"
			<div class='alert alert-danger'>
				<h3>A válasz mentése közben váratlan hiba lépett fel, kérjük, próbálja meg később. <br>
				Ha a probléma továbbra is fennáll, kérjük lépjen kapcsolatba az üzemeltetőkkel.</h3>
			</div>
		";
		header("Refresh: 5; url=index.php");
		exit;
	}
	exit;
} 
exit;
?>