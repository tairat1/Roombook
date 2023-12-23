<?php
//แสดงเฉพาะห้องที่มีสถานะการ + ปุ่มยกเลิกการจอง ประยุกต์ใช้กับหน้าแอดมิน และ User
$sql="SELECT * FROM books "
        . "LEFT JOIN rooms ON books.rmid = rooms.rmid "
        . "LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype "
        . "WHERE books.bkin = '$bkin' AND books.bktel = '$bktel' AND books.bkstatus = '1'";
$result=$conn->query($sql);
?>

<table border="1" cellspacing="0" cellpadding="2">
    <thead>
        <tr>
            <th>ยกเลิก</th>
            <th>เลขที่ห้อง</th>
            <th>ประเภท</th>
            <th>เข้าพัก</th>
            <th>ออก</th>
            <th>ราคา/คืน</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($row=$result->fetch_array(MYSQLI_ASSOC)){ 
        ?>
        <tr>
            <td> <a href="javascript:bookcancel('<?php echo $row['rmid'];?>');">ยกเลิก</a> </td>
            <td><?php echo $row['rmid'];?></td>
            <td><?php echo $row['tpname'];?></td>
            <td><?php echo date_format(date_create($row['bkin']), "d/m/Y");?></td>
            <td><?php echo date_format(date_create($row['bkout']), "d/m/Y");?></td>
            <td align="right"><?php echo number_format($row['rmprice'],0);?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<script>
function bookcancel(v1){
    window.location.href="books_form.php?bkin=<?php echo $bkin;?>&bkout=<?php echo $bkout;?>&bkcust=<?php echo $bkcust;?>&bktel=<?php echo $bktel;?>&rmid=" + v1;
}
</script>
