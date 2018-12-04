sudo curl -L "https://github.com/docker/compose/releases/download/1.23.1/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
docker-compose --version
security_group=$(ec2-metadata -s | cut -d " " -f 2);
aws ec2 authorize-security-group-ingress --group-name $security_group --protocol tcp --port 80 --cidr 0.0.0.0/32
aws ec2 authorize-security-group-ingress --group-name $security_group --protocol tcp --port 8080 --cidr 0.0.0.0/32
