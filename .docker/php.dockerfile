FROM webdevops/php-nginx:7.3
WORKDIR /app
RUN echo "fastcgi_buffer_size 32k;\nfastcgi_buffers 4 32k;" >> /opt/docker/etc/nginx/vhost.conf

USER application

EXPOSE 80
EXPOSE 443

