#!/bin/bash -ex
# vim: tabstop=4 shiftwidth=4 softtabstop=4
# -*- sh-basic-offset: 4 -*-

GITBRANCH=$(git rev-parse --abbrev-ref HEAD)

docker-compose build

docker run \
    --rm \
    -v $(pwd):/usr/src/app \
    wireload_net:latest \
    middleman build
