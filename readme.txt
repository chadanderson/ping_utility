=== Ping Utility ===

Author: Chad Anderson


Allows you to monitor connectivity of devices on your network.

== Description ==
Allows you to monitor the status of devices on your network or network of websites. Includes a web interface and cron to to monitor device/website status and log connection issues.



== Installation ==
1. Upload the ping_utility folder to your server.
2. Import create_database.sql (ping_utility/db/create_datbase.sql) to your MySQL server to create the network database and device table.
3. Add your database configuration (username/password) to config.php (ping_utility/db/config.php).
4. Access the web interface at http://www.mysite.com/ping_utility.php



== Configure Cron ==

cPanel (cPanel -> Advanced -> Cron Jobs)

1. Choose the frequency you want the script to run (Min - Hour - Day - Month - Weekday)
2. Add command: php -q /home/username/public_html/path/to/ping_utility/cron.php


Terminal (MAMP)

1. Type crontab -e then i to insert
2. Type your cron command: 

   // Runs every hour
   0 * * * * /usr/bin/curl --slient --compressed http://localhost/ping_utility/cron.php

Note: May need to use /localhost:8888/

3. Press esc to exit and type ZZ to save
