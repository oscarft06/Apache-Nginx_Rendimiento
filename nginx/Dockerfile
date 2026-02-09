FROM debian:stable-slim

RUN apt-get update && \
    apt-get install -y nginx openssl && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

COPY nginx.sh /nginx.sh
RUN chmod +x /nginx.sh

EXPOSE 80 443

ENTRYPOINT ["/nginx.sh"]