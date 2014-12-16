#!/bin/bash

WHOAMI=$(whoami)
if [ $WHOAMI == 'mvip' ]; then
  USER='vpetersson'
elif [ $WHOAMI == 'siker' ]; then
  USER='aljungberg'
else
  echo "Unknown user. Exiting"
  exit 1
fi

export DEPLOY_USER=$USER

bundle exec middleman build && bundle exec middleman deploy && ssh $USER@se.hosting.wireload.net "sudo chown -R $USER:www-data /www/wireload.net/ && sudo chmod g+r -R /www/wireload.net/"
