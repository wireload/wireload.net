FROM ruby:2.4.1-stretch
ENV LANG C.UTF-8

RUN apt-get update -qq && \
    apt-get install -y \
        build-essential

RUN mkdir /usr/src/app
WORKDIR /usr/src/app
COPY Gemfile /usr/src/app
COPY Gemfile.lock /usr/src/app

RUN gem install bundle && \
    bundle && \
    bundle install
