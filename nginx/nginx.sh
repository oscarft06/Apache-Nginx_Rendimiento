#!/bin/bash

DOMAIN="www.nginx.local"
CERT_DIR="/etc/ssl/certs"
KEY_DIR="/etc/ssl/private"

echo "Aplicando optimizaciones..."
sed -i 's/worker_processes auto;/worker_processes 4;/' /etc/nginx/nginx.conf
sed -i 's/worker_connections 768;/worker_connections 2048;/' /etc/nginx/nginx.conf
sed -i 's/# multi_accept on;/multi_accept on;/' /etc/nginx/nginx.conf

if [ ! -f "$CERT_DIR/$DOMAIN.crt" ]; then
    echo "Generando certificado para $DOMAIN..."
    openssl req -x509 -nodes -days 365 \
        -newkey rsa:2048 \
        -keyout "$KEY_DIR/$DOMAIN.key" \
        -out "$CERT_DIR/$DOMAIN.crt" \
        -subj "/CN=$DOMAIN"
fi


cat <<EOF > /etc/nginx/sites-available/wordpress_nginx
server {
    listen 80;
    server_name $DOMAIN;
    return 301 https://$DOMAIN:8444\$request_uri;
}

server {
    listen 443 ssl;
    server_name $DOMAIN;

    root /var/www/html/wordpress_nginx;
    index index.php index.html;

    ssl_certificate $CERT_DIR/$DOMAIN.crt;
    ssl_certificate_key $KEY_DIR/$DOMAIN.key;

    location / {
        try_files \$uri \$uri/ /index.php?\$args;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass php-fpm:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
    }
}
EOF

echo "Ajustando permisos..."
chown -R www-data:www-data /var/www/html/wordpress_nginx
chmod -R 755 /var/www/html/wordpress_nginx

echo "Activando sitio..."
rm -f /etc/nginx/sites-enabled/default
ln -sf /etc/nginx/sites-available/wordpress_nginx /etc/nginx/sites-enabled/
nginx -t

echo "Iniciando Nginx..."
exec nginx -g 'daemon off;'