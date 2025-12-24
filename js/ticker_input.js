var username = document.getElementById("username");
var input = document.getElementById("message");
var error = document.getElementById("error");
var success = document.getElementById("success");
var submit = document.getElementById("submit_button");
var customMsg = document.getElementById("custom");
var marquee = document.getElementById("marquee");
var marqueeBG = document.getElementById("marquee_bg");
var form = document.getElementById("form");
// This is just a tidy place for PHP warnings/errors.
var phperrors = document.getElementById("php_section");

// Prevent form submission.
//form.addEventListener("submit", function(e) {
//	e.preventDefault();
//})

function msg_submit() {
    console.log("MESSAGE: " + input.value);
    // Check for empty input.
    if(input.value === "" || username.value === "") {
        error.innerHTML = "<li id='error'>Message/username cannot be empty.<\li>";
        console.log("^^^ Empty message or empty username.");
    }
    
    ////////// IMPORTANT: I will improve this later. ////////////
    // Check for anti-Hamza input.
    else if(username.value.includes("I hate Hamza")     || 
            username.value.includes("I hate popcan619") ||
            input.value.includes("I hate Hamza")        ||
            input.value.includes("I hate popcan619")) {
        error.innerHTML = "<li id='error'>Message cannot contain hate speech for a brotha.<\li>";
        console.log("^^^ Treasonous message.");

    }

    // Case for valid input.
    else{

        error.innerHTML = "<li id='error' class='success'>Message sent!<\li>";
        marquee.direction = "right";
        marqueeBG.style.padding = "0 29vw";
        customMsg.innerHTML = "<span id='custom' class='blink'>(1) new message!<\span>";
        //marquee.scrollAmount = false;
        marquee.stop();
        submit.disabled = true;
        
        setTimeout(function(){
            customMsg.innerHTML = "<span id='custom' class=''>" + username.value + ": " + message.value + "<\span>";
            marquee.start();
            marqueeBG.style.padding = "0 16.5vw";
            marquee.direction = "left";
            marquee.scrollAmount = "18";
            //marquee.innerHTML = "<marquee style='padding: 0 16.5vw' id='marquee' class='scroll' scrollamount='18' direction='left'><\marquee>";
        }, 1450);

        // Turn user input into JSON string.
        let myObject = { username: username.value, message: input.value };
        let jsonString = JSON.stringify(myObject);
        console.log("JSON: " + jsonString);

        // Send JSON string to PHP script.
        fetch("db_interact.php", {
                "method": "POST",
                "headers": {
                "Content-Type": "application/json; charset=utf-8"
                },
                "body": jsonString
        }).then(function(response){
            return response.text();
        }).then(function(data){
            phperrors.innerText = data;
        })

        setTimeout(function(){
            submit.disabled = false;
        },3000);

        setTimeout(function(){
            customMsg.innerHTML = "<span id='custom' class=''>No new messages<\span>";
        }, 10000);

    }
}