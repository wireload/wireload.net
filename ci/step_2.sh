#!/bin/bash -ex
# vim: tabstop=4 shiftwidth=4 softtabstop=4
# -*- sh-basic-offset: 4 -*-

GITBRANCH=$(git rev-parse --abbrev-ref HEAD)

echo "No link checker in place."


if [ ! -f build/index.html ]; then
    echo "Index file missing. Cancelling build."
    exit 1
fi
