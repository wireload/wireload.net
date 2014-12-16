---
title: An update on Screenly
authors: Viktor Petersson
date: 2013-12-20 15:00:00
tags: news, screenly
---

Time flies. It has now been almost a year and a half since I wrote the alpha version/prototype of [Screenly](http://www.screenlyapp.com). I wrote Screenly to solve a problem I had myself (and as an excuse to play with the Raspberry Pi). I had no idea how big this project would become.

The announcement [thread](http://www.raspberrypi.org/phpBB3/viewtopic.php?f=41&t=12396) for Screenly on the Raspberry Pi forum took off like a rocket (and it is still one of the most popular threads on the entire forum). When I realized that Screenly could turn into something big, I brought it into [WireLoad](http://wireload.net) to turn it into a real product, where we allocated full-time developers to work on it. Over the past year and a half, we've seen an amazing uptake in users for Screenly, despite not having done any marketing at all. In fact, we've intentionally kept a very low profile in order not to grow too fast.

One thing I do realize that we haven't been very good at is communicating with our users about new features. We have done occasional Twitter updates, but we haven't been near good enough. To address this, I'm writing this email to bring you guys up to speed on what we have been working on with Screenly over the past few months.


# More beneficial plans
Some of you may have noticed that we have updated our [plans](http://www.screenlyapp.com/pricing.html) since we launched Screenly Pro. In order to make pricing more predictable we have created packages. These packages come with a pre-defined set of screens included, as well as other perks and various volume discounts. All the plans come with a free 14 day trial.

We have now also introduced a free tier. This allows you to run one screen for free for as long as you like.


# Faster updates
One comment we received frequently in Screenly Pro's early days was that the delay between when a change was made to a playlist until it was pushed out to the screen was too long. We agreed and spent a significant amount of time looking for the best technology to improve on this. We're happy to announce that the time for an update in the web UI to take effect on a screen is now often less than a minute (depending on the screen's internet connection).


# Better transitions
One of the most challenging parts of developing software for the Raspberry Pi is the hardware constraints. Where this becomes noticeable is lag when switching between assets. This lag is something we're looking at various ways of removing. We're happy to let you know that we have been able to significantly reduce it when switching between images and web pages (and vice versa). Unfortunately there is still a bit of gap when switching between images/web pages and videos, but we are continuing to work hard on this.


# Snappier setup
One thing that bothered me personally was the time it took to initiate a new screen. We've recently spent a lot of energy to cut this setup time down. It still takes longer than I'd like it to take, but we've managed to cut down the total time by about 50%.


# Thumbnails for all assets
When you have a lot of assets, it's sometimes hard to keep track of all of them. A thumbnail can help you quickly identify a particular asset. Screenly will now automatically generate thumbnails for all type of assets, including web-pages, to make your life easier.


# Multiple uploads
When you first set up your Screenly installation, it's likely that you are going to upload a lot of images and videos. Wouldn't it then be great if you could do multiple uploads simultaneously? We thought so too, and have now implemented this feature directly in the web interface. Just drag (or select) multiple assets and the web interface will automatically upload and process them.


# More advanced settings
You can use your Raspberry Pi with more or less any monitor that supports full HD and has an HDMI port. We try our best to preconfigure all types of TVs and monitors, but sometimes it is necessary to fine-tune the settings. To this end, we have introduced advanced settings for each node. This feature is for technical users, and exposes the monitor-related settings from [config.txt](http://elinux.org/RPi_config.txt).


# Partners
While I cannot really name any of these companies yet, I can say that we are working with some really cool companies and products to integrate directly into Screenly. Expect an update on this in the near future.

Do you want your product integrated in Screenly? If so, please drop us a line at hello@screenlyapp.com.


# Want to become a Screenly reseller?
We've received a lot of requests from companies around the world who want to resell Screenly. We are looking to establish a global network of resellers that can assist customers with value-added services, such as installations and content creation. Is this something you are interested in? If so, please sign up on our reseller [waitlist](http://eepurl.com/Kd3GD).


# Advice for creating content
Lastly, I want to leave you with some advice for when creating content for Screenly. First, you need to make sure to optimize all content for 1920x1080px (Full HD). Also, since various TV can behave differently, you might want to be careful with putting content too closely to the edges. On a perfectly configured TV, it should work fine, but if you have a diverse set of monitors, you might want to be conservative with edge content.

We've also been in touch with a few customers who were having issues with web content on their screens. The problem is most often related to the fact that they are trying to use heavy web technologies (such as jQuery slideshows or similar). This is unlikely to work well. You need to keep in mind that the Raspberry Pi's hardware is roughly equivalent to the very first iPhone. It's not comparable to your laptop or desktop computer. If you keep this in mind when developing web pages for Screenly, you'll get a much better result.

Still haven't tried Screenly? [Sign up now](https://login.screenlyapp.com/signup).


Regards, <br />
Viktor Petersson <br />
CEO, <br />
WireLoad Inc
