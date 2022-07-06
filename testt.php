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
    foreach ($result as $key => $value) {
        echo $value['lastname'] . "<br>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        #frm {
            border: solid gray 1px;
            width: 80%;
            border-radius: 2px;
            margin: 120px auto;
            background: white;
            padding: 50px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1 id="titre" ; style="font: size 600px; text-align:center;"> Tableau ES-PHP </h2>
        <div id="frm">
            <table>
                <tr>
                    <th>lastname</th>
                    <th>firstname</th>
                    <th>birthday</th>
                    <th>gender</th>
                    <th>email</th>
                    <th>phonenumber</th>
                    <th>website</th>
                </tr>
                <tr>
                    <td>lastname</td>
                    <td>firstname</td>
                    <td>birthday</td>
                    <td>gender</td>
                    <td>email</td>
                    <td>phonenumber</td>
                    <td>website</td>
                </tr>
            </table>
        </div>
</body>

</html>