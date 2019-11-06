<?php
$clientes = $_REQUEST['route'];
?>;
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Implementando MVC</title>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>ROUTE</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?php echo $cliente->getId(); ?></td>
            <td><?php echo $cliente->getNome(); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>