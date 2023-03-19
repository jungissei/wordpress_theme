#!/bin/bash

# WordPressセットアップ admin_user,admin_passwordは管理画面のログインID,PW
wp core install \
--url='http://localhost:8080/dance/' \
--title='サイトタイトル' \
--admin_user='test' \
--admin_password='test' \
--admin_email='test@test.com' \
--allow-root --path=/var/www/html


#WordPressアップデート
wp core update --allow-root --path=/var/www/html
wp plugin update --all --allow-root --path=/var/www/html
wp core language update --allow-root --path=/var/www/html


#管理者ユーザー作成
wp user create admin admin@example.com --role=administrator --allow-root --path=/var/www/html

#お客様ユーザー作成：authorはお客様名に置き換える
wp user create author author@example.com --role=author --allow-root --path=/var/www/html



#デバックモード有効化
wp config set WP_DEBUG true --raw --allow-root --path=/var/www/html



# 日本語化
wp language core install ja --activate --allow-root --path=/var/www/html
# タイムゾーンと日時表記
wp option update timezone_string 'Asia/Tokyo' --allow-root --path=/var/www/html
wp option update date_format 'Y-m-d' --allow-root --path=/var/www/html
wp option update time_format 'H:i' --allow-root --path=/var/www/html
# キャッチフレーズの設定 (空にする)
wp option update blogdescription '' --allow-root --path=/var/www/html
#サイトを見るときにツールバーを非表示する
wp option update show_admin_bar_front false --allow-root --path=/var/www/html

# プラグインの削除 (不要な初期プラグインを削除)
wp plugin delete hello.php --allow-root --path=/var/www/html

# プラグインのインストール (必要に応じてコメントアウトを外す)
wp plugin install wp-multibyte-patch --activate --allow-root --path=/var/www/html
wp plugin install siteguard --activate --allow-root --path=/var/www/html
wp plugin install tinymce-advanced --activate --allow-root --path=/var/www/html
# wp plugin delete akismet --allow-root --path=/var/www/html
wp plugin install flamingo --activate --allow-root --path=/var/www/html
wp plugin install contact-form-7 --activate --allow-root --path=/var/www/html
wp plugin install wordpress-seo --activate --allow-root --path=/var/www/html

# テーマの削除
wp theme delete twentysixteen --allow-root --path=/var/www/html
wp theme delete twentyseventeen --allow-root --path=/var/www/html
wp theme delete twentynineteen --allow-root --path=/var/www/html
# wp theme delete twentytwenty --allow-root --path=/var/www/html



# パーマリンク更新
wp option update permalink_structure /%category%/%post_id% --allow-root --path=/var/www/html


# ページ削除
wp post delete 1 --force --allow-root
wp post delete 2 --force --allow-root
wp post delete 3 --force --allow-root
wp post delete $(wp post list --post_status=trash --format=ids) --allow-root

# ページ作成
wp post create –-post_title=システム --post_name=system –-post_type=page –-post_status=publish –-porcelain --allow-root
