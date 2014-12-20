<html>
<head>
<script type="text/javascript">
	function hideElementByVisible(obj) {
		document.getElementById(obj).style.visibility = "hidden";
	}

	function showElementByVisible(obj) {
		document.getElementById(obj).style.visibility = "visible";
	}

	function hideElementByDisplay(obj) {
		document.getElementById(obj).style.display = "none";
	}

	function showElementDisplay(obj) {
		document.getElementById(obj).style.display = "inline";
	}

	function showElementByDisplay(obj,prop) {
		if(prop == "block") {
			document.getElementById(obj).style.display = "block";
		}
		else if(prop == "inline") {
			document.getElementById(obj).style.display = "inline";
		}
	}


</script>
</head>
<body>
<input type="text" name="txtname" id="txtname" value="TextBox1" />
<input type="text" name="txtname1" id="txtname1" value="TextBox2" /><br />
Visible:<br />
<input type="button" value="Hide Element - TextBox1" onClick="hideElementByVisible('txtname');" />
<input type="button" value="Show Element - TextBox1" onClick="showElementByVisible('txtname');" /><br /><br />
Display:<br />
<input type="button" value="Hide Element - TextBox1" onClick="hideElementByDisplay('txtname');" />
<input type="button" value="Show Element - TextBox1" onClick="showElementDisplay('txtname');" /><br /><br />

Paragraph Show<br />
<input type="button" value="Show Element With Paragraph - TextBox2" onClick="showElementByDisplay('txtname','block');" />
</body>
</html>