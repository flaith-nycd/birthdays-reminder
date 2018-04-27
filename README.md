# Birthdays Reminder

Keep your birthdays to remember



I just wanted to keep some birthdays of my family and friends to be sure to contact them the right time :wink:

> So I'm using Laravel to do it

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
