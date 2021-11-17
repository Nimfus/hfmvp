FROM nginx:latest

ADD vhosts.conf /etc/nginx/conf.d/default.conf
