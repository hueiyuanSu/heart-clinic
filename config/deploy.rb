set :application, ENV['APPLICATION']
set :repo_url, ENV['REPO_URL']
set :deploy_to, ENV['DEPLOY_TO']
set :keep_releases, ENV['KEEP_RELEASES'].to_i

# Default branch is :master
ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default value for :pty is false
# set :pty, true

# Default value for default_env is {}
set :default_env, { path: "/usr/local/bin:$PATH" }

# Default value for local_user is ENV['USER']
# set :local_user, -> { `git config user.name`.chomp }

### Shared files for Rails
# append :linked_files, 'docker.env'
# append :linked_dirs, 'log', 'tmp', 'public/.well-known/acme-challenge', 'public/system', 'public/assets'

### Shared files for Yii
append :linked_files, 'config/db.php', 'config/params.php', 'config/env.php', 'web/.htaccess'
append :linked_dirs, 'vendor', 'runtime', 'web/assets', 'web/files','web/images/item_images'

### Custom your deploy flow
namespace :deploy do
  ### Yii (base on Docker) flow
  after 'deploy:published', 'docker:build'
  after 'docker:build', 'docker:compose'

  ### Rollback flow
  # after :rollback, "docker:dockerize"
end
