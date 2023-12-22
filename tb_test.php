<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Booking</title>
    <link rel="stylesheet" type="text/css" href="css/tb_style.css">

    <link rel="stylesheet" href="css/modal.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/_custom.css">
     
</head>

<body>
     <!-- Modal 1 -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
              <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">พี่บัวขาว</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- form -->
                  <form action="books_insert.php" method="POST"> 
                    <!-- ซ่อนช่องกรอกข้อมูลไว้ ส่งค่าไปยัง ฟอร์อม books_insert.php-->
                    <input type="hidden"   name="bkin" 
                    value="11">
                    <input type="hidden"  name="bkout" 
                    value="22">
                    <!-- ซ่อนช่องกรอกข้อมูลไว้-->
                    <label for="recipient-name" class="col-form-label">ckin 17/Dec/2023</label>
                    <label for="recipient-name" class="col-form-label">ckout 18/Dec/2023</label>
                      <!-- Phone : เบอร์  name="bktel" -->
                    <label for="recipient-name" class="col-form-label">Phone:</label>
                    <label for="recipient-name" class="col-form-label">Rooms:</label>
                    <div class="mb-3 p-1">
                      <label for="message-text" class="col-form-label">หมายเหตุ</label>
                      <textarea class="form-control" id="message-text"></textarea>
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>  
                <!-- EnD -->
               </form>
              </div>
            </div>
          </div>
        </div>  
        <!-- End Modal 1 -->

    <main class="table" id="customers_table">

   
        <section class="table__header">
            <h1>Admin Booking</h1>
            
               <div class="input-group"> 
                    <div class="col d-flex">
                   <input type="search" placeholder="Search..."> 
                   </div>
               </div>  
           

        </section>
        <br>
        <center >
        <div id="pagination"  >
        </div>
        </center>

         <!--  config  delivered เขียวแสดงว่าชำระเงินพร้อมเข้าพัก
        .status.delivered {
            background-color: #86e49d;
            color: #006b21;
        }
        /* cancelled ยกเลิกการเข้าพัก */
        .status.cancelled {
            background-color: #d893a3;
            color: #b30021;
        }

        /*  รอการชำระเงิน pending หรือยังไม่ได้ยืนยัน */
        .status.pending {
            background-color: #ebc474;
        } -->

        <section class="table__body">
            <table>
                <thead>
                <tr> 
                        <th>เข้าพัก <span class="icon-arrow">&UpArrow;</span></th>
                        <th>ออก<span class="icon-arrow">&UpArrow;</span></th>
                        <th> Customer <span class="icon-arrow">&UpArrow;</span></th>
                        <th> ห้อง <span class="icon-arrow">&UpArrow;</span></th>
                        <th> ประเภท <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Amount <span class="icon-arrow">&UpArrow;</span></th>
                        <th> สถานะ <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td> 17/Dec/2023 </td>
                        <td> 18/Dec/2023 </td>
                        <td>  <img src="images/Zinzu Chan Lee.jpg" alt=""> 
                              <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">บัวขาว Ⓘ</rr></td>
                        <td> 101 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>


                    <tr>
                        <td> 18/Dec/2023 </td>
                        <td> 20/Dec/2023 </td>
                        <td>  <img src="images/Alex Gonley.jpg" alt=""> 
                        <t class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">จารย์แดงกีต้าร์ Ⓘ</t></td>
                        <td> 101 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status cancelled">ยกเลิก</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr>
                    <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> <tr>
                        <td> 20/Dec/2023 </td>
                        <td> 21/Dec/2023 </td>
                        <td>  <img src="images/Jeet Saru.jpg" alt=""> 
                        <rr class="status shipped" style="padding: 3%; padding-left: 8%; padding-right: 8%;">แมวเป้า Ⓘ</rr></td>
                        <td> 105 </td>
                        <td> ห้องเตียงเดี่ยว</td>
                        <td> <strong> ฿659 </strong></td>
                        <td>
                            <p class="status delivered">สำเร็จ</p>
                        </td>
                    </tr> 
                </tbody>
            </table>
        </section>
        
    
       
    </main>
  
         
    <script src="js/tb_script.js"></script>
</body>

</html>
