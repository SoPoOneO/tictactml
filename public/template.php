<!DOCTYPE html>
<html>
<head>
    <title>TicTacTml</title>
    <link rel="stylesheet" href="/boards.css">
</head>
<body>
<a href="/">Reset</a>
    
    <table>
        <?php foreach($board as $row => $cols): ?>
            <tr>
            <?php foreach($cols as $col => $val): ?>
                <td>
                    <?php if($val): ?>
                        <?= $val ?>
                    <?php else: ?>
                        <a href='/<?= $moves[$row][$col] ?>'>go</a>
                    <?php endif; ?>
                </td>
            <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>
    <br>
</body>
</html>