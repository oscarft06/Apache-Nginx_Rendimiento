#!/bin/bash

DOMAIN="www.apache.local"
CERT_DIR="/etc/ssl/certs"
KEY_DIR="/etc/ssl/private"

if [ ! -f "$CERT_DIR/$DOMAIN.crt" ]; then
    echo "Generando certificado para $DOMAIN..."
    openssl req -x509 -nodes -days 365 \
        -newkey rsa:2048 \
        -keyout "$KEY_DIR/$DOMAIN.key" \
        -out "$CERT_DIR/$DOMAIN.crt" \
        -subj "/CN=$DOMAIN"
fi

if [ ! -f /var/www/html/phpmyadmin/config.inc.php ]; then
    echo "Configurando phpMyAdmin..."
    cp /var/www/html/phpmyadmin/config.sample.inc.php /var/www/html/phpmyadmin/config.inc.php
    echo "\$cfg['Servers'][1]['host'] = 'mysql';" >> /var/www/html/phpmyadmin/config.inc.php
    randomSecret=$(openssl rand -base64 32)
    sed -i "s/\$cfg\['blowfish_secret'\] = '';/\$cfg['blowfish_secret'] = '$randomSecret';/" /var/www/html/phpmyadmin/config.inc.php
fi


cat <<EOF > /etc/apache2/sites-available/000-default.conf
<VirtualHost *:80>
    ServerName $DOMAIN
    Redirect permanent / https://$DOMAIN:8445/
</VirtualHost>

<VirtualHost *:443>
    ServerName $DOMAIN
    DocumentRoot /var/www/html/wordpress_apache

    SSLEngine on
    SSLCertificateFile $CERT_DIR/$DOMAIN.crt
    SSLCertificateKeyFile $KEY_DIR/$DOMAIN.key

    <Directory /var/www/html/wordpress>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    Alias /phpmyadmin /var/www/html/phpmyadmin
    <Directory /var/www/html/phpmyadmin>
        Options FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    <FilesMatch \.php$>
        SetHandler "proxy:fcgi://php-fpm:9000"
    </FilesMatch>

    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

echo "Ajustando permisos..."
chown -R www-data:www-data /var/www/html/wordpress_apache
chmod -R 755 /var/www/html/wordpress_apache


echo "Iniciando Apache..."
rm -f /var/run/apache2/apache2.pid
exec apache2ctl -D FOREGROUND