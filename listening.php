<?php
require 'connection_es.php';

if (isset($_GET['q'])) {

    $q = $_GET['q'];
    $query = $client->search([
        'body' => [
            'query' => [
                'bool' => [
                    'should' => [
                        'match' => ['lastname' => $q],
                    ]
                ]
            ]
        ]
    ]);


    $hits = count($query['hits']['hits']);
    $result = null;
    $i = 0;
    while ($i < $hits) {
        $result[$i] = $query['hits']['hits'][$i]['_source'];
        $i++;
    }
    /*foreach ($result as $key => $value) {
        echo $value['lastname'] . "<br>";
    }*/
    echo '<pre>', print_r($result), '</pre>';
    die();
}

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Searching</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <form action="listening.php" method="get" autocomplete="off">
        Search for someone by lastname:
        <br><br>
        <input type="text" name="q">
        <label>
        </label>
        <input type="submit" value="Search">
    </form>
</body>

</html>
