#!/bin/bash

if [ -n "$1" ]; then
  if [ ! -d "/var/www/html/backend/$1" ]; then
      echo "Directory /var/www/html/backend/$1 does not exist"
      exit 1
  fi

  run_schedule_every_minute () {
    local directory="$1"
    while sleep 59; do
        cd /var/www/html/backend/$directory && php artisan schedule:run >> /dev/null 2>&1
        echo "`date +"%d-%m-%Y %H:%M:%S"`     cron is complete 'cd /var/www/html/backend/$directory && php artisan schedule:run >> /dev/null 2>&1'" >> /var/log/cron.log
    done
  }

  while sleep 1; do
      second=`date +%S`
      if [[ $second = "00" ]]; then
          run_schedule_every_minute "$1"
          break
      fi
  done
else
    echo "First parameter is required"
    exit 1
fi
