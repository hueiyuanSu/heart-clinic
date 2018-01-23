set :docker, '/usr/local/bin/docker'
set :docker_compose, '/usr/local/bin/docker-compose'
server 'mini50.larvata.tw', user: 'larvata', roles: %w{app db web}, port: 5022
# server 'mini60.larvata.tw', user: 'larvata', roles: %w{app db web}, port: 6022
