<!-- <p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p> -->

# 災害情報共有サービス　DISASTER SHARE

災害時に地域毎の有益な情報を共有し合うことにより、二次被害を防いだり、身を守る行動をより早く取れるようにすることを目的としたサービスです。
<!-- Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as: -->

## URL
URL: [https://www.disaster-share.com](https://www.disaster-share.com)
<!-- - [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting). -->
トップページのログインボタンからログインページに遷移していただき、「ゲストログインボタン」からゲストユーザーとしてログインしアプリをご使用いただけます。
こちらのサービスで用いている災害の写真は以下のサイトのものを利用しており、実際に起こった災害とは一切関係がありません。<br>                                                   
災害写真データベース: [http://www.saigaichousa-db-isad.jp/drsdb_photo/photoSearch.do](http://www.saigaichousa-db-isad.jp/drsdb_photo/photoSearch.do)


<!-- Laravel is accessible, yet powerful, providing tools needed for large, robust applications. -->

## アプリ作成の目的

<!-- Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library. -->
私は大学時代に自然災害をはじめとする災害の被害最小化について学んできました。
その中で、災害が起こった後の二次被害（地震後の津波、大雨の後の土砂崩れなど）により命を落としたり、怪我を負ってしまう方が自分の想像よりも多くいることを知ります。
そこで、二次災害が起きる前にその情報を共有できれば被害を減少させられるのではないか、自分にも災害の被害を最小化し、いち早く安全安心な暮らしへ復興するためにできることがあるのではないか？と考え本サービスを作成しました。
<!-- ## 工夫した点
・無限コメント機能
・CI/CDパイプラインの構築 -->


## 機能一覧
### ユーザー機能
- ユーザー登録・編集・削除
- 一覧表示
- ゲストログイン
- プロフィール画像の登録・編集
- マイページにて以下の投稿の一覧表示
    - 全ての自分の投稿
    - フォローしたユーザー
    - フォロワー
    - お気に入りに追加した投稿
### 投稿機能
- 投稿（画像, タイトル, メッセージ, 都道府県・市区町村, 場所, 位置情報）・編集・削除
- 一覧表示、詳細表示
- 地図表示（Google Maps API）
- お気に入り追加（いいね数のカウント, 非同期）
- 検索（キーワード検索・メニュー検索）
- 場所一覧
### コメント機能
- 投稿（コメント対しコメントが延々とできる, 非同期）
- コメントの表示（同一スレッド上にある直前, 直後のコメントを表示可能, 非同期）
- 削除(非同期)
### フォロー機能
- ユーザーのフォロー・フォロー解除（非同期）
- フォロー中のユーザーとフォロワーの一覧表示
### その他
- レスポンシブ対応
- テスト

<!-- ## Laravel Sponsors -->
## 使用技術
### フロント
- HTML
- CSS
- JavaScript
- jQuery(Ajax)
- bootstrap
### バックエンド
- PHP 7.2.33
- Laravel 6.18.40
### サーバー
- Nginx
- PHP-FPM

### DB
- MySQL 8.0.19
### インフラ・開発環境等
- AWS(ACM, EC2, ALB, ECR, ECS, RDS, Route53, VPC, S3)
- Docker/docker-compose
- CircleCI(CI/CD)
### その他
- Google API
- PHPUnit
- Larastan

<!-- We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell): -->

<!-- - **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Pulse Storm](http://www.pulsestorm.net/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/) -->

## インフラ構成図
<img width="618" alt="AWS構成図" src="https://user-images.githubusercontent.com/47106952/96061588-94f3f580-0ece-11eb-8afc-2f7db68f278e.png">

<!-- ## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->
