#!/bin/bash

bundle exec middleman build && \
rake deploy:se && \
rake deploy:us
