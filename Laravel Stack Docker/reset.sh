#!/bin/bash
docker-compose down -v 
rm -rf public_html/*
chmod -R 777 public_html
rm -rf data-mysql
mkdir data-mysql
chmod 777 data-mysql/

