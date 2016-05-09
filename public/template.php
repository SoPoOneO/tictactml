<!DOCTYPE html>
<html>
<head>
    <title>TicTacTml</title>
    <link rel="stylesheet" href="/boards.css">
</head>
<body>
    
    <table>
        <?php foreach($board as $row): ?>
            <tr>
            <?php foreach($row as $val): ?>
                <td><?= $val ? $val : '&nbsp' ?></td>
            <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>
    <br>
</body>
</html>