<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
	<link rel="icon" type="image/svg+xml" href="https://www.pc619.shop/images/favicon.svg">
    	<title>Livestream Ticker</title>
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

	.scroll, .scroll > h2 { 
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
		padding-right: 0%; /* Change this number to adjust the amount of time between each item in the ticker */
		line-height: 2.0;
		text-indent: 0;
		}

	header#header_lt1080 {
		margin: 0;
		padding: 0;
		background-color: #000;
		background-image: url(images/web_ticker.png);
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
	}
	
	div#header_gt1080 {
		display: none;
		margin: 0;
		padding: 0;
		text-align: center;
	}

	div#marquee_wrapper {
	        display: flex;
	        align-items: center;
	        justify-content: center;
	}

	div#marquee_bg {
		padding: 50px 0 0 0;
		height: 160px;
        	width: calc(100dvh * (776 / 600));
		background-image: url(images/ticker.png);
		background-repeat: no-repeat;
		background-position: center;
		background-size:contain;
		/*padding: 0 275px; for 1920x1080 */
		padding: 0 0px;
	}

	marquee {

		/*margin: 0 0 0 70px;
		width: 90%;*/
		
		margin: 0 25px;
	}

	hr {
		margin: 0;
	}
	
	main {
	display: flex;
	justify-content: space-between;
	align-items: start;
	}
	
	main > * {
	}
	
	div#main_content {
	}
	
	div.cutout1, div.cutout2 {
		margin-top: 100px;
	}
	
	div.cutout1 {
		margin-left: 50px;
	}
	
	div.cutout2 {
		margin-right: 50px;
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
	
	.fadeOut {
		animation: fade 3s linear;
	}
	
	@keyframes fade {
		to {
			opacity: 0;
		}
	}

    	section#php_section {
        	padding: 10px 400px;
    	}

	footer {
		
		border: 1px solid black;
		border-radius: 25px;
		margin: auto auto 25px auto;
		padding: 25px;
		width: 67%;
	}

	footer > h3, p{
		line-height: 1;
	}
	
	footer > h4:hover {
		text-decoration: underline;
	}
	
	@media only screen and (min-width: 1000px) and (min-height: 1081px) {
		header#header_lt1080 {
			display: none;
		}
		
		div#header_gt1080 {
			display: block;
		}
	}
	

	@media only screen and (max-width: 1280px) {
	
		.cutout1, .cutout2 {
			display: none;
		}
	
	}

</style>
</head>
<body>
	<header id="header_lt1080">
        <div id="marquee_wrapper">
            <div id="marquee_bg">
                <marquee id="marquee" class="scroll" scrollamount="18" direction="left">
                    	<span id="custom" class="">STREAM OVER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thanks for watching&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                </marquee>
            </div>
        </div>

	</header>
	
	<div id="header_gt1080">
		<h2>Unfortunately, the ticker doesn't respond well to monitor resolutions over 1080 pixels tall. Please resize your browser to be smaller, or use a different device and refresh the page.</h2>
	</div>

	<hr>
	
	<main id="main">
		<div class="cutout1">
			<img src="images/cutout.png" alt="">
		</div>
		
		<div id="main_content">
	<section id="description">
		<h1>Livestream Ticker<span style="font-size: 16px">v0.9.6</span></h1>
		<p style="text-align: center;">Make your voice heard. Enter anything* in the textbox below and watch it show up on stream.</p>
		<h5 style="color: red">*I will kill you and then myself if you type something hurtful.</h5>
	</section>

	<section id="input">
		<form id="form" method="post">
			<table>
				<tr>
					<td style="text-align: right;"><label for="username">Username</label></td>
					<td><input type="text" size="60" maxlength="15" placeholder="Thanks for watching!" name="username" id="username" onblur="update_input()" disabled></td>
				</tr>
				<tr>
					<td style="text-align: right;"><label for="message">Message</label></td>
					<td><input type="textarea" size="60" maxlength="160" placeholder="PLANNED NEXT STREAM: Oct. 17th" name="message" id="message" onblur="update_input()" autocomplete="off" disabled></td>
					<td><input type="submit" name="submit" id="submit_button" value="Release the Payne" onclick="msg_submit()" disabled></td>
				</tr>
			</table>
			
			
		<!--<input type="submit" value="Release the Payne">-->
		
		</form>

	</section>

	<section id="error_section">

		<ul>
			<li id="error"></li>
		</ul>
		
	</section>

    <section id="php_section">

    </section>

	<footer>
		<h2>FAQ</h2>
		<h3>Is there a shop (as the URL alludes)?</h3>
		<p>No.</p>
		<h3>Was making the website worth it?</h3>
		<p>Yes.</p>
		<h3>Can I keep a cardboard cut-out mobster?</h3>
		<p>Yes.</p>

		<hr>

		<!-- yap sesh -->
		<h3 style="text-align: center;">Slightly More Verbose FAQ</h3>
        
		<h3>The ticker's a little glitchy, help!</h3>
		
		<p>Give it 5 seconds. It <i>should</i> be fine until the next time you refresh the page. I recommend using this site on Firefox for the optimal experience; but other browsers work, too.</p>
		
		<h3>I joined halfway in and all I'm seeing is a nonverbal guy do somersaults... what's the context?</h3>
		
		<p>
		I wanted to stream myself playing a video game I like. Yay! But, I personally despise panhandling for other people's attention without reciprocating in some way.<br><br>
		
		So, I spent the last two weeks refining my stream setup. What started as a simple stream UI design quickly snowballed into getting the copious rust off my web dev background.<br><br>
		
		And this brings us to today.. I hope you enjoyed watching my livestream. :-)
		</p>
		
		<h3>How was this made?</h3>

		<p>
		Almost everything you see here (and on-stream) has been made from scratch:</p>

		<ul>
			<li>Brick and LED ticker textures? GIMP.</li>
			<li>Awesome cardboard cut-outs of Max Payne 1 enemies? GIMP.</li>
			<li>Website code? A lot of YouTube tutorials and some StackOverflow.</li>
		</ul>
		
		<p>
		The only pre-fab components are visible on the livestream: the LiveSplit timer, its autosplitting software geared for Max Payne 1 (credit to Endurance), and a couple of StreamLabs/OBS plugins.<br><br>
		
		Also, the whole website is built on existing code for a pre-generated marquee I found on Reddit (credit to u/Renoized). It was initially a static &lt;marquee&gt; that served its purpose as an OBS browser source, but I kept adding onto it until it became this real-time, dynamic database-refreshing Frankenstein thing. With a GUI interface, of course.
		</p>
		
		<hr>
		
		<h4 id="pc619" style="margin: 25px auto 0; width: fit-content;" onclick="dopeAudio('audio/byzantine.mp3')">pc619</h4>
	</footer>

    	<script>
    	
    		var audio = new Audio('audio/byzantine.mp3');
    		function dopeAudio() {
    			audio.volume = 0.1;
    			//audio = new Audio(file);
			return audio.paused ? audio.play() : audio.pause();
    			
    			//audio.pause();
    			//console.log("Audio paused: " + audio.paused);
    			//audio = new Audio(file);
    			//audio.play();
    			//console.log("Audio playing: " + audio.paused);
    			
    		}
    	</script>

	</div>
	
		<div class="cutout2"><img src="images/cutout2.png" alt=""></div>
	
	</main>
	
	<script>
		// To anybody viewing this page's source -- I gutted the ticker's functionality. I'll use this domain for some other project in the near future... - pc619
	</script>

</body>
</html>