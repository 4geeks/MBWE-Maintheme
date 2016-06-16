after :deploy ,'after_deploy' do
    on roles([:app]) do |host|
        if (fetch :branch) =='development'
            deploy_path = deploy_to + '/current'
            execute("bash -l -c \"cp #{deploy_path}/* /home/deploy/wp-bmwe-new/shared/project/web/app/themes/html5blank-stable/ -r \"")
        end
        if (fetch :branch) =='master'
            deploy_path = deploy_to + '/current'
            execute("bash -l -c \"cp #{deploy_path}/* /home/deploy/bmwe/wp-content/themes/html5blank-stable/ -r \"")
        end
    end
end

