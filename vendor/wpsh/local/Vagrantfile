project_path = ENV['PWD']
local_path = File.dirname(__FILE__)

Vagrant.configure(2) do |config|
  config.vm.box = 'ubuntu/xenial64'
  config.vm.network 'private_network', type: 'dhcp'
  config.vm.synced_folder project_path, '/vagrant'

  # Rename ubuntu-xenial-16.04-cloudimg-console.log to console.log
  config.vm.provider 'virtualbox' do |vb|
    vb.customize ['modifyvm', :id, '--uartmode1', 'file', 'console.log']
  end

  config.vm.provision 'shell',
    path: File.join(local_path, 'scripts/vagrant/provision.sh')

  config.vm.provision 'shell',
    path: File.join(local_path, 'scripts/vagrant/up.sh'),
    run: 'always'
end
