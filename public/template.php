<!DOCTYPE html>
<html>
<head>
    <title>TicTacTml</title>
    <link rel="stylesheet" type="text/css" href="../../boards.css">
    <base href="../../">
</head>
<body>
    <center>
        <br><br><br>
        <a href="---/---/---.html">Reset</a>
        <br><br><br>
        <table>
            <?php foreach($board as $row => $cols): ?>
                <tr>
                <?php foreach($cols as $col => $val): ?>
                    <td>
                        <?php if($val): ?>
                            <?= $val ?>
                        <?php else: ?>
                            <a href='<?= $moves[$row][$col] ?>.html'>go</a>
                        <?php endif; ?>
                    </td>
                <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </center>
</body>
</html>