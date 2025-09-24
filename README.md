# Livestream Ticker
Link: https://www.pc619.shop

###### It's non-functional as of now, but that's because I gutted it. Read 'Additional Notes' for more insight.

### Why?
Brief background as to why this exists: I wanted a palpable project I could make that'd be fun, and teach me a lot of fundamentals. I decided it'd be perfect for a livestream event I set up (I speedrun Max Payne 1).

### What?
The purpose of this website is functionally simple -- people send messages and the webapp sticks them in a database. Every 10 minutes, every single message collected is displayed on the ticker. To prevent the same messages from being displayed more than once, the database is also wiped every 10 minutes. I keep receipts, though. ;-)

### How?
Textures were rudimentary -- I have a decent background in GIMP image manipulating.

Front-end is about as simple as it visually looks. The &lt;marquee&gt; was finicky to get right, but I know it's a deprecated tag, so it's to be expected.

The meat of this website is the back-end. No frameworks were used -- the livestream event was due in a couple of weeks, and I made the executive decision that it'd be quicker to build it from the ground up with raw languages, than learn a framework or two from scratch.

User sends a message through HTML &lt;form&gt;. It gets picked up by JavaScript. First, it's ran through a simple profanity checker. If it's good, it's encoded into a JSON object. That JSON object is decoded and parsed for its contents. The PHP code generates a SQL query to add that message to the database (which has already established a connection by this point). Once it's added, the JSON object returns to the front-end, and its promise is delivered.

The database is wiped every 10 minutes to allow for more messages to be shown. I added a functionality to add all DB entries to a .txt file, so I could read it out to my friends after the livestream event was over.

Finding a hosting service and domain handle that fit my budget was a whole other story. A couple of issues I ran into were attributed to the hosting service's security rules preventing malicious activity.

### Instrospection on the Livestream Ticker Project
This project had two learning objectives:
- Further understanding on web-developing languages (HTML/CSS, JS, PHP, SQL)
- Successfully host a fully-functional website

I achieved those objectives. But, there were some things that I didn't implement in time.
- You can bypass the 1-minute cooldown of sending a message by simply refreshing your browser. This could've been fixed with something as easy as cookies.
- I implemented web responsiveness design, but it wasn't 100% -- at some resolutions, the text on the ticker may bleed out of the LED screen and onto the metal borders.

### Additional Notes
- As it stands, the website is gutted. Right after the livestream ended (late at night), I wanted to pull the plug on the capability to send new messages. So, I cut out the JS script at the bottom of the page. Sorry about that!
    - The only reasons I'm still touting around a broken website like it's my magnum opus, is because:
        - I think it visually looks cool to look at.
        - I've got the domain licensed until August '26. May as well keep it online, to show people I made something! (until I replace it with another project)
