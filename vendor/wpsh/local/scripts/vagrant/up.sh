#!/usr/bin/env bash

# See https://github.com/koalaman/shellcheck/wiki/SC2164 for why the exit.
cd /vagrant || exit

docker-compose up --detach --remove-orphans

echo "Done! Please wait a few seconds before the containers are up."
echo "Hostname: $HOSTNAME"
