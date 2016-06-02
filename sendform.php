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

			<h2 class='well'>Köszöntünk a honlapon, " .$user["fullname"]. "!  Az alábbi űrlapon tudod megválaszolni a kérdőívet.</h2>

			<div class='jumbotron col-lg-12'>

				<form action='sendform.php?send=1' id='regForm' class='form-horizontal' method='POST'>
					<fieldset>
						<legend>Általános információk</legend>

						<div class='form-group'>
							<label for='0' class='col-lg-2 control-label'>".$questions[0][0]."</label>
							<div class='col-lg-4'>
								<input id='0' class='form-control' name='0' type='text' maxlength='50' size='30' required='required' autofocus>
							</div>
						</div>

						<div class='form-group'>
							<label for='1' class='col-lg-2 control-label'>".$questions[1][0]."</label>
							<div class='col-lg-4'>
								<input id='1' class='form-control' name='1' type='text' maxlength='50' size='50' required='required'>
							</div>
						</div>

						<div class='form-group'>
							<label for='2' class='col-lg-2 control-label'>".$questions[2][0]."</label>
							<div class='col-lg-4'>
								<input id='2' class='form-control' name='2' type='number' max='2100' min='2016' size='4' required='required'>
							</div>
						</div>
					</fieldset><br>

					<fieldset>
						<legend>Továbbtanulás</legend>

						<div class='form-group'>
							<label class='col-lg-2 control-label'>".$questions[3][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='3' name='3' type='radio' value='Igen' onchange='disable1()' checked>Igen
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='3' type='radio' value='Nem' onchange='disable1()'>Nem
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='4f'>
							<label for='4' class='col-lg-2 control-label'>".$questions[4][0]."</label>
							<div class='col-lg-4' >
								<select class='form-control' id='4' name='4' require='require'>
									<option name='4'>Agrár</option>
									<option name='4'>Bölcsészettudomány</option>
									<option name='4'>Gazdaságtudomány</option>
									<option name='4'>Informatika</option>
									<option name='4'>Jogi</option>
									<option name='4'>Műszaki</option>
									<option name='4'>Művészet</option>
									<option name='4'>Művészetközvetítés</option>
									<option name='4'>Közigazgatási, rendészeti, katonai</option>
									<option name='4'>Orvos- és egészségtudomány</option>
									<option name='4'>Sporttudomány</option>
									<option name='4'>Társadalomtudomány</option>
									<option name='4'>Természettudomány</option>
								</select>
							</div>
						</div>

						<div class='form-group' id='5f'>
							<label class='col-lg-2 control-label'>".$questions[5][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='51' name='5' type='radio' value='Budapesten' checked>Budapesten
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='52' name='5' type='radio' value='Vidéken'>Vidéken
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='53' name='5' type='radio' value='Külföldön'>Külföldön
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='6f'>
							<label class='col-lg-2 control-label'>".$questions[6][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='61' name='6' type='radio' value='Egyetemi képzés' checked>Egyetemi képzés
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='62' name='6' type='radio' value='Főiskolai képzés'>Főiskolai képzés
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='63' name='6' type='radio' value='Felsőfokú szakképzés (OKJ)'>Felsőfokú szakképzés (OKJ)
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='7f' style='display:none;'>
							<label for='7' class='col-lg-2 control-label'>".$questions[7][0]."</label>
							<div class='col-lg-4'>
								<textarea class='form-control' id='7' form='regForm' cols='30' rows='2' maxlength='500' name='7' disabled></textarea>
							</div>
						</div>

						<div class='form-group'>
							<label for='8' class='col-lg-2 control-label'>".$questions[8][0]."</label>
							<div class='col-lg-10 checkbox' id='8'>
								<label>
									<input name='a[]' type='checkbox' value='Dolgozom'> Dolgozom
								</label><br>
								<label>
									<input name='a[]' type='checkbox' value='A következő évi felvételire készülök'> A következő évi felvételire készülök
								</label><br>
								<label>
									<input name='a[]' type='checkbox' value='Pénzt keresek'> Pénzt keresek
								</label><br>
								<label>
									<input id='82' name='a[]' type='checkbox' value='Egyéb' onclick='disable2()'> Egyéb:
									<textarea class='form-control' id='81' form='regForm' cols='57' rows='2' maxlength='50' name='81' style='display: none;' disabled></textarea>
								</label>
							</div>
						</div>

						<div class='form-group'>
							<label class='col-lg-2 control-label'>".$questions[9][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input name='9' type='radio' value='Budapesten' checked>Budapesten
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='9' type='radio' value='Vidéken'>Vidéken
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='9' type='radio' value='Külföldön'>Külföldön
									</label>
								</div>
							</div>
						</div>
					</fieldset><br>


					<fieldset>
						<legend>Külföldi tanulmányok</legend>
						<div class='form-group'>
							<label class='col-lg-2 control-label'>".$questions[10][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='10' name='10' type='radio' value='1' onchange='disable3()' checked>Igen
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='10' type='radio' value='0' onchange='disable3()'>Nem
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='11f'>
							<label class='col-lg-2 control-label'>".$questions[11][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='111' name='11' type='radio' value='Fél év' checked>Fél év
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='112' name='11' type='radio' value='Egy év'>Egy év
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='113' name='11' type='radio' value='Több, mint egy év'>Több, mint egy év
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='12f'>
							<label for='12' class='col-lg-2 control-label'>".$questions[12][0]."</label>
							<div class='col-lg-4'>
								<textarea class='form-control' id='12' form='regForm' cols='30' rows='2' maxlength='50' name='12'></textarea>
							</div>
						</div>

						<div class='form-group'>
							<label for='13' class='col-lg-2 control-label'>Megjegyzés</label>
							<div class='col-lg-4'>
								<textarea class='form-control' id='13' form='regForm' cols='30' rows='2' maxlength='50' name='comment'></textarea>
							</div>
						</div>
				
						<div class='form-group col-lg-10 col-lg-offset-2'>
							 <button type='submit' class='btn btn-primary'>Elküldés</button>
						</div>

					</fieldset>
				</form>
			</div>
	";
	exit;
}
if (isset($_GET["send"]) AND res($_GET["send"]) == 1 )
{
	for ($i = 0; $i < 13; $i++)
	{
		if ($i == 8)
		{
			$answer_8 = "";
			if (!empty($_POST["a"]))
			{
				foreach($_POST["a"] as $check)
				{
					$answer_8 .= res($check) . "; ";
				}
				$answer_8 = mb_substr($answer_8, 0, -2);
			}
		}
		else
		{
			if (${"answer_$i"} = (int)trim(res($_POST[$i]), " \t\n\r\0\x0B")) 
			{}
			else
			{
				${"answer_$i"} = trim(res($_POST[$i]), " \t\n\r\0\x0B");
			}

			
		}
	}

	$answer_81 = res($_POST[81]);
	$comment = '"' . res($_POST["comment"]) . '"';
	$date = '"' . date("Y-m-d H:i:s") . '"';
	
	if ($answer_8 <> "")
	{
		$answer_8 .= ": ".$answer_81;
	}
	else
	{
		$answer_8 = "A fentiek közül egyik sem.";
	}

	$columns = "";
	$values = "";
	for ($i=0; $i < 13; $i++)
	{ 
		$columns .= 'Q' . ($i+1) . ', ';

		if (gettype(${"answer_$i"}) == "string")
		{
			$values .= '"'.${"answer_$i"} . '", ';
		}
		else
		{
			$values .= ${"answer_$i"} . ", ";
		}

	}
	$columns .= "comment, dateofanswer";
	$values .= "$comment, $date";
	// die("INSERT INTO namedanswers ($columns) VALUES ($values)");

	if ($db->query("INSERT INTO namedanswers ($columns) VALUES ($values)"))
	{
		echo"
			<div class='alert alert-success'>
				<h3>A választ sikeresen eltároltuk.</h3>
			</div>
		";
		header("Refresh: 3; url=index.php");
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