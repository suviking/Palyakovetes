<?php

if (!include("include/cookiecheck.php"))
{
	header("Location: logout.php");
	exit;
}

require_once("include/head.php");

if ($user["canview"] <> 1 OR $user["type"] <> 0)
{
	header("Location: logout.php");
	exit;
}



if (isset($_GET["all"]) AND !isset($_GET["edit"]) AND !isset($_GET["delete"]) AND !isset($_GET["id"]))
{
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
				<form action='viewall.php?all' id='regForm' class='form-horizontal' method='POST'>
					<legend>Szűrési feltételek</legend>
					<div class='form-group'>
						<label for='2' class='col-lg-2 control-label'>Végzés éve</label>
						<div class='col-lg-1'>
							<input id='2' class='form-control' name='year' type='number' max='2100' min='2016' size='4' autofocus>	
						</div>
						<button type='submit' class='btn btn-primary'>Szűrés</button>
					</div>
				</form>
			
		";



	if (empty($_POST["year"]))
	{
		$year = "1=1";
	}
	else
	{
		if ($year = "Q3 = ". (int)res($_POST["year"]))
		{}
		else
		{
			$year = "1=1";
		}
	}

	$result = $db->query("SELECT Q1, Q2, Q3, Q4, id FROM namedanswers WHERE deleted = 0 AND ".$year." ORDER BY id") OR die($db->error);
	$answers = array();
	while ($row = mysqli_fetch_assoc($result))
	{
		$answers[] = $row;
	}

	if ($user["canedit"])
	{
		$editButt = 1;
	}
	else
	{
		$editButt = 0;
	}
	if ($user["candelete"])
	{
		$deleteButt = 1;
	}
	else
	{
		$deleteButt = 0;
	}




	if (empty($answers))
	{
		echo "<p>Még nincs feltöltött kérdőív.</p>";
	}
	else 
	{
		echo "
				<table class='table table-striped table-hover '>
					<tr class='success'>
						<th>Név</th>
						<th>E-mail</th>
						<th>Végzés éve</th>
						<th>Továbbtanul?</th>
						<th></th>
					</tr>
			";
			foreach ($answers as $row) 
			{
				echo "<tr>";
				$count = count($row);
				foreach ($row as $value)
				{
					if (--$count <= 0)
					{
						$id = (int)$value;
					}
					else
					{
						echo "<td>$value</td>";
					}
				}
				echo "<td align='right' style='width: 450px'>";
						echo "<a href='viewall.php?id=$id' class='btn btn-flat btn-primary'>Megtekintés</a>";
						if ($editButt == 1)
						{
							echo "<a href='viewall.php?edit=$id' class='btn btn-flat btn-info'>Szerkesztés</a>";
						}
						else
						{
							echo "<a class='btn btn-flat btn-info' disabled>Szerkesztés</a>";
						}
						if ($deleteButt == 1)
						{
							echo "<a href='viewall.php?delete=$id' class='btn btn-flat btn-danger'>Törlés</a>";
						}
						else
						{
							echo "<a class='btn btn-flat btn-danger' disabled>Törlés</a>";
						}
					echo "</td></tr>";
			}
			echo "</table> </div>";
	}
exit;
}
else if (isset($_GET["id"]) AND !isset($_GET["delete"]) AND !isset($_GET["all"]) AND !isset($_GET["edit"]))
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
else if (isset($_GET["edit"]) AND !isset($_GET["delete"]) AND !isset($_GET["all"]) AND !isset($_GET["id"]))
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
else if (isset($_GET["delete"]) AND !isset($_GET["edit"]) AND !isset($_GET["all"]) AND !isset($_GET["id"]))
{
	if ($id = (int)res($_GET["delete"]))
	{
		$id = (int)res($_GET["delete"]);
	}
	else
	{
		header("Location: logout.php");
		exit;
	}

	if ($db->query("UPDATE namedanswers SET deleted=1 WHERE id=$id"))
	{
		echo"
			<div class='alert alert-success'>
				<h3>A választ sikeresen töröltük.</h3>
			</div>
		";
		header("Refresh: 3; url=viewall.php?all");
		exit;
	}
	else
	{
		echo"
			<div class='alert alert-danger'>
				<h3>A válasz törlése közben váratlan hiba lépett fel, kérjük, próbálja meg később. <br>
				Ha a probléma továbbra is fennáll, kérjük lépjen kapcsolatba az üzemeltetőkkel.</h3>
			</div>
		";
		die($db->error);
		header("Refresh: 5; url=viewall.php?all");
		exit;
	}
	exit;
}
else
{
	header("Location: logout.php");
	exit;
}



exit;
?>