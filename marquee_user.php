<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
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
		padding-right: 0%; /* Change this number to adjust the amount of time between each item in the ticker */
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

    div#marquee_wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
    }

	div#marquee_bg {
		padding: 50px 0 0 0;
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

    section#php_section {
        padding: 10px 400px;
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

</style>
</head>
<body>
	<header>
        <div id="marquee_wrapper">
            <div id="marquee_bg">
                <marquee id="marquee" class="scroll" scrollamount="18" direction="left">
                    <!-- Add each item you want to appear in the ticker as a <span> -->
                    <!--
                    <span><img src="images/kitty_kat.png" alt="" width="80" height="80"></span>
                    <span>Livestream scrolltext by Renoized.</span>

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
                    <span id="custom" class="">No new messages&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                </marquee>
            </div>
        </div>

	</header>

	<hr>

	<section id="description">
		<h1>Livestream Ticker<span style="font-size: 16px">v0.9</span></h1>
		<p style="text-align: center;">Make your voice heard. Enter anything* in the textbox below and watch it show up on stream.</p>
		<h5 style="color: red">*I will kill you and then myself if you type something hurtful.</h5>
	</section>

	<section id="input">
		<form id="form" method="post">
			<table>
				<tr>
					<td style="text-align: right;"><label for="username">Username</label></td>
					<td><input type="text" size="60" maxlength="15" placeholder="FrostBytes" name="username" id="username" onblur="update_input()"></td>
				</tr>
				<tr>
					<td style="text-align: right;"><label for="message">Message</label></td>
					<td><input type="textarea" size="60" maxlength="160" placeholder="I want you." name="message" id="message" onblur="update_input()" autocomplete="off"></td>
					<td><input type="submit" name="submit" id="submit_button" value="Release the Payne" onclick="msg_submit()"></td>
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
		</ul>
		<div class="cutout2"><img src="images/cutout2.png" alt=""></div>
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
		<p>I wanted to stream myself playing a game I like. Yay! But I personally despise panhandling for other people's attention without reciprocating in some way. So I spent the last two weeks optimizing my stream setup.</p>
		<h3>How was this made?</h3>

		<p>
		Almost everything you see here (and on-stream) has been made from scratch:</p>

		<ul>
			<li>Simple brick texture? GIMP.</li>
			<li>LED ticker texture? GIMP.</li>
			<li>Website code? A lot of YouTube tutorials and some StackOverflow.</li>
		</ul>
		
		<p>
		The only pre-fab components are visible on the livestream: the LiveSplit timer, its autosplitting software geared for Max Payne 1 (credit to Endurance), and a couple of StreamLabs/OBS plugins.
		</p>
	</footer>
	
	<script>

		var username = document.getElementById("username");
		var input = document.getElementById("message");
		var form = document.getElementById("form");
		var error = document.getElementById("error");
		var success = document.getElementById("success");
		var submit = document.getElementById("submit_button");
		var customMsg = document.getElementById("custom");
		var marquee = document.getElementById("marquee");
		// we'll see if this works
		var marqueeInit = marquee.innerHTML;
		var marqueeBG = document.getElementById("marquee_bg");

		let msgArr = ["empty set 619"];
		let username_content = "";
		let message_content = "";

		// hide upon page load
		


			var msgCount = 0;
			var now = 60000 * msgCount * Math.floor(Date.now() / 60000 + 1.0);

			function minuteTimer(callback) {
				var timerFunc = function () {
					// get the current time rounded down to a whole minute (with a 10% margin)
					var now = 60000 * Math.floor(Date.now() / 60000 + 1.0);
					// run the callback
					callback(now);
					// wait for the next whole second
					setTimeout(timerFunc, now - Date.now());
				};
				timerFunc();
			}

			// create a demo timer
			minuteTimer(function (now) {
				//document.getElementById('php_section').textContent = new Date(now).toString();
			});

			let msgCountObject = { msgCount: 0, msgArr: msgArr };

			// add an artificial 0.5 second delay for the second timer
			setTimeout(function () {
				minuteTimer(function (now) {
					document.getElementById('php_section').textContent = new Date(now).toUTCString();
					
					
					let countString = JSON.stringify(msgCountObject);
					//console.log("msgCount JSON: " + countString);

					fetch("db_iupdate.php", {
					"method": "POST",
					"mode": "no-cors",
					"headers": {
						"Accept":"application/json", 
						"Content-Type":"application/json; charset=utf-8"
					},
					"body": countString
				}).then(function(response){
					return response.json();
				}).then(function(data){
					console.log("NEW COUNTER (msgCount): " + data["msgCount"]);
					msgCount = data["msgCount"]; 
					
					msgArr = data["msgArr"];
					console.log("MESSAGES ARRAY: " + msgArr);
				//marquee.direction = "right";
                //// ADJUST MARQUEE TEXT SPACING
                //marqueeBG.style.padding = "0 16.5vw";

				marquee.stop();
				marquee.start();
				marquee.innerHTML = marqueeInit;
				marquee.appendChild(customMsg);

                if(msgCount === 0){
					customMsg.innerHTML = "No new messages&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					if(customMsg.classList.contains("blink")){
						customMsg.classList.remove("blink");
					}
				}
				
				else if(msgCount < 2){
					customMsg.innerHTML = "(" + msgCount + ") new message!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					if(!customMsg.classList.contains("blink")){
						customMsg.classList.add("blink");
					}

                    //customMsg.innerHTML = "<span id='custom' class='blink'>(" + msgCount + ") new message!</span>";
                }
                else{
					console.log("CAN YOU SEE THIS: " + customMsg);
					customMsg.innerHTML = "(" + msgCount + ") new messages!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					if(!customMsg.classList.contains("blink")){
						customMsg.classList.add("blink");
					}
                    //customMsg.innerHTML = "<span id='custom' class='blink'>(" + msgCount + ") new messages!</span>";
                }
                //marquee.scrollAmount = false;

                			
				console.log("FINAL msgCount: " + window.msgCount);

				// expunge old <span> tags (except for the id='custom' one)
				Array.from(marquee.children).forEach(child => {
					if (child !== customMsg){
						child.remove();
					}
				});
				// populate <marquee> with new <span> messages
				for(i = 0; i < window.msgCount; i++){
					let newSpan = document.createElement("span");
					let newNode = document.createTextNode(msgArr[i][0] + ": " + msgArr[i][1]);
					let classStr = "custom" + i;
					console.log(classStr);
					newSpan.classList.add("custom");
					console.log("HOL UP NOW... " + msgArr[i][0] + ": " + msgArr[i][1]);
					console.log(newSpan);
					newSpan.appendChild(newNode);
					newSpan.innerHTML = msgArr[i][0] + ": " + msgArr[i][1] + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					marquee.appendChild(newSpan);
				}
					let newSpan = document.createElement("span");
					let newNode = document.createTextNode("/////");
					let classStr = "custom";
					newSpan.classList.add("custom");
					//console.log("HOL UP NOW... " + msgArr[i][0] + ": " + msgArr[i][1]);
					console.log(newSpan);
					newSpan.appendChild(newNode);
					marquee.appendChild(newSpan);
                

				
				})
				})
					console.log("msgCount INITIAL: " + window.msgCount);
				

				//var now = 60000 * msgCount * Math.floor(Date.now() / 60000 + 1.0);
				//console.log("NOW: " + now);



			}, 500);

		

		form.addEventListener("submit", function(e) {
        	e.preventDefault();
        	})
        	
        	function update_input() {
        		username_content = username.value;
        		message_content = message.value;
        		console.log("USERNAME: " + username.value + "\nMESSAGE: " + message.value);
        	}

		function msg_submit() {
			    // Check for empty input.
		            if(input.value === "" || username.value === "") {
		                error.innerHTML = "<li id='error'>Message/username cannot be empty.<\li>";
		                console.log("^^^ Empty message or empty username.");
		            }
		            
		            // Check for anti-Hamza input.
		            else if(username.value.includes("I hate Hamza")     || 
		                    username.value.includes("I hate popcan619") ||
		                    input.value.includes("I hate Hamza")        ||
		                    input.value.includes("I hate popcan619")) {
		                error.innerHTML = "<li id='error'>Message cannot contain hate speech for a brotha.<\li>";
		                console.log("^^^ Treasonous message.");
		
		            }
		
		            // Case for valid input.
		            else {
	
                        username.disabled = true;
                        input.disabled = true;
						submit.disabled = true;
				// Convert to JSON object.
			let myObject = { username: username_content, message: message_content };
			let jsonString = JSON.stringify(myObject);
			console.log("JSON: " + jsonString);
			console.log("JSON.parse: " + JSON.parse(jsonString));
		
			fetch("db_interact.php", {
				"method": "POST",
				"mode": "no-cors",
				"headers": {
					"Accept":"application/json", 
	        	    "Content-Type":"application/json"
				},
				"body": jsonString
			}).then(function(response){
				return response.json();
			}).then(function(data){
                console.log("COUNT: " + data["count"]);
                    var count = data["count"];
                error.innerHTML = "<li id='error' class='success'>Message sent!<\li>";

                })
		
                setTimeout(function(){
                    username.disabled = false;
                    input.disabled = false;
                    submit.disabled = false;
                }, 3950);
		
		            }
		}
		
	</script>
</body>
</html>
