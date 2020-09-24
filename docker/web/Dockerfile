FROM alpine:3.6

# nginxのインストール
RUN apk update && \
    apk add --no-cache nginx

# ドキュメントルート
ADD ./docker/web/default.conf /etc/nginx/conf.d/default.conf

# ポート設定
EXPOSE 80

RUN mkdir -p /run/nginx

#public追加
RUN mkdir -p /var/www/public

COPY ./public /var/www/public

# フォアグラウンドでnginx実行
CMD nginx -g "daemon off;"
