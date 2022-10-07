## How to Make Site Changes

## Development mode

```
$ docker-compose \
  -f docker-compose.yml \
  -f docker-compose-dev.yml up
```

And point your browser to localhost:4567

## Test mode

To test a "build" of the website, run:

```
$ docker-compose \
  -f docker-compose.yml up
```

And then point your browser to localhost:8080

# Deploying

Just pushing should be sufficient.
