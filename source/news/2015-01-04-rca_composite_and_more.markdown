---
title: Screenly now supports RCA/Composite and more
authors: Viktor Petersson
date: 2015-01-04 15:00:00
tags: news, screenly
---

Here is a brief update on what we have been working on and released since our [last update](http://wireload.net/news/2014/12/turkey_screenly_devices_and_more.html). In short, here's a quick summary:

 * Added support for Composite/RCA
 * Improved the HTTPS/SSL support
 * Enhanced the management of advanced settings
 * Created a new debug tool
 * Rolled out a number of bugfixes

## Support for Composite/RCA
We're happy to announce that Screenly now supports Composite/RCA for video output. While this feature is still considered <em>beta</em>, it is has been a frequently requested feature from our customers.

<span class="shadowed"><img src="/uploads/2015/01/composite_pal.png" alt="RCA and Composite" /><span class="sh tl"></span><span class="sh tr"></span><span class="sh bl"></span><span class="sh br"></span></span>

*This settings is available under "Screen" -> "Manage" -> "Advanced"*

Please note that HDMI is still the preferred video method, but for many customer replacing legacy digital signage solutions, this feature will allow them to get their entire fleet of screens migrated to Screenly.

## Improved HTTPS support
For customers who are displaying HTTPS/SSL web pages on their screens, we&#39;re happy to announce that we have improved this support. Previously, it was necessary during certain circumstances to disable the SSL verification even for valid certificates. This has now been resolved.

## Better management of advanced settings
For customers who needed to tweak the display and hardware settings, we&#39;re happy to announce that we&#39;ve made significant improvements to how this is handled. The main goal of this update was to make it easy to understand what the default value was, and to make it easier to manage individual values.

<span class="shadowed"><img src="/uploads/2015/01/advanced_settings.png" alt="Advanced settings in Screenly" /><span class="sh tl"></span><span class="sh tr"></span><span class="sh bl"></span><span class="sh br"></span></span>

When visiting the advanced settings (under "Screen" -> "Manage" -> "Advanced"), you will now see that there is a checkbox between the value name and the drop-down. When this checkbox is unchecked, the default value will be used (and displayed in the drop-down).

## New debugging tools
With the rapid growth of the number of Screenly installations, we are starting to see a number of new network and hardware configurations (in particular in enterprise settings). To better be able to troubleshoot these nodes, we&#39;ve built a new debugging tool for Screenly.

Since many of these new situations were network related, we were unable to rely on the network to send in debug data. To remedy this, the new tool uses a regular USB drive and copies debug data to this USB device. The tool is designed to run for both shorter and extended periods of time, in case the issue we&#39;re troubleshooting only happens occasionally.

More information can be found [here](https://login.screenlyapp.com/doc/faq#debugging)

## Bugfixes
In addition to the features and enhances above, we&#39;ve also rolled out a number of bug fixes in the last newsletter.

# What about the new Raspberry Pi 2?
We're as excited as you are about the [announcement](http://www.raspberrypi.org/raspberry-pi-2-on-sale/) of the Raspberry Pi 2. With the new improved hardware, Screenly&#39;s performance is surely going to improve by a lot.

That said, given the new hardware specs, we are still yet to officially add support for this device.

**Update:** The Raspberry Pi 2 (Model B) is now supported. Please see [this page](/news/2015/02/raspberry_pi_2_supported.html) for more information.

## Got feedback?
We're always looking at ways to improve Screenly. If you got any feedback or questions, please do not hesitate to [contact us](http://support.wireload.net) by opening a support ticket.

Still haven't tried Screenly? [Sign up now](https://login.screenlyapp.com/signup).
