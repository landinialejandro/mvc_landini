Este es mi framework inical

se utiliza las siguientes instrucciones en .htaccess
para redireccionar todo al public

````
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteRule  ^$ public/ [L]
  RewriteRule  (.*) public/$1 [L]
</IfModule>
```
