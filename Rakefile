namespace :deploy do
  def deploy(env)
    puts "Deploying to #{env}"
    system "TARGET=#{env} bundle exec middleman deploy"
  end

  task :us do
    deploy :us
  end

  task :se do
    deploy :se
  end
end
