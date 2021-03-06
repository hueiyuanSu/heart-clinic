namespace :misc do

  desc '列出 Server 端的環境變數。'
  task :server_env do
    on roles(:all) do
      puts capture(:env)
    end
  end

  desc '列出本地端的環境變數。'
  task :local_env do
    on(:local) do
      puts capture(:env)
    end
  end

end
