<?php
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
}