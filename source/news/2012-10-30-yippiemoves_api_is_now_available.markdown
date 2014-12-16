---
title: YippieMove's API is now available!
authors: Viktor Petersson
wordpress_id: 1439
wordpress_url: http://wireload.net/2012/10/yippiemoves-api-is-now-available/
date: 2012-10-30 08:00:04
tags: api, news, yippiemove
---

![YippieMove API](/uploads/2012/10/yippiemove_api.png)


Almost exactly four years ago, we launched the first version of
[YippieMove](http://www.yippiemove.com/). Like most early products, it
was rough around the edges, but did the job. We've come a long way since
then.

During these years, we've had the pleasure of working with both small
and large clients. It has been a very exciting and rewarding journey.
Now it is time to take the next step in YippieMove's evolution. After
about a year of hard work, we are now extremely proud to announce the
availability of YippieMove's [API](http://www.yippiemove.com/help/api.html).

With the API, you can more or less do everything you can on the regular
site. With just a few API-calls, you can create and monitor transfers.
As an example, a company like GoDaddy could integrate YippieMove into
their sign-up process and enable users to migrate over their old email
archive without ever leaving the sign-up wizard.

In the last few years, we've been approached by many potential clients
who wanted more than just a custom email migration portal (which we've
[offered for some
time](http://www.yippiemove.com/help/custom_domain.html)). They were
primarily looking to seamlessly integrate an email migration tool in
their existing control panel or application. Now, with the API
available, that's possible.

To give you an idea of what the API can do we've created a simple
Command Line Interface (CLI) in Python based on YippieMove's API. The
tool allows you to create transfers and the workflow mimiks the behavior
of the regular YippieMove.com. You can download this tool, along with
the complete source code directly from
[GitHub](https://github.com/wireload/yippiemove-cli).

[![](/uploads/2012/10/YippieMove_CLI-580x430.png "YippieMove CLI")](/uploads/2012/10/YippieMove_CLI.png)

*YippieMove's CLI in action.*

In order to make the development of applications on top of YippieMove
easier, we've created a complete sandbox-environment that allows you
test-run and develop your application without worrying about spending
real money or actually transferring emails. The sandbox is available at
[sandbox.yippiemove.com](http://sandbox.yippiemove.com) and
[api.sandbox.yippiemove.com](http://api.sandbox.yippiemove.com).

The full documentation for the API, along with a tutorial that walks you
through the process of creating a transfer, can be found
[here](http://www.yippiemove.com/help/api.html).

Happy hacking!
