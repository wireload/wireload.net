bundle exec middleman build && bundle exec middleman deploy && ssh aljungberg@188.95.224.154 "sudo chown -R aljungberg:www-data /www/beta.wireload.net/ && sudo chmod g+r -R /www/beta.wireload.net/"