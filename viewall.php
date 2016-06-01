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



if (isset($_GET["all"]))
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

	$funtionButtons = "";
	if ($user["canedit"])
	{
		$funtionButtons .= "<a href='' class='btn btn-info'>Szerkesztés</a>";
	}



	if (empty($_POST["year"]))
	{
		$year = "WHERE 1=1";
	}
	else
	{
		if ($year = "WHERE Q3 = ". (int)res($_POST["year"]))
		{}
		else
		{
			$year = "WHERE 1=1";
		}
	}

	$result = $db->query("SELECT Q1, Q2, Q3, Q4, id FROM namedanswers ".$year." ORDER BY id") OR die($db->error);
	$answers = array();
	while ($row = mysqli_fetch_assoc($result))
	{
		$answers[] = $row;
	}
	if (empty($answers))
	{
		echo "<p>Még nincs feltöltött kérdőív.</p>";
	}
	else 
	{
		echo "
				<table class='table table-striped table-hover '>
					<th>Név</th>
					<th>E-mail</th>
					<th>Végzés éve</th>
					<th>Továbbtanul?</th>
					<th></th>
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
				echo "<td align='right' style='width: 300px'>
						<a href='viewall.php?edit=$id' class='btn btn-info'>Szerkesztés</a>
						<a href='viewall.php?delete=$id' class='btn btn-danger'>Törlés</a></td>
					</tr>";
			}
			echo "</table> </div>";
	}
}



?>