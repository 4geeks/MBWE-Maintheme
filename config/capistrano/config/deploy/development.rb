role :app, %w{deploy@wordpress-bmwe.geekies.co:5388}

set :stage, :deploy
server 'wordpress-bmwe.geekies.co', user: 'deploy', roles: %w{app}

set :branch, 'development'

set :deploy_to, '/home/deploy/themes/main-theme'

set :keep_releases, 1
