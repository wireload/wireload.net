To fix formatting of an old blog post:

* Rename it from .erb to .markdown.
* Convert its content from HTML to markdown.
    * Method 1: http://html2markdown.com
    * Method 2:

            brew install haskell-platform
            cabal install pandoc
            # copy the content
            pbpaste | ~/.cabal/bin/pandoc -f html -t markdown|pbcopy

* Hand edit the markdown to fix any incorrect linebreaks.


### How to Make Site Changes

#### Install Middleman

    gem install middleman
    bundle exec middleman server

#### Open a browser window.

Just point your browser to [http://127.0.0.1:4567/](http://127.0.0.1:4567/) to view site.

Now you can simply edit the markdown, HAML, CSS, JavaScript and so on which makes up the site. Middleman will automatically compile it.

### How to Deploy

    bundle exec middleman build &&
    rake deploy:se &&
    rake deploy:us
