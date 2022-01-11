web: vendor/bin/heroku-php-nginx -C nginx_app.conf /public
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
