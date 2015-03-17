#!/bin/bash

vagrant ssh -c "cd /vagrant && while true; do timeout 30 bundle exec middleman server; done"
