set +x
RUN_USER=vagrant

if [[ ! -f /etc/vagrant_bootstrapped ]]; then
  sudo yum install -y epel-release
  sudo yum install -y python python-pip
  sudo -u ${RUN_USER} bash -c "pip install ansible --user"
  sudo touch /etc/vagrant_bootstrapped
fi

sudo -i -u ${RUN_USER} bash -c "ansible-playbook /home/vagrant/NewGrad/ansible/main.yml --connection=local"