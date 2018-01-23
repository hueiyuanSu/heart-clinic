軟體安裝說明
============================

INSTALLATION
------------

### 資料庫設定

先於mysql資料庫新增一個資料庫，儲存編碼為 utf8mb4_general_ci
至config/db.php.sample複製一個新檔為db.php
更改檔案內連線資料

### 網站設定檔

#### 網站參數

至config/params.php.sample複製一個新檔為params.php
依照所需的設定值稍作修改

#### pretty url設定

至web/.htaccess.sample複製一個改成.htaccess
此檔案是為了改寫網址的格式從index.php?r=xxx成為  /xxxx格式而需要的伺服器設定檔

#### 模式切換

至config/env.php.sample複製一個新檔為env.php
選擇檔案內為develop or production模式

### 終端機操作更新composer

從終端機介面至專案資料夾下執行:

~~~
composer
~~~

### 更新資料庫

從終端機介面至專案資料夾下執行:

~~~
yii migrate
~~~

通常會需要指定yii的所在位置，故寫法為：[php5.5.26請依照本機使用的php版本替換]

~~~
/Applications/MAMP/bin/php/php5.5.26/bin/php ./yii migrate
~~~

user套件的db資料產生
~~~
/Applications/MAMP/bin/php/php5.5.26/bin/php ./yii migrate --migrationPath=@vendor/dektrium/yii2-user/migrations
~~~
rbac套件的db資料產生
~~~
/Applications/MAMP/bin/php/php5.5.26/bin/php ./yii migrate/up --migrationPath=@yii/rbac/migrations
~~~
category套件的db資料產生
~~~
/Applications/MAMP/bin/php/php5.5.26/bin/php ./yii migrate/up --migrationPath=@vendor/yiimodules/yii2-categories/migrations
~~~

### 開始運行網站

The minimum requirement by this project template that your Web server supports PHP 5.4.0.
