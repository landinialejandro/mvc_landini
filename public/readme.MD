verificar la configuracion de VHOST.
https://stackoverflow.com/questions/10175513/mod-rewrite-in-vhosts-configuration
en mi local queda así

Hay que habilitar el mod_rewrite, aca dice como mas como probar si está
https://rumahtulip.nl/blog/index.php/apache/enable-mod-rewrite-on-opensuse-linux

develop.conf
<Directory /home/alejandro/htdocs>
 Require all granted
 Options FollowSymLinks Includes ExecCGI #este es importante
 AllowOverride All
</Directory>
<VirtualHost *>
 ServerAdmin ale@landini.com.ar
 DocumentRoot /home/alejandro/htdocs
 ServerName develop
 RewriteEngine On
</VirtualHost>

reiniciar apache cuando se cambien el VHOST
~systemctl restart apache2

Configuración del .htaccess en la carpeta public
<IfModule mod_rewrite.c>
  Options -Multiviews
  RewriteEngine On
  # change RewriteBase for other project
  RewriteBase /multipleUpload/public
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
