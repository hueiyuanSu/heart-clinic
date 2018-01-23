namespace :docker do

  desc '建立程式的 docker image。'
  task :build do
    on roles(:app) do
      execute "cd #{release_path} && docker build --rm -t #{fetch(:application)} ."
    end
  end

  desc '將程式透過 docker-compose 啟動。'
  task :compose do
    on roles(:app) do
      previous = capture("ls -t1 #{releases_path} | sed -n '2p'").to_s.strip
      execute "cd #{releases_path}/#{previous} && docker-compose down"
      execute "cd #{release_path} && docker-compose up -d"
    end
  end

  desc '強制移除程式的 docker container。'
  task :kill do
    on roles(:app) do
      execute "cd #{release_path} && docker-compose rm -sf"
    end
  end

  desc '進入程式的 docker container shell。'
  task :shell do
    roles(:app).each do | host |
      cmd = "ssh -t -p %s %s@%s docker exec -it %s sh" % [host.port, host.user, host.hostname, fetch(:application)]
      system cmd
    end
  end

end
