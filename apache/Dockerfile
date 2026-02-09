FROM debian:stable-slim

RUN apt-get update && \
    apt-get install -y apache2 openssl && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod ssl rewrite proxy proxy_fcgi setenvif headers
RUN a2dismod mpm_prefork && \
    a2enmod mpm_event

COPY apache.sh /apache.sh
RUN chmod +x /apache.sh

EXPOSE 80 443

ENTRYPOINT ["/apache.sh"]