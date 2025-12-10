# -*- mode: ruby -*-
# vi: set ft=ruby :

NODES = {
  "manager" => "192.168.56.11",
  "worker1" => "192.168.56.12",
  "worker2" => "192.168.56.13",
  "db"      => "192.168.56.14"
}

Vagrant.configure("2") do |config|

  config.vm.box = "bento/ubuntu-22.04"

  NODES.each do |name, ip|
    config.vm.define name do |node|
      node.vm.hostname = name
      node.vm.network "private_network", ip: ip

      node.vm.provider "virtualbox" do |vb|
        vb.memory = 2048
        vb.cpus = 2
      end

      # Préparation pour Ansible
      node.vm.provision "shell", inline: <<-SHELL
        apt-get update -y
        apt-get install -y python3 python3-apt curl
      SHELL

    end
  end
end
