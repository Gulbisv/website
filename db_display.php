<?php
include_once 'Model/Database.php';
include_once 'Model/Subscription.php';
$db = new Database();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database display</title>
</head>
<body>
    <form action="db_display.php" method="get">
        <input type="text" name="search" placeholder="search emails..."/>
        <input type="submit" value="search"/>
    </form>

<?php
//Search
$select = 'SELECT * FROM subscribers';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $select .= " where email like '%$search%'";
}

//Sorting
$columns = array('id','email','created_at');
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
if ($result = $db->query($select . ' ORDER BY ' .  $column . ' ' . $sort_order)->fetch_all(MYSQLI_ASSOC)) {
    $up_or_down = str_replace(array('ASC', 'DESC'), array('up', 'down'), $sort_order);
    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
    $add_class = ' class="highlight"';
?>
<?php
    $groups = Subscription::getGroups($result);

?>
<div>

    <?php foreach ($groups as $group):?>
        <a href="<?= Subscription::getColumnSortUrl('email', $sort_order, $group) ?>"><?=$group ?></a>
            <?php endforeach; ?>
    <a href="db_display.php">X</a>

</div>
    <!--Table-->
    <table border="1">
        <tr>
            <th><a href="<?= Subscription::getColumnSortUrl('id', $asc_or_desc, $search) ?>">ID<?php echo $column == 'id' ? '-' . $up_or_down : ''; ?></a></th>
            <th><a href="<?= Subscription::getColumnSortUrl('email', $asc_or_desc, $search) ?>"">Email<?php echo $column == 'email' ? '-' . $up_or_down : ''; ?></a></th>
            <th><a href="<?= Subscription::getColumnSortUrl('created_at', $asc_or_desc, $search) ?>">Created at<?php echo $column == 'created at' ? '-' . $up_or_down : ''; ?></a></th>
        </tr>
        <?php foreach($result as $row): ?>
            <tr>
                <td<?php echo $column == 'id' ? $add_class : ''; ?>><?php echo $row['id']; ?></td>
                <td<?php echo $column == 'email' ? $add_class : ''; ?>><?php echo $row['email']; ?></td>
                <td<?php echo $column == 'created_at' ? $add_class : ''; ?>><?php echo $row['created_at']; ?></td>
                <?php  echo "<td><a href='delete.php?id=".$row['id']."'><button>DELETE</button></a></td>"; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
    $result->free();
}
?>