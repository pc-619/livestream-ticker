<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">

<style>
	
	body {
		margin: 0;
		padding: 0;
	}

	@font-face {
		font-family: Univers;
		src: url("fonts/UniversCnRg.ttf");
	}

	@font-face {
		font-family: Univers-Bold;
		src: url("fonts/UniversCnBold.ttf");
	}

	@font-face {
		font-family: Verdana;
		src: url("fonts/Verdana.ttf")
	}

	h1 {
		font-family: Univers-Bold, Arial, Helvetica, sans-serif;
		font-size: 72px;
	}

	h1, h2, h3, h4, h5, h6, label {
		font-family: Univers, Arial, Helvetica, sans-serif;
		text-align: center;
		line-height: 1;
	}

	h2 {
		font-size: 36px;
	}

	h3 {
		text-align: left;
		font-size: 24px;
	}
	
	p, ul li{
		font-family: Univers, Arial, Helvetica, sans-serif;
		font-size: 24px;
		line-height: 0;
		list-style-type: none;
	}

	.blink {
		animation: blinker 0.5s steps(1, end) infinite;
	}

	@keyframes blinker {
		50% {
			opacity: 0;
		}
	}

	.scroll { 
			/* Font properties */
		font-family: Doto, Arial, sans-serif;
		font-size: 500%;
		color: gold;
			/* Font outline */
		/*-webkit-text-stroke: 2px black;*/
	}

	body {
			/* I'm not sure this step is necessary as I think OBS removes the background as default */
		background-color: #00FF0000;
		}
		
	span {
		display: inline-block;
		padding-right: 20%; /* Change this number to adjust the amount of time between each item in the ticker */
		line-height: 2.0;
		text-indent: 0;
		}

	header {
		margin: 0;
		padding: 0;
		background-color: #000;
		background-image: url(images/web_ticker.png);
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
	}

	div#marquee_bg {
		padding: 50px 0 0 0;
		background-image: url(images/ticker.png);
		background-repeat: no-repeat;
		background-position: center;
		background-size:contain;
		/*padding: 0 275px; for 1920x1080 */
		padding: 0 16.5vw;
	}

	marquee {

		/*margin: 0 0 0 70px;
		width: 90%;*/
	}

	hr {
		margin: 0;
	}

	section {
		
	}

	section#input {
		display: block;
		text-align: center;
	}

	section#input table {
		margin: 0 auto;
	}

	section#input input {
		font-family: Verdana;
		font-size: 16px;
		
	}

	section#input button {
		font-family: Verdana;
		font-size: 16px;
	}

	section#error_section {
		display: flex;
		justify-content: center;
	}

	section#error_section .cutout1{
		position: absolute;
		left: 0;
		margin: -100px auto auto 50px;
		cursor: pointer;
	}

	section#error_section .cutout2{
		position: absolute;
		right: 0;
		margin: -100px 50px auto auto;
		cursor: pointer;
	}

	section#error_section ul {
		padding: 0;
	}

	section#error_section ul li{
		height: 30px;
		color: rgb(255, 43, 43);
	}

	section#error_section ul li.success {
		color: rgb(0, 0, 0);
	}

	footer {
		border: 1px solid black;
		border-bottom: 0;
		border-radius: 25px 25px 0 0;
		margin: auto;
		padding: 25px;
		width: 67%;
	}

	footer > h3, p{
		line-height: 1;
	}

	footer p {
		height: 50px;
		line-height: 1;
	}

