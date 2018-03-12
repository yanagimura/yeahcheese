Vagrant.configure("2") do |config|
  config.vbguest.auto_update = true
  config.vm.box = "bento/centos-7.4"
  config.vm.network "private_network", ip: "10.81.22.67"
  config.vm.synced_folder ".", "/home/vagrant/NewGrad"
  config.vm.provision :shell, :path => "ansible/init.sh"
end
