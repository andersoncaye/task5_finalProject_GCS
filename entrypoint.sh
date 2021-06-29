#!/bin/sh
docker-compose up -d --build
docker run -p 80:8181 -d --nome app_homo -- network homo_gcs
