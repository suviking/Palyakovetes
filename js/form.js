function disable1()
{
	var radio = document.getElementById("3");
	if (radio.checked)
	{
		document.getElementById("4").disabled = false;
		document.getElementById("4f").style.display = "block";
		document.getElementById("51").disabled = false;
		document.getElementById("52").disabled = false;
		document.getElementById("53").disabled = false;
		document.getElementById("5f").style.display = "block";
		document.getElementById("61").disabled = false;
		document.getElementById("62").disabled = false;
		document.getElementById("63").disabled = false;
		document.getElementById("6f").style.display = "block";
		document.getElementById("7").disabled = true;
		document.getElementById("7f").style.display = "none";
	}
	else
	{
		document.getElementById("4").disabled = true;
		document.getElementById("4f").style.display = "none";
		document.getElementById("51").disabled = true;
		document.getElementById("52").disabled = true;
		document.getElementById("53").disabled = true;
		document.getElementById("5f").style.display = "none";
		document.getElementById("61").disabled = true;
		document.getElementById("62").disabled = true;
		document.getElementById("63").disabled = true;
		document.getElementById("6f").style.display = "none";
		document.getElementById("7").disabled = false;
		document.getElementById("7f").style.display = "block";
	}
}

function disable2()
{
	var checkB = document.getElementById("82");
	if (checkB.checked)
	{
		document.getElementById("81").disabled = false;
		document.getElementById("81").style.display = "block";
		document.getElementById("81").focus();

	}
	else
	{
		document.getElementById("81").disabled = true;
		document.getElementById("81").style.display = "none";
	}
}

function disable3()
{

	var radio = document.getElementById("10");
	if (radio.checked)
	{
		document.getElementById("111").disabled = false;
		document.getElementById("112").disabled = false;
		document.getElementById("113").disabled = false;
		document.getElementById("11f").style.display = "block";

		document.getElementById("12").disabled = false;
		document.getElementById("12f").style.display = "block";

	}
	else
	{
		document.getElementById("111").disabled = true;
		document.getElementById("112").disabled = true;
		document.getElementById("113").disabled = true;
		document.getElementById("11f").style.display = "none";

		document.getElementById("12").disabled = true;
		document.getElementById("12f").style.display = "none";
	}
}