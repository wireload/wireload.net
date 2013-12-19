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

