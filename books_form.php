<!DOCTYPE html>
<?php
require 'mysql/config.php';
$bkin = (isset($_GET['bkin'])) ? $_GET['bkin'] : date("Y-m-d");
$bkout = (isset($_GET['bkout'])) ? $_GET['bkout'] : date("Y-m-d");
$bkcust = (isset($_GET['bkcust'])) ? $_GET['bkcust'] : "";
$bktel = (isset($_GET['bktel'])) ? $_GET['bktel'] : "";
$q = (int) (isset($_GET['q'])) ? $_GET['q'] : 0;
$days = (int) date_diff(date_create($bkin), date_create($bkout))->format('%R%a');

if ($days < 1) {
    echo "<script>window.location.replace('books_range.php');</script>";
    exit();
}

if (isset($_GET['rmid'])) {
    $rmid = $_GET['rmid'];
    $bkstatus = 0;
    require 'books_status.php';
}

if ($q > 0) {
    $kw = " AND roomtype.rmtype='$q'";
} else {
    $kw = "";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบจองห้องพัก</title>
    </head>
    <body>
        <form action="books_form.php"  method="GET">
            <label>เข้าพักวันที่</label>
            <input type="date" name="bkin" value="<?php echo $bkin; ?>" />
            <label>ถึง</label>
            <input type="date" name="bkout" value="<?php echo $bkout; ?>" /><br />
            <input type="hidden" name="bkcust" value="<?php echo $bkcust; ?>" />
            <input type="hidden" name="bktel" value="<?php echo $bktel; ?>" />
            <label>ประเภท : </label>
            <select name="q" id="q">
                <option value="0">ทั้งหมด</option>
                <?php
                $sql = "SELECT * FROM roomtype ORDER BY rmtype ASC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                    <option value="<?php echo $row['rmtype']; ?>"><?php echo $row['tpname']; ?></option>
                <?php } ?>
            </select>
            <button type="submit">ค้นหา</button>
        </form>
        <?php // แสดงห้องที่ว่าง?>
        <form action="books_insert.php" method="POST">
            <input type="hidden" name="bkin" value="<?php echo $bkin; ?>" />
            <input type="hidden" name="bkout" value="<?php echo $bkout; ?>" />
            <label>ผู้จอง : </label>
            <input type="text" name="bkcust" value="<?php echo $bkcust; ?>" required /><br />
            <label>โทรศัพท์ : </label>
            <input type="text" name="bktel" value="<?php echo $bktel; ?>" required /><br />
            <label>เลือกห้อง : </label><br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="rmid" size="10" required>
                <?php
                $sql = "SELECT * FROM rooms LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype "
                        . "WHERE rmid NOT IN (SELECT rmid FROM books WHERE bkstatus > 0 "
                        . "AND ((bkin >= '$bkin' AND bkin < '$bkout') OR (bkin < '$bkin' AND bkout > '$bkin')))"
                        . $kw;
                $result = $conn->query($sql);
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                    <option value="<?php echo $row['rmid']; ?>">
                        <?php echo $row['rmid']; ?>&nbsp;
                        <?php echo $row['tpname']; ?>&nbsp;
                        <?php echo number_format($row['rmprice'],0);?>
                    </option>
                <?php } ?>
            </select><br />
            <button type="submit">บันทึก</button>
        </form><br />
        <?php require 'books_room.php'; ?><br />
        <a href="books_list.php">ย้อนกลับ</a>
        <script>
            document.getElementById('q').value = "<?php echo $q; ?>";
        </script>
    </body>
</html>
