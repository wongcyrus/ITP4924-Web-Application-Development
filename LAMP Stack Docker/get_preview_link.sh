ip=$(curl http://169.254.169.254/latest/meta-data/public-ipv4)
echo "Web Server"
echo "http://$ip"
echo "PhpMyAdmin"
echo "http://$ip:8080"
hostname=$(curl http://169.254.169.254/latest/meta-data/local-hostname)
echo "Web Server Host"
echo "http://$hostname"
echo "PhpMyAdmin Host"
echo "http://$hostname:8080"
