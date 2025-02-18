# PHP公式イメージを使用
FROM php:8.1-apache

# 必要なパッケージをインストール（PostgreSQL対応）
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# 作業ディレクトリを設定
WORKDIR /var/www/html

# プロジェクトのソースコードをコピー
COPY . /var/www/html/

# Apacheのポートを開放
EXPOSE 80

# Apacheを起動
CMD ["apache2-foreground"]