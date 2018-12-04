ip=$(curl http://169.254.169.254/latest/meta-data/public-ipv4)
echo "Web Server"
echo "http://$ip"
echo "PhpMyAdmin"
echo "http://$ip:8080"