</style>
</head>
<body>
	<header>
		<div id="marquee_bg">
			<marquee id="marquee" class="scroll" scrollamount="18" direction="left">
				<!-- Add each item you want to appear in the ticker as a <span> -->
				<!--
				<span><img src="images/kitty_kat.png" alt="" width="80" height="80"></span>
				<span>Livestream scrolltext by Renoized.</span>
				<span>ABBV $190.24 &#9660; -0.342</span>
				<span>ABT $121.96 &#9660; -9.785</span>
				<span>ALUR $3.00 &#9650; 0.04</span>
				<span>BAC $46.16 &#9650; 0.125</span>
				<span>BODI $3.87 &#9660; -0.09</span>
				<span>CRM $257.98 &#9650; 0.03</span>
				<span>DIS $121.34 &#9650; 1.52</span>
				<span>EVT $23.91 &#9660; -0.0499</span>
				<span>GE $260.26 &#9660; -5.92</span>
				<span>HD $356.44 &#9660; -0.965</span>
				<span>JPM $287.53 &#9650; 1.705</span>
				<span>KO $69.66 &#9650; 0.39</span>
				<span>LLY $789.19 &#9660; -0.61</span>
				<span>MA $552.65 &#9660; -2.87</span>
				<span>MRK $82.17 &#9660; -0.265</span>
				<span>NINE $0.82 &#9650; 0.0184</span>
				<span>ORCL $250.37 &#9650; 9.07</span>
				<span>PG $154.17 &#9650; 0.44</span>
				<span>PM $179.74 &#9660; -3.53</span>
				<span>RTX $150.89 &#9650; 0.7193</span>
				<span>UNH $287.85 &#9660; -4.645</span>
				<span>V $349.23 &#9660; -0.67</span>
				<span>WFC $80.10 &#9650; 0.19</span>
				<span>WMT $95.05 &#9660; -0.105</span>
				<span>XOM $111.90 &#9660; -0.33</span>

				<span>Welcome to the stream of a lifetime. Fasten your seatbelts.</span>
				<span>Like what you hear and want to support what we're doing? Please consider supporting us on Patreon or Ko-Fi.</span>
				<span>Want the MP3s of what we've been working on today? Audio from these streams will be available on Patreon!</span>
				<span>Now with improved audio quality!</span>
				<!-- The three items below should have a shorter space between them, so I added "style="padding-right: 20%" ->
				<span style="padding-right: 20%">Prefer to watch streamers on your phone? These streams are also available in vertical format on Instagram and Tiktok.</span> 
				<span style="padding-right: 20%">Are you on your phone? Would you prefer to see this on your laptop? We also have horizontal format on Youtube, Twitch and Facebook.</span> 
				<span>We recommend horizontal format if you want to see what we're actually doing in Reaper. ;) </span>
				<span>Want to watch these later? VODs are available on Youtube!</span>
				-->
				<span id="custom" class="">No new messages</span>

			</marquee>
		</div>

	</header>

	<hr>

	<section id="description">
		<h1>Livestream Ticker</h1>
		<p style="text-align: center;">Make your voice heard. Enter anything* in the textbox below and watch it show up on stream.</p>
		<h5 style="color: red">*I will kill you and then myself if you type something hurtful.</h5>
	</section>

	<section id="input">
		<form id="form" method="post">
			<table>
				<tr>
					<td style="text-align: right;"><label for="username">Username</label></td>
					<td><input type="text" size="60" maxlength="15" placeholder="FrostBytes" name="username" id="username"></td>
				</tr>
				<tr>
					<td style="text-align: right;"><label for="message">Message</label></td>
					<td><input type="textarea" size="60" maxlength="160" placeholder="I want you." name="message" id="message" autocomplete="off"></td>
					<td><input type="submit" name="login" value="Release the Payne" id="submit_button" onclick="msg_submit()"></td>
				</tr>
			</table>
			
			
		<!--<input type="submit" value="Release the Payne">-->
		
		</form>

	</section>

	<section id="error_section">
		<div class="cutout1">
			<img src="images/cutout.png" alt="">
		</div>
		<ul>
			<li id="error"></li>
			<li id="success"></li>
		</ul>
		<div class="cutout2"><img src="images/cutout2.png" alt=""></div>
	</section>

	<footer>
		<h2>FAQ</h2>
		<h3>Is there a shop (as the URL alludes)?</h3>
		<p>No.</p>
		<h3>Was making the website worth it?</h3>
		<p>Yes.</p>
		<h3>Can I keep a cardboard cut-out mobster?</h3>
		<p>Yes.</p>
	</footer>

    <!-- Credit goes to u/Renoized for illuminating the power of OBS browser sources to me. Lifesaver. -->

</body>
</html>
<?php
	include("database.php");

    // Execute upon form submission.
    if(isset($_POST["login"])){

        $username = $_POST["username"];
        $message  = $_POST["message"];

        if(empty($username)){
            echo "Username is empty";
        }
        elseif(empty($message)){
            echo "Message is empty";
        }
        else{
            echo "Hello {$username}";
        }

    }

    extract($_REQUEST);

    $file = fopen("form-save.txt", "a");

    fwrite($file, "USERNAME: ");
    fwrite($file, $username . "\n");
    fwrite($file, "MESSAGE: ");
    fwrite($file, $message . "\n");
    fclose($file);

	$sql = "INSERT INTO user_input (username, message)
						VALUES ('$username', '$message')";

	try{
		mysqli_query($conn, $sql);
	}
	catch(mysqli_sql_exception){
		echo "Failed to send message. Try again?";
	}

	// Close connection
	// $conn exists -- it's in database.php. Disregard warning.
	mysqli_close($conn);
?>