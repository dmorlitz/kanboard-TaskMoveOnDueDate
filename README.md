Automatic action: Move a task to a specified column when the due date has passed
==================================================================================

This plugin allows you to create an automatic action in Kanboard that will move a card
to a user specified column when the due date has passed.

When adding an automatic action, the action name is shown as
"Automatically move a task when due date is passed"

The actual moving of the card takes place when the Kanboard cronjob runs overnight. That is how the action is actually triggered.

Your configuration may vary depending on how your cronjobs are already configured.

In my environment, my Apache server is running as the www-data user. The base directory for my Kanboard installation is /var/www/html/kanboard

Therefore, I have added the following line to the crontab file for the www-data user and added the following line:

0 1 * * * cd /var/www/html/kanboard && ./cli trigger:tasks >/dev/null 2>&1

This ensures that all task related triggers are processed every day at 1:00am.

Author
------

- David Morlitz
- License MIT

Requirements
------------

- Kanboard >= 1.0.40

Installation
------------

You have the choice between 3 methods:

1. Install the plugin from the Kanboard plugin manager in one click
2. Download the zip file and decompress everything under the directory `plugins/TaskMoveOnDueDate`
3. Clone this repository into the folder `plugins/TaskMoveOnDueDate`

Note: Plugin folder is case-sensitive.
