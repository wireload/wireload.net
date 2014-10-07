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

1. Install [Middleman](middlemanapp.com).

        gem install middleman

2. Run it in server mode:

        bundle exec middleman server

3. Open [http://127.0.0.1:4567/](http://127.0.0.1:4567/) to view site.

Now you can simply edit the markdown, HAML, CSS, JavaScript and so on which makes up the site. Middleman will automatically compile it.

### How to Deploy

    bundle exec middleman build && bundle exec middleman deploy
