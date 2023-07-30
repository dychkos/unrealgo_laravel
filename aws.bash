#!/bin/bash

# Update the system
yum update -y

# Install Git
yum install -y git

# Install Docker and Docker Compose
yum install docker -y
yum install -y curl
# Download the Docker Compose binary
curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose

# Make the Docker Compose binary executable
chmod +x /usr/local/bin/docker-compose

service docker start
usermod -a -G docker ec2-user

# Configure SSH for GitHub access
mkdir -p /home/ec2-user/.ssh
echo "-----BEGIN OPENSSH PRIVATE KEY-----
      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
      oLTgi88xJNzrXC1ofceWeHp7o=
      -----END OPENSSH PRIVATE KEY-----" > /home/ec2-user/.ssh/id_rsa
chmod 400 /home/ec2-user/.ssh/id_rsa
ssh-keyscan github.com >> /home/ec2-user/.ssh/known_hosts
chown -R ec2-user:ec2-user /home/ec2-user/.ssh

# Clone your GitHub repository
git clone git@github.com:dychkos/unrealgo_laravel.git /home/ec2-user/unrgo-core

# Change directory to your project folder
cd /home/ec2-user/unrgo-core

# Start your Docker containers
docker-compose up -d

# Add additional setup steps here if needed

