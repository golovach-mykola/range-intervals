<?php
require "bootstrap.php";
$params = [
    'ip_address' => $_SERVER['REMOTE_ADDR'],
    'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    'page_url' => $_SERVER['HTTP_REFERER']
];
$visitRepository = new \repositories\VisitRepository(new \models\Visit(), $params);
$visitRepository->pushVisit();
echo file_get_contents('test.png');
die();