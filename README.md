# Birthdays Reminder

Keep your birthdays to remember
<p align="center">
<img src="http://img.sotfall.com/laravel/birthday/img%2301.png">
</p>

I just wanted to keep some birthdays of my family and friends to be sure to contact them the right time :wink:

> So I'm using [Laravel](https://laravel.com/) to do it and [laracasts/flash - Easy Flash Messages for Your Laravel App](https://github.com/laracasts/flash) from [Jeffrey Way](https://laracasts.com/)

Here is a copy of my `.env` file
```
APP_NAME="Birthday's reminder"
APP_ENV=local
APP_KEY=base64:
APP_DEBUG=true
APP_LOG_LEVEL=debug
# Add port 8000 for the links sent by email
# APP_URL=http://localhost:8000
APP_URL=http://birthday.idev

DB_CONNECTION=sqlite

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
# MAIL_ENCRYPTION=null

MAIL_FROM_ADDRESS=no-reply@birthday.com
MAIL_FROM_NAME="Birthday's Team"

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
```

So I'm using _sqlite_, don't forget to create `database.sqlite` in `database` directory

## To start

* Create a user (click on register)

    ![Click on register](http://img.sotfall.com/laravel/birthday/img%2302.png)

    ![Create a user](http://img.sotfall.com/laravel/birthday/img%2303.png)

* On the main menu, add a new birthday

    ![Add a birthday](http://img.sotfall.com/laravel/birthday/img%2304.png)

    ![Add a birthday](http://img.sotfall.com/laravel/birthday/img%2305.png)

* Back to the main menu, you have your list

    ![Create a user](http://img.sotfall.com/laravel/birthday/img%2306.png)

* If you don't remember the year, you can avoid it

    ![Create a user](http://img.sotfall.com/laravel/birthday/img%2307.png)

    ![Create a user](http://img.sotfall.com/laravel/birthday/img%2308.png)

**The dates are automatically sorted by month AND by day**

* Each line are underlined with the current month

    ![Create a user](http://img.sotfall.com/laravel/birthday/img%2309.png)

* Of course you can 'Edit' or 'Delete' a record

    ![Create a user](http://img.sotfall.com/laravel/birthday/img%2310.png)

## TO DO
> Send you an email to warn you with the next birthday to remember

> SMS ?

> Cleaning the code, Refactoring
