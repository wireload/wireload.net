###
# Blog settings
###

# Time.zone = "UTC"

activate :blog do |blog|
    blog.paginate = true
    blog.prefix = "news"
    blog.permalink = ":year/:month/:title.html"
    blog.tag_template = "news/tag.html"
    blog.layout = "blog_post"
end

activate :authors do |authors|
    authors.author_template = "authors/author.html"
end
ignore "authors/author.html.haml" 

page "/feed.xml", :layout => false
page "/sitemap.xml", :layout => false

### 
# Compass
###

# Susy grids in Compass
# First: gem install susy
# require 'susy'

# Change Compass configuration
# compass_config do |config|
#   config.output_style = :compact
# end

###
# Page options, layouts, aliases and proxies
###

# Per-page layout changes:
# 
# With no layout
# page "/path/to/file.html", :layout => false
# 
# With alternative layout
# page "/path/to/file.html", :layout => :otherlayout
# 
# A path which all have the same layout
# with_layout :admin do
#   page "/admin/*"
# end

# Proxy (fake) files
# page "/this-page-has-no-template.html", :proxy => "/template-file.html" do
#   @which_fake_page = "Rendering a fake page with a variable"
# end

###
# Helpers
###

# Automatic image dimensions on image_tag helper
activate :automatic_image_sizes

# Methods defined in the helpers block are available in templates
# helpers do
#   def some_helper
#     "Helping"
#   end
# end

set :css_dir, 'stylesheets'

set :js_dir, 'javascripts'

set :images_dir, 'images'

# Build-specific configuration
configure :build do
  activate :minify_css
  activate :minify_javascript
  activate :minify_html, :remove_input_attributes => false
  
  # Mark all static resources with content hash to allow long cache expirations.
  activate :asset_hash,
    :ignore => [/downloads\/.*/]  
  
  # Use relative URLs
  # activate :relative_assets
  
  # Compress PNGs after build
  # First: gem install middleman-smusher
  # require "middleman-smusher"
  # activate :smusher
  
  # Or use a different image path
  # set :http_path, "/Content/images/"

  after_build do
    # Install the wktextview sample - it's better to only uncompress it after the build because it slows down the system
    # needlessly to have to scan all these files before the build.
    `cd build/downloads/ && rm -Rf wktextview-sample && tar -xvjf wktextview-sample.tbz`
    `find build/ -name .git -delete`
  end
end

activate :deploy do |deploy|
  deploy.method = :rsync
  deploy.user   = "aljungberg"
  deploy.host   = "se.hosting.wireload.net"
  deploy.path   = "/www/wireload.net"
  deploy.clean  = false
end
