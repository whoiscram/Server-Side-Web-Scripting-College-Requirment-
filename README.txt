Module 7: Server-Side Web Scripting
Team Maki (Intayo MakiConcert)

Prerequisites:
GitHub (private repository for team collaboration)
Visual Studio Code (utilized Source Code Editor)
XAMPP (for accessing the database)

How to set up the project:
1. Setting up of database maki in phpMyAdmin (with tables):
	a. events
	b. events_user
	c. users
2. GitHub private repository (https://github.com/whoiscram/final-activity)
3. Cloning of project (in Visual Studio Code)
4. Running built-in web server (testing through PHP's built-in server)
	> Open an integrated terminal in the working project's directory
	> Input php -S 127.0.0.1:8000 in the opened terminal and hit enter
		* To view the website, either type 127.0.0.1:8000 in the address bar of a
		browser or by simply following the link (ctrl + click in the integrated terminal)
		* The index.php would be shown and by clicking on the login tab, credentials
		should be inputted whether by an admin or user to proceed
			# Logging in as an admin would display options for managing events (i.e., create
			event, view events, view participants of the events, update and delete
			a specific event)
			# Logging in as a user would display the website's homepage - including all
			available events (Upcoming and Ongoing), About Us, and Contact Us
				- Users would be able to join events;
				- Users would be able to view currently joined events (via Profile tab); and
				- Users would be able to cancel/leave a joined event
		* Both admin and users can log out from the system (index.php would be shown)
		* Simply ctrl + C in the integrated terminal to stop the built-in web server