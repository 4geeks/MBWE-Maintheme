#after :deploy ,'after_deploy' do
#    on roles([:app]) do |host|
#        deploy_path = deploy_to + '/current'
#        execute("bash -l -c \"cp #{deploy_path}/* /home/deploy/wp-bmwe-new/shared/project/web/app/themes/pluto-osetin-theme/ -r \"")
#    end
#end
