#!/bin/bash

# Update the system
yum update -y

# Install Git
yum install -y git

# Install Docker and Docker Compose
amazon-linux-extras install docker -y
yum install -y docker-compose
service docker start
usermod -a -G docker ec2-user

# Configure SSH for GitHub access
mkdir -p /home/ec2-user/.ssh
echo "TEST_PRIVATE_KEY" > /home/ec2-user/.ssh/id_rsa
chmod 400 /home/ec2-user/.ssh/id_rsa
ssh-keyscan github.com >> /home/ec2-user/.ssh/known_hosts
chown -R ec2-user:ec2-user /home/ec2-user/.ssh

# Clone your GitHub repository
su - ec2-user -c "git clone git@github.com:dychkos/unrealgo_laravel.git /home/ec2-user/unrgo-core"

# Change directory to your project folder
cd /home/ec2-user/your_project_folder

# Start your Docker containers
docker-compose up -d

# Add additional setup steps here if needed

