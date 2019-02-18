
Installation:
1) Clone or download repository
2) Run composer install
3) Create database
4) Change config.php in root directory
5) In browser run {local_url}/database/migrate.php

REST API
1) GET {local_url}/api/interval - interval list
2) POST {local_url}/api/interval - add new interval (example data ['date_start' => '2019-02-15 15:08:00','date_end'=>'2019-02-15 15:12:59', 'price'=>'20'])
3) PUT {local_url}/api/interval - update interval (example data ['date_start' => '2019-02-15 15:08:00','date_end'=>'2019-02-15 15:12:59', 'price'=>'20']) 
4) DELETE {local_url}/api/interval - delete interval (example data ['date_start' => '2019-02-15 15:08:00','date_end'=>'2019-02-15 15:12:59', 'price'=>'20'])

In browser run {local_url}/database/clear.php - clear database