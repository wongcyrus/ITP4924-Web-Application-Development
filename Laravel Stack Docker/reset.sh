#!/bin/bash
docker-compose down -v
umount public_html
rm -rf public_html
mkdir public_html
chmod -R 777 public_html/
/usr/bin/vmhgfs-fuse .host:/phpcode /root/public_html -o subtype=vmhgfs-fuse,allow_other
sleep 2s
rm -rf public_html/*
find public_html/ -type f -name ".*" -delete
chmod -R 777 public_html/
rm -rf data-mysql
mkdir data-mysql
chmod 777 data-mysql/

