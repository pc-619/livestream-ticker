# Livestream Ticker

*ADDENDUM: As of December 24th, 2025, I finally bothered getting around to pushing a version that still works up here. It's missing a few minute details, but it is 100% functional.*

This is a simple message-broadcasting website. Here's a brief cycle of how it works:
1. Users access the website through marquee_user.php and input messages they want to see on the ticker.
2. These messages are added to a MySQL database.
3. At the end of every real-time minute, the ticker refreshes with every message on the database. All previous messages are deleted from the database (and added to a .txt file to keep receipts).

It's quite crudely built and has a few glitches, but I designed it to accomplish one task: I wanted a ticker with my friends' messages showing up while I streamed Max Payne 1.
