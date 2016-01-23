<html>
<?
include("include.php");
?>
<head>
<title>FORM</title>
<style type="text/css">
	      body {
		padding-top: 20px;
		padding-bottom: 0px;
	      }

	      .form-signin {
		max-width: 350px;
		padding: 0px 30px 30px;
		margin: 0 auto 0px;
		background-color: #fff;
		border: 1px solid #e5e5e5;
		-webkit-border-radius: 5px;
		   -moz-border-radius: 5px;
		        border-radius: 5px;
		-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		        box-shadow: 0 1px 2px rgba(0,0,0,.05);
	      }
	      .form-signin .form-signin-heading,
	      .form-signin .checkbox {
		margin-bottom: 5px;
	      }
	      .form-signin input[type="text"],
	      .form-signin input[type="text"] {
		font-size: 16px;
		height: auto;
		margin-bottom: 10px;
		padding: 7px 9px;
	      }
		.one
	{
		color:green;
		font-weight:bold;
	}
	    </style>

</head>

<body>
<p style="position:fixed;top:200px;right:80px;color:blue;font-size:1.2em;font-family:arial;" id="message">hai</p>
<center>
<fieldset>
      		<center><font color="indigo"><h2 class="form-signin-heading">Create Account</h2></font></center>
<form action="bank.php" method="post"  enctype="multipart/form-data" name="myform" onsubmit="return validate_form(this)" onreset="return res()" >

<table class="table" style="width:50%"  border="0" cellpadding="10" cellspacing="15">
	<tr class="info">
	<td class="one">Name:-</td>
	<td >
<input type="text" name="uname"  onchange="uppercase(this.id)" onblur="setstyle2(this.id)"  onfocus="setstyle(this.id)" id="uname"></td>
	</tr>
	
	<tr class="success">
	<td class="one">Password:-</td>
	<td><input type="password" name="passwd" id="passwd" onblur="setstyle2(this.id)"  onfocus="setstyle(this.id)" ></td>
	</tr>		
<tr class="info">
	<td width="35%" class="one">Date of Birth:-</td>
	<td width="65%" >
 
																		<select id="d1" name="d1" style='width:70px;height:;' >
																			<option selected="selected" value="0" style='background:grey;'">DD</option>
																				<option value="01">1</option>
																				<option value="02">2</option>
																				<option value="03">3</option>
																				<option value="04">4</option>
																				<option value="05">5</option>
																				<option value="06">6</option>
																				<option value="07">7</option>
																				<option value="08">8</option>
																				<option value="09">9</option>
																				<option value="10">10</option>
																				<option value="11">11</option>
																				<option value="12">12</option>
																				<option value="13">13</option>
																				<option value="14">14</option>
																				<option value="15">15</option>
																				<option value="16">16</option>
																				<option value="17">17</option>
																				<option value="18">18</option>
																				<option value="19">19</option>
																				<option value="20">20</option>
																				<option value="21">21</option>
																				<option value="22">22</option>
																				<option value="23">23</option>
																				<option value="24">24</option>
																				<option value="25">25</option>
																				<option value="26">26</option>
																				<option value="27">27</option>
																				<option value="28">28</option>
																				<option value="29">29</option>
																				<option value="30">30</option>
																				<option value="31">31</option>
																		</select>
																		<select id="d2" name="d2" style='width:70px;height:;'  >
																			<option selected="selected" value="0">MM</option>
																				<option value="01">Jan</option>
																				<option value="02">Feb</option>
																				<option value="03">Mar</option>
																				<option value="04">Apr</option>
																				<option value="05">May</option>
																				<option value="06">Jun</option>
																				<option value="07">Jul</option>
																				<option value="08">Aug</option>
																				<option value="09">Sep</option>
																				<option value="10">Oct</option>
																				<option value="11">Nov</option>
																				<option value="12">Dec</option>
																		</select>
																		<select id="d3" name="d3" style='width:100px;height:;' >
																			<option selected="selected" value="0">YYYY</option>
																																			<option value="1991">1991</option>
																				<option value="1992">1992</option>
																				<option value="1993">1993</option>
																				<option value="1994">1994</option>
																				<option value="1995">1995</option>
																				<option value="1996">1996</option>
																				<option value="1997">1997</option>
																				<option value="1998">1998</option>
																				<option value="1999">1999</option>
																				<option value="2000">2000</option>
																				<option value="2001">2001</option>
																				<option value="2002">2002</option>
																				<option value="2003">2003</option>
																				<option value="2004">2004</option>
																				<option value="2005">2005</option>
																				<option value="2006">2006</option>
																				<option value="2007">2007</option>
																				<option value="2008">2008</option>
																				<option value="2009">2009</option>
																				<option value="2010">2010</option>
																				<option value="2011">2011</option>
																	</select>
	<tr class="success">
	<td class="one">Gender:-</td>
	<td>
       <input type="radio" name="gender" value="male" id="myCheck" >Male&nbsp;&nbsp;
	<input type="radio" name="gender" value="female" id="myCheck2">Female</td>
	</tr>

	<tr class="info">
	<td class="one">Account Type:-</td>
	<td>
        <input type="radio" name="acctype" value="ca" id="myCheck3">CA&nbsp;&nbsp;
	<input type="radio" name="acctype" value="sa" id="myCheck4">SA</td>
	</tr>

	<tr class="success">
	<td class="one">Phone:-</td>
	<td><input type="text" name="phno" id="phno" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" ></td>
	</tr>

	<tr class="info">
	<td class="one">Email:-</td>
	<td><input type="text" name="email"  id="email" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" ></td>
	</tr>	
	<tr class="success">
	<td class="one">Father Name:-</td>
	<td><input name="fname" id="fname" type="text"  onblur="setstyle2(this.id)" onfocus="setstyle(this.id)"></td>
	</tr>

	<tr class="info">
	<td class="one">Houser No:-</td>
	<td><input type="text" name="hno"  id="hno" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" ></td>
	</tr>
		
	<tr class="success">
	<td class="one">Village:-</td>
	<td><input type="text" name="village"  id="village" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" ></td>
	</tr>
		
	<tr class="info">
	<td class="one">Mandal:-</td>
	<td><input type="text" name="mandal"  id="mandal" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" ></td>
	</tr>
	
	<tr class="success">
	<td class="one">District:-</td>
	<td><input type="text" name="district"  id="district" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" ></td>
	</tr>

	<tr class="info">
	<td class="one">Depositing amount:-</td>
	<td><input type="text" name="damount" id="damount" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" ></td>
	</tr>

	<tr class="success">
	<td class="one">Upload pic:-</td>
	<td><input type="file" name="file" id="file"><br></td>
	</tr>

</table>
&nbsp;&nbsp;&nbsp;&nbsp;<input  style="background:white;width:90px;" type="submit" value="submit" >
&nbsp;&nbsp;&nbsp;&nbsp;<input  style="background:white;width:90px;" type="reset" value="Reset">

</form>
</fieldset>

