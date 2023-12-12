<!DOCTYPE html>
<?php $nowdate=date("Y-m-d");?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบจองห้องพัก</title>
    </head>
    <body>
        <form action="books_form.php" method="GET">
            <label>เข้าพักวันที่</label>
            <input type="date" name="bkin" value="<?php echo $nowdate; ?>" required />
            <label>ถึง</label>
            <input type="date" name="bkout" value="<?php echo $nowdate; ?>" required /><br />
            <button type="submit">ตกลง</button>
            <a href="books_list.php">ย้อนกลับ</a>
        </form>
    </body>
</html>
