role :app, %w{deploy@bestmiamiweddings.com:5388}

set :stage, :deploy
server 'bestmiamiweddings.com', user: 'deploy', roles: %w{app}, port: 5388

set :branch, 'master'

set :deploy_to, '/home/deploy/themes/main-theme'

set :keep_releases, 1
