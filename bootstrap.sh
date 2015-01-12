#!/bin/sh
apt-get update -y && apt-get upgrade -y && \
apt-get install software-properties-common -y && \
sudo add-apt-repository ppa:ondrej/php5-5.6 -y && \
apt-get update && \
apt-get install git tig mc htop git-flow vim links unzip bash-completion curl ant -y && \
apt-get install php5-cli php5-curl php5-intl -y && \
chown vagrant:vagrant /home/vagrant/.ssh/id_rsa && \
chmod 600 /home/vagrant/.ssh/id_rsa && \
chown vagrant:vagrant /home/vagrant/.gitconfig && \
sed -i "s^#force_color_prompt=yes^force_color_prompt=yes^" /home/vagrant/.bashrc
