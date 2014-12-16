# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.network "forwarded_port", guest: 4567, host: 4567
  config.ssh.forward_agent = true

  config.vm.provision "shell",
      inline: "apt-get install -y ruby-dev git-core vim libxml2 libxml2-dev libxslt1-dev build-essential && gem install middleman && cd /vagrant && bundler install"
end
