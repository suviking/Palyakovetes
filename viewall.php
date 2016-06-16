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



if (isset($_GET["all"]) AND !isset($_GET["edit"]) AND !isset($_GET["delete"]) AND !isset($_GET["id"]))	//show all answers
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
else if (isset($_GET["id"]) AND !isset($_GET["delete"]) AND !isset($_GET["all"]) AND !isset($_GET["edit"]))	//shows the asked answer's every data
{
	if ($id = (int)res($_GET["id"]))
	{
		$id = (int)res($_GET["id"]);
	}
	else
	{
		header("Loation: logout.php");
		exit;
	}

	$result = $db->query("SELECT question FROM namedquestions ORDER BY id" );
	$questions = array();
	while ($question = mysqli_fetch_array($result))
	{
		$questions[] = $question;
	}
	$result->free();

	$result = $db->query("SELECT * FROM namedanswers WHERE id=$id");
	$answer = array();
	while ($row = mysqli_fetch_array($result))
	{
		$answer[] = $row;
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
							<a href='viewall.php?all'>Vissza</a>
						</li>
						<li>
							<a href='logout.php'>Kijelentkezés</a>
						</li>
					</ul>
				</div>
			</div>

			<h2 class='well'>Köszöntünk a honlapon, " .$user["fullname"]. "!  Az alábbi űrlapon tudod szerkeszteni a kérdőívet.</h2>

			<div class='jumbotron col-lg-12'>

				<form action='sendform.php?send=1' id='regForm' class='form-horizontal' method='POST'>
					<fieldset>
						<legend>Általános információk</legend>

						<div class='form-group'>
							<label for='0' class='col-lg-2 control-label'>".$questions[0][0]."</label>
							<div class='col-lg-4'>
								<input id='0' class='form-control' name='0' type='text' maxlength='50' size='30' required='required' 
								value='".$answer[0][1]."' autofocus disabled>
							</div>
						</div>

						<div class='form-group'>
							<label for='1' class='col-lg-2 control-label'>".$questions[1][0]."</label>
							<div class='col-lg-4'>
								<input id='1' class='form-control' name='1' type='text' maxlength='50' size='50' required='required'
								value='".$answer[0][2]."' disabled>
							</div>
						</div>

						<div class='form-group'>
							<label for='2' class='col-lg-2 control-label'>".$questions[2][0]."</label>
							<div class='col-lg-4'>
								<input id='2' class='form-control' name='2' type='number' max='2100' min='2016' size='4' 
								required='required' value='".$answer[0][3]."' disabled>
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
										<input id='3' name='3' type='radio' value='Igen' onchange='disable1()' "; 
										echo ($answer[0][4]=='Igen')?'checked':''; echo " disabled>Igen
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='3' type='radio' value='Nem' onchange='disable1()' "; 
										echo ($answer[0][4]=='Nem')?'checked':''; echo " disabled>Nem
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='4f'"; echo ($answer[0][4]=='Nem')?'style="display: none;"':''; echo ">
							<label for='4' class='col-lg-2 control-label'>".$questions[4][0]."</label>
							<div class='col-lg-4' >
								<select class='form-control' id='4' name='4' require='require' disabled"; 
								echo ($answer[0][4]=='Nem')?'disabled':''; echo ">
									<option name='4' "; echo ($answer[0][5]=='Agrár')?'checked':''; echo ">Agrár</option>
									<option name='4' "; echo ($answer[0][5]=='Bölcsészettudomány')?'checked':''; echo ">Bölcsészettudomány</option>
									<option name='4' "; echo ($answer[0][5]=='Gazdaságtudomány')?'checked':''; echo ">Gazdaságtudomány</option>
									<option name='4' "; echo ($answer[0][5]=='Informatika')?'checked':''; echo ">Informatika</option>
									<option name='4' "; echo ($answer[0][5]=='Jogi')?'checked':''; echo ">Jogi</option>
									<option name='4' "; echo ($answer[0][5]=='Műszaki')?'checked':''; echo ">Műszaki</option>
									<option name='4' "; echo ($answer[0][5]=='Művészet')?'checked':''; echo ">Művészet</option>
									<option name='4' "; echo ($answer[0][5]=='Művészetközvetítés')?'checked':''; echo ">Művészetközvetítés</option>
									<option name='4' "; echo ($answer[0][5]=='Közigazgatási, rendészeti, katonai')?'checked':''; echo ">Közigazgatási, rendészeti, katonai</option>
									<option name='4' "; echo ($answer[0][5]=='Orvos- és egészségtudomány')?'checked':''; echo ">Orvos- és egészségtudomány</option>
									<option name='4' "; echo ($answer[0][5]=='Sporttudomány')?'checked':''; echo ">Sporttudomány</option>
									<option name='4' "; echo ($answer[0][5]=='Társadalomtudomány')?'checked':''; echo ">Társadalomtudomány</option>
									<option name='4' "; echo ($answer[0][5]=='Természettudomány')?'checked':''; echo ">Természettudomány</option>
								</select>
							</div>
						</div>

						<div class='form-group' id='5f' "; echo ($answer[0][4]=='Nem')?'style="display: none;"':''; echo ">
							<label class='col-lg-2 control-label'>".$questions[5][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='51' name='5' type='radio' value='Budapesten' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][6]=='Budapesten')?'checked':''; 
										echo " disabled>Budapesten
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='52' name='5' type='radio' value='Vidéken' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][6]=='Vidéken')?'checked':''; 
										echo " disabled>Vidéken
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='53' name='5' type='radio' value='Külföldön' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][6]=='Külföldön')?'checked':''; 
										echo " disabled>Külföldön
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='6f' "; echo ($answer[0][4]=='Nem')?'style="display: none;"':''; echo ">
							<label class='col-lg-2 control-label'>".$questions[6][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='61' name='6' type='radio' value='Egyetemi képzés' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][7]=='Egyetemi képzés')?'checked':'';
										echo " disabled>Egyetemi képzés
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='62' name='6' type='radio' value='Főiskolai képzés' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][7]=='Főiskolai képzés')?'checked':'';
										echo " disabled>Főiskolai képzés
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='63' name='6' type='radio' value='Felsőfokú szakképzés (OKJ)' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][7]=='Felsőfokú szakképzés (OKJ)')?'checked':'';
										echo " disabled>Felsőfokú szakképzés (OKJ)
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='7f' "; echo ($answer[0][4]=='Igen')?'style="display: none;"':''; echo ">
							<label for='7' class='col-lg-2 control-label'>".$questions[7][0]."</label>
							<div class='col-lg-4'>
								<textarea class='form-control' id='7' form='regForm' cols='30' rows='2' maxlength='500' name='7' required"; 
										echo ($answer[0][4]=='Igen')?'disabled':''; echo " disabled>".$answer[0][8]."</textarea>
							</div>
						</div>

						<div class='form-group'>
							<label for='8' class='col-lg-2 control-label'>".$questions[8][0]."</label>
							<div class='col-lg-10 checkbox' id='8'>
								<label>
									<input name='a[]' type='checkbox' value='Dolgozom' disabled> Dolgozom
								</label><br>
								<label>
									<input name='a[]' type='checkbox' value='A következő évi felvételire készülök' disabled> A következő évi felvételire készülök
								</label><br>
								<label>
									<input name='a[]' type='checkbox' value='Pénzt keresek' disabled> Pénzt keresek
								</label><br>
								<label>
									<input id='82' name='a[]' type='checkbox' value='Egyéb' onclick='disable2()' disabled> Egyéb:
									<textarea class='form-control' id='81' form='regForm' cols='57' rows='2' maxlength='50' 
									name='81' style='display: none;' disabled></textarea>
								</label>
							</div>
						</div>

						<div class='form-group'>
							<label class='col-lg-2 control-label'>".$questions[9][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input name='9' type='radio' value='Budapesten' "; 
										echo ($answer[0][10]=='Budapesten')?'checked':''; echo " disabled>Budapesten
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='9' type='radio' value='Vidéken' "; 
										echo ($answer[0][10]=='Vidéken')?'checked':''; echo " disabled>Vidéken
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='9' type='radio' value='Külföldön' "; 
										echo ($answer[0][10]=='Külföldön')?'checked':''; echo " disabled>Külföldön
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
										<input id='10' name='10' type='radio' value='Igen' onchange='disable3()'"; 
										echo ($answer[0][11]=='Igen')?'checked':''; echo " disabled>Igen
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='10' type='radio' value='Nem' onchange='disable3()'"; 
										echo ($answer[0][11]=='Nem')?'checked':''; echo " disabled>Nem
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='11f' "; echo ($answer[0][11]=='Nem')?'style="display: none;"':''; echo ">
							<label class='col-lg-2 control-label'>".$questions[11][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='111' name='11' type='radio' value='Fél év' "; 
										echo ($answer[0][12]=='Fél év')?'checked':''; echo " disabled>Fél év
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='112' name='11' type='radio' value='Egy év' "; 
										echo ($answer[0][12]=='Egy év')?'checked':''; echo " disabled>Egy év
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='113' name='11' type='radio' value='Több, mint egy év' "; 
										echo ($answer[0][12]=='Több, mint egy év')?'checked':''; echo " disabled>Több, mint egy év
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='12f' "; echo ($answer[0][11]=='Nem')?'style="display: none;"':''; echo ">
							<label for='12' class='col-lg-2 control-label'>".$questions[12][0]."</label>
							<div class='col-lg-4'>
								<textarea class='form-control' id='12' form='regForm' cols='30' rows='2' maxlength='50' name='12' required disabled>"
								.$answer[0][13]."</textarea>
							</div>
						</div>

						<div class='form-group'>
							<label for='13' class='col-lg-2 control-label'>Megjegyzés</label>
							<div class='col-lg-4'>
								<textarea class='form-control' id='13' form='regForm' cols='30' rows='2' maxlength='50' name='comment' disabled>"
								.$answer[0][14]."</textarea>
							</div>
						</div>

					</fieldset>
				</form>
			</div>
	";
	exit;
}
else if (isset($_GET["edit"]) AND !isset($_GET["delete"]) AND !isset($_GET["all"]) AND !isset($_GET["id"]))	//edit the asked answer
{
	if ($id = (int)res($_GET["edit"]))
	{
		$id = (int)res($_GET["edit"]);
	}
	else
	{
		header("Loation: logout.php");
		exit;
	}

	$result = $db->query("SELECT question FROM namedquestions ORDER BY id" );
	$questions = array();
	while ($question = mysqli_fetch_array($result))
	{
		$questions[] = $question;
	}
	$result->free();

	$result = $db->query("SELECT * FROM namedanswers WHERE id=$id");
	$answer = array();
	while ($row = mysqli_fetch_array($result))
	{
		$answer[] = $row;
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
							<a href='viewall.php?all'>Vissza</a>
						</li>
						<li>
							<a href='logout.php'>Kijelentkezés</a>
						</li>
					</ul>
				</div>
			</div>

			<h2 class='well'>Köszöntünk a honlapon, " .$user["fullname"]. "!  Az alábbi űrlapon tudod szerkeszteni a kérdőívet.</h2>

			<div class='jumbotron col-lg-12'>

				<form action='sendform.php?send=1' id='regForm' class='form-horizontal' method='POST'>
					<fieldset>
						<legend>Általános információk</legend>

						<div class='form-group'>
							<label for='0' class='col-lg-2 control-label'>".$questions[0][0]."</label>
							<div class='col-lg-4'>
								<input id='0' class='form-control' name='0' type='text' maxlength='50' size='30' required='required' 
								value='".$answer[0][1]."' autofocus>
							</div>
						</div>

						<div class='form-group'>
							<label for='1' class='col-lg-2 control-label'>".$questions[1][0]."</label>
							<div class='col-lg-4'>
								<input id='1' class='form-control' name='1' type='text' maxlength='50' size='50' required='required'
								value='".$answer[0][2]."' >
							</div>
						</div>

						<div class='form-group'>
							<label for='2' class='col-lg-2 control-label'>".$questions[2][0]."</label>
							<div class='col-lg-4'>
								<input id='2' class='form-control' name='2' type='number' max='2100' min='2016' size='4' 
								required='required' value='".$answer[0][3]."' >
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
										<input id='3' name='3' type='radio' value='Igen' onchange='disable1()' "; echo ($answer[0][4]=='Igen')?'checked':''; echo ">Igen
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='3' type='radio' value='Nem' onchange='disable1()' "; echo ($answer[0][4]=='Nem')?'checked':''; echo ">Nem
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='4f'"; echo ($answer[0][4]=='Nem')?'style="display: none;"':''; echo ">
							<label for='4' class='col-lg-2 control-label'>".$questions[4][0]."</label>
							<div class='col-lg-4' >
								<select class='form-control' id='4' name='4' require='require' "; 
								echo ($answer[0][4]=='Nem')?'disabled':''; echo ">
									<option name='4' "; echo ($answer[0][5]=='Agrár')?'checked':''; echo ">Agrár</option>
									<option name='4' "; echo ($answer[0][5]=='Bölcsészettudomány')?'checked':''; echo ">Bölcsészettudomány</option>
									<option name='4' "; echo ($answer[0][5]=='Gazdaságtudomány')?'checked':''; echo ">Gazdaságtudomány</option>
									<option name='4' "; echo ($answer[0][5]=='Informatika')?'checked':''; echo ">Informatika</option>
									<option name='4' "; echo ($answer[0][5]=='Jogi')?'checked':''; echo ">Jogi</option>
									<option name='4' "; echo ($answer[0][5]=='Műszaki')?'checked':''; echo ">Műszaki</option>
									<option name='4' "; echo ($answer[0][5]=='Művészet')?'checked':''; echo ">Művészet</option>
									<option name='4' "; echo ($answer[0][5]=='Művészetközvetítés')?'checked':''; echo ">Művészetközvetítés</option>
									<option name='4' "; echo ($answer[0][5]=='Közigazgatási, rendészeti, katonai')?'checked':''; echo ">Közigazgatási, rendészeti, katonai</option>
									<option name='4' "; echo ($answer[0][5]=='Orvos- és egészségtudomány')?'checked':''; echo ">Orvos- és egészségtudomány</option>
									<option name='4' "; echo ($answer[0][5]=='Sporttudomány')?'checked':''; echo ">Sporttudomány</option>
									<option name='4' "; echo ($answer[0][5]=='Társadalomtudomány')?'checked':''; echo ">Társadalomtudomány</option>
									<option name='4' "; echo ($answer[0][5]=='Természettudomány')?'checked':''; echo ">Természettudomány</option>
								</select>
							</div>
						</div>

						<div class='form-group' id='5f' "; echo ($answer[0][4]=='Nem')?'style="display: none;"':''; echo ">
							<label class='col-lg-2 control-label'>".$questions[5][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='51' name='5' type='radio' value='Budapesten' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][6]=='Budapesten')?'checked':''; echo ">Budapesten
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='52' name='5' type='radio' value='Vidéken' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][6]=='Vidéken')?'checked':''; echo ">Vidéken
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='53' name='5' type='radio' value='Külföldön' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][6]=='Külföldön')?'checked':''; echo ">Külföldön
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='6f' "; echo ($answer[0][4]=='Nem')?'style="display: none;"':''; echo ">
							<label class='col-lg-2 control-label'>".$questions[6][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='61' name='6' type='radio' value='Egyetemi képzés' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][7]=='Egyetemi képzés')?'checked':'';
										echo ">Egyetemi képzés
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='62' name='6' type='radio' value='Főiskolai képzés' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][7]=='Főiskolai képzés')?'checked':'';
										echo ">Főiskolai képzés
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='63' name='6' type='radio' value='Felsőfokú szakképzés (OKJ)' "; 
										echo ($answer[0][4]=='Nem')?'disabled':''; echo ($answer[0][7]=='Felsőfokú szakképzés (OKJ)')?'checked':'';
										echo ">Felsőfokú szakképzés (OKJ)
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='7f' "; echo ($answer[0][4]=='Igen')?'style="display: none;"':''; echo ">
							<label for='7' class='col-lg-2 control-label'>".$questions[7][0]."</label>
							<div class='col-lg-4'>
								<textarea class='form-control' id='7' form='regForm' cols='30' rows='2' maxlength='500' name='7' required"; 
										echo ($answer[0][4]=='Igen')?'disabled':''; echo ">".$answer[0][8]."</textarea>
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
										<input name='9' type='radio' value='Budapesten' "; 
										echo ($answer[0][10]=='Budapesten')?'checked':''; echo ">Budapesten
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='9' type='radio' value='Vidéken' "; 
										echo ($answer[0][10]=='Vidéken')?'checked':''; echo ">Vidéken
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='9' type='radio' value='Külföldön' "; 
										echo ($answer[0][10]=='Külföldön')?'checked':''; echo ">Külföldön
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
										<input id='10' name='10' type='radio' value='Igen' onchange='disable3()' "; 
										echo ($answer[0][11]=='Igen')?'checked':''; echo ">Igen
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input name='10' type='radio' value='Nem' onchange='disable3()' "; 
										echo ($answer[0][11]=='Nem')?'checked':''; echo ">Nem
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='11f' "; echo ($answer[0][11]=='Nem')?'style="display: none;"':''; echo ">
							<label class='col-lg-2 control-label'>".$questions[11][0]."</label>
							<div class='col-lg-4'>
								<div class='radio radio-primary'>
									<label>
										<input id='111' name='11' type='radio' value='Fél év' "; 
										echo ($answer[0][12]=='Fél év')?'checked':''; echo ">Fél év
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='112' name='11' type='radio' value='Egy év' "; 
										echo ($answer[0][12]=='Egy év')?'checked':''; echo ">Egy év
									</label>
								</div>
								<div class='radio radio-primary'>
									<label>
										<input id='113' name='11' type='radio' value='Több, mint egy év' "; 
										echo ($answer[0][12]=='Több, mint egy év')?'checked':''; echo ">Több, mint egy év
									</label>
								</div>
							</div>
						</div>

						<div class='form-group' id='12f' "; echo ($answer[0][11]=='Nem')?'style="display: none;"':''; echo ">
							<label for='12' class='col-lg-2 control-label'>".$questions[12][0]."</label>
							<div class='col-lg-4'>
								<textarea class='form-control' id='12' form='regForm' cols='30' rows='2' maxlength='50' name='12' required>"
								.$answer[0][13]."</textarea>
							</div>
						</div>

						<div class='form-group'>
							<label for='13' class='col-lg-2 control-label'>Megjegyzés</label>
							<div class='col-lg-4'>
								<textarea class='form-control' id='13' form='regForm' cols='30' rows='2' maxlength='50' name='comment'>"
								.$answer[0][14]."</textarea>
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
else if (isset($_GET["delete"]) AND !isset($_GET["edit"]) AND !isset($_GET["all"]) AND !isset($_GET["id"]))	//deletes the asked answer
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