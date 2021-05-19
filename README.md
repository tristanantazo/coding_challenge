## About coding challenge(event calendar)

This project is a single page app made by laravel and Vuejs.

## Flow of the project

- The system will have a pre data sets just for one user, this data will be the only data for the event.

- The dashboard will be event title input, form date input and to date input it also have check box for Monday to Sunday.

- After editing the pre system input, the calendar will change. based on the month indicated in the from date input and to date input.

- The purpose of the check box is to add details to the calendar that in beetween from and date input all days that has been checked will be marked in calendar and the event title will be shown to the calendar.

## Laravel setting
- first create a database name 'coding_challenge'
- create a migration "php artisan migrate:fresh"
- create a seed for the event "php artisan db:seed"

## To run
-php artisan serve.
-npm run watch.
