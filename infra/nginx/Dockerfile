# infra/nginx/Dockerfile
FROM nginx:1.20-alpine

# Copy the nginx configuration file
COPY ./infra/nginx/default.conf /etc/nginx/conf.d/default.conf

# Copy application files
# src配下のpublicだけでもよいかも
# COPY ./src /data
COPY ./src/public /data/public

WORKDIR /data
