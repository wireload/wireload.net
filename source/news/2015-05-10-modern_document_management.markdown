---
title: Modern document management for your startup
authors: Viktor Petersson
date: 2015-05-10 09:00:00
tags: news, tips, startup
---

If you're a techie like me, chances are you hate Microsoft Office with passion. If your company still emailing Word files back and forth internally, just stop it. You're wasting your own and others time (not to mention that you're filling your mailbox with crap). There are far better ways of doing this.

A lot of modern companies are using Google Apps for their email. With that, you get Google Drive/Docs, which isn't all that bad. It certainly is a big step forward compared to emailing files back and forth. However, in this article we'll explore a different approach. The main goal of this approach is to leverage tools from the developer toolkit that solved the collaborative problems a long time ago.

## Deciding on a document language

At WireLoad, we're big fans of Markdown. We've used it for years for everything from blog posts, to page content and most recently even for legal documents. The benefits of Markdown are clear: it's easy to read and write for all types of users and it is widely supported across text editors.

There are however some drawbacks. When writing documents with Markdown, you'll likely miss things like page breaks. Some implementations of Markdown do support this, while others do not (it's '*****' in those who do support it).

Since we do need this, what we've done is that we use LaTeX for features that are missing in Markdown (more about that later). A document could then look something like this:

<pre><code class="markdown">
# Hello world
This document was generated on \today.
\newpage
And this will appear on the next page.
</code></pre>

As you can see, it's pretty easy to read even for non-technical users.

There are other formats that you could use too, such as ReStructuredText. In theory, you could even user plain text, but as you'll see why that would be less desirable later.

## Collaboration

As mentioned in the first paragraph, we're going to draw inspiration from the developer toolbox for document collaboration, the two obvious collaborative environment's would then be:

 * A git repo (or your SVC of choice)
 * A wiki

At WireLoad, we opted for using the Wiki. Since we already use [Phabricator](http://phabricator.org/) extensively and the built-in wiki offers great features. For instance, you can set custom permission policy for sensitive documents. Moreover, another benefit of using the wiki is that you get live preview.

## Markdown/LaTeX/ReStructuredText to PDF

When you're done collaborating on the document, chances are you need to have it signed (if it is a legal document). In that case, Markdown won't really do. You will need to create a PDF.

Luckily, there are plenty of tools out there that can convert markup languages, like Markdown, to PDF. The tool we use is [Pandoc](http://pandoc.org/). Once installed, you can create a PDF with a single command (or use this [Docker container](https://github.com/vpetersson/docker-pandoc)).

If you prefer a GUI, there are a number of other tools that can do this too, including [Marked](http://marked2app.com/) for OS X. One of the benefits with using Pandoc however is that it allows you to mix and match LaTeX with your Markdown.

## Signing

With a PDF ready for signing, we need to upload it to a digital signature service. Our service of choice is [HelloSign](http://hellosign.com/), as it's reasonably priced (compared to many others), and has a good user interface.

## Storing the signed copy

After the customer/partner signed the copy, you get a signed PDF back from the signing service. In Phabricator, you can simply attach the signed copy to the Wiki page, but you could as well store it in a Git repository.
