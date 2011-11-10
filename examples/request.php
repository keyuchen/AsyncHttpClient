<?php
require __DIR__ . '/../src/AsyncHttpClient.php';

$base = event_base_new();

$uri = "http://www.baidu.com/";
$config = array(
    'eventbase' => $base
);

for($i = 0; $i < 10; $i++) {
    $client = new AsyncHttpClient($uri, $config);
    $client->request(function($result) {
        echo "Result len:";
        echo strlen($result['response']);
        echo "\n";
    });
}

event_base_loop($base);
echo "done\n";
