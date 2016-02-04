<style>

table {
    border-collapse: collapse;
    margin-bottom: 20px;
}

tr:first-child td{
    border-top: none;
}

tr:last-child td{
    border-bottom: none;
}

td:first-child{
    border-left: none;
}

td:last-child{
    border-right: none;
}

td{
    border: 2px solid black;
    width: 15px;
    height: 15px;
    text-align: center;
}

</style>

<table>
    <?php foreach($board as $row): ?>
    <tr>
        <?php foreach($row as $player): ?>
        <td>
            <?php if($player): ?>
            <?= $players[$player] ?>
            <?php endif; ?>
        </td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach ?>
</table>