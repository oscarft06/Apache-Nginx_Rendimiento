CREATE DATABASE  IF NOT EXISTS wordpress_nginx;
GRANT ALL PRIVILEGES ON wordpress_nginx.* TO 'wp_user'@'%';
FLUSH PRIVILEGES;