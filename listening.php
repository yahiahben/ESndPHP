<?php
require 'connection_es.php';
require 'function-list.php';
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Searching</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
        #frm {
            border: solid gray 1px;
            width: 80%;
            border-radius: 2px;
            margin: 120px auto;
            background: white;
            padding: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: pink;
            color: white;
        }

        #btn {
            cursor: pointer;
            background-color: white;
            color: black;
            font-size: 16px;
            border: 2px solid pink;
            text-align: center;
            border-radius: 4px;
            padding: 12px 20px ;
        }

        .btn:hover {
            background-color: pink;
            color: white;
        }

        input[type=text] {
            width: 35%;
            box-sizing: border-box;
            border: 2px solid #FFC0CB;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            padding: 12px 20px ;
        }
    </style>
</head>

<body>
    <form action="listening.php" method="get" autocomplete="off">
        <h3>Search for someone by lastname:</h3>
        <br>
        <input type="text" name="q" placeholder="last name.." required>
        <label>
        </label>
        <input type="submit" id="btn" value="Search">
    </form>
    <div>
        <?php
        if (isset($result)) {
        ?>
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
                    <?php
                    foreach ($result as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $value['lastname'] ?></td>
                            <td><?php echo $value['firstname'] ?></td>
                            <td><?php echo $value['birthday'] ?></td>
                            <td><?php echo $value['gender'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['phonenumber'] ?></td>
                            <td><?php echo $value['website'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>