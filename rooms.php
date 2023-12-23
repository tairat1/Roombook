<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arch hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200&family=Roboto+Mono&display=swap" rel="stylesheet">
    

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

  
    <!-- JS Bootstrap, Popper.js, และ jQuery -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Theme Style --> 
    <link rel="stylesheet" href="css/style1.css">
  </head>
  <body>
  <?php

    require 'mysql/config.php';
    $bkin = (isset($_GET['bkin'])) ? $_GET['bkin'] : date("j-F-Y");
    $bkout = (isset($_GET['bkout'])) ? $_GET['bkout'] : date("j-F-Y",strtotime("+1 day"));
    $bkcust = (isset($_GET['bkcust'])) ? $_GET['bkcust'] : "";
    $bktel = (isset($_GET['bktel'])) ? $_GET['bktel'] : "";
    $type_room1 = (int) (isset($_GET['type_room1'])) ? $_GET['type_room1'] : 1;
    $type_room2 = (int) (isset($_GET['type_room2'])) ? $_GET['type_room2'] : 2;
    $type_room3 = (int) (isset($_GET['type_room3'])) ? $_GET['type_room3'] : 3;
    $type_room4 = (int) (isset($_GET['type_room4'])) ? $_GET['type_room4'] : 4;
    $days = (int) date_diff(date_create($bkin), date_create($bkout))->format('%R%a');

    if ($days < 1) {
       //ถ้าเลือกวันที่เช็คเอาท์น้อยกว่า 1 วันกลับไปหน้าแรก !!index
        echo "<script>window.location.replace('index.php');</script>";
        exit();
    }

    if (isset($_GET['rmid'])) {
        $rmid = $_GET['rmid'];
        $bkstatus = 0;
        require 'books_status.php';
    }
     
    // เงื่อนไขแสดงประเภทห้องพัก  ถ้าตัวแปร $type_room1 == 1    
    // ประกาศตัวแปร $num_room1 ในเงื่อนไข และให้เก็บค่า ของ Sql ไว้  $num_room1 = " AND roomtype.rmtype='$type_room1'";
    // 1:standard  2:superior 3:Delux 4:Family
    if ($type_room1 == 1) {
        $num_room1 = " AND roomtype.rmtype='$type_room1'";}
      else {$num_room1 = "";}

    if ($type_room2 == 2) {
          $num_room2 = " AND roomtype.rmtype='$type_room2'";}
      else {$num_room2 = "";}

    if ($type_room3 == 3) {
          $num_room3 = " AND roomtype.rmtype='$type_room3'";}
      else {$num_room3 = "";}

      if ($type_room4 == 4) {
        $num_room4 = " AND roomtype.rmtype='$type_room4'";}
        else {$num_room4 = "";}

    /* เก็บเงื่อนไขนี้ไว้ประยุกต์หน้า admin
    if ($q > 0) {
        $kw = " AND roomtype.rmtype='$q'";
    } else {
        $kw = "";
    }
    */

    ?>
    
    <!-- start heade  -->
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.html">ARCH HOTEL</a></div>
          <div class="col-6 col-lg-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <!-- เมนู-->
            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="rooms.html">Rooms</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="events.html">Events</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="reservation.html">Reservation</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Rooms</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="index.html">Home</a></li>
              <li>&bullet;</li>
              <li>Rooms</li>
            </ul>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->

    <?php 
    //แปลงรูปแบบวันที่
    $Date_bkin = date("j F Y", strtotime($bkin));
    $Date_bkout = date("j F Y", strtotime($bkout));
    ?>

    <section class="section pb-4">
      <div class="container">
       
        <div class="row check-availabilty" id="next">
          <div class="block-32" data-aos="fade-up" data-aos-offset="-200">
            <form action="rooms.php" method="GET">
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-4">
                  <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input  type="button"  id="checkin_date" class="form-control" name="bkin" 
                      value="<?php echo $Date_bkin; ?>" required>
                      <div id="dateError" style="color: red;"></div>
                  </div>
                </div>
          
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-4">
                  <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="button" id="checkout_date" class="form-control" name="bkout" value="<?php echo $Date_bkout; ?>" required>
                  </div>
                </div>
                <!-- Start Adults And Children 
                <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="adults" class="font-weight-bold text-black">Adults</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="adults" class="form-control">
                          <option value="">1</option>
                          <option value="">2</option>
                          <option value="">3</option>
                          <option value="">4+</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="children" class="font-weight-bold text-black">Children</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="children" class="form-control">
                          <option value="">1</option>
                          <option value="">2</option>
                          <option value="">3</option>
                          <option value="">4+</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                 End Adults And Children -->
                <div class="col-md-6 col-lg-3 align-self-end">
                  <button type="submit" class="btn btn-primary btn-block text-white">Check Availabilty</button>
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>
    </section>

    

    <?php 
              //แปลงรูปแบบวันที่ให้ตรงกับฐานข้อมูล 
              $formattedDatebkin = date("Y-m-d", strtotime($bkin));
              $formattedDatebkout = date("Y-m-d", strtotime($bkout));
              ?>

              <?php 
              //แปลงรูปแบบวันที่ภาษาไทย
              $THDatebkin = date("Y-m-d", strtotime($bkin));
              $THDatebkout = date("Y-m-d", strtotime($bkout));
              ?>

    <?php for ($modalNumber = 1; $modalNumber <= 4; $modalNumber++) { ?>
    <div class="container">
        <div class="modal fade" id="exampleModal<?php echo $modalNumber; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $modalNumber; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 10px;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel<?php echo $modalNumber; ?>">Booking Room</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- form -->
                      <form action="books_insert.php" method="POST"> 
                        <!-- ซ่อนช่องกรอกข้อมูลไว้ ส่งค่าไปยัง ฟอร์อม books_insert.php-->
                        <label class="col-form-label">เข้า</label>
                        <label  class="col-form-label"><?php echo $bkin;?></label>
                        <label  class="col-form-label">ออก</label>
                        <label  class="col-form-label"><?php echo $bkout;?></label>
                        <input type="hidden"   name="bkin" 
                        value="<?php echo $formattedDatebkin;?>">
                        <input type="hidden"  name="bkout" 
                        value="<?php echo  $formattedDatebkout; ?>">
                        <!-- ซ่อนช่องกรอกข้อมูลไว้-->

                        <div class="row justify-content-center" >
                        <div class="mb-2 p-2">
                          <label for="recipient-name" class="col-form-label">FulltName:</label>
                          <!-- bkcust : ชื่อผู้พัก name="bkcust" -->
                          <input type="text" class="form-control" id="recipient-name<?php echo $modalNumber; ?>" name="bkcust<?php echo $modalNumber; ?>" value="<?php echo $bkcust; ?>" required>
                          </div>
                        <div class="mb-2 p-2">
                        <label for="recipient-name" class="col-form-label">LastNane:</label>
                        <input type="text" class="form-control" id="recipient-name" >
                        </div>
                        </div>
                        <!-- อย่าลืมเปลี่ยนข้อมูล -->
                        <div class="row justify-content-center" >
                        <div class="mb-2 p-2">
                          <!-- Phone : เบอร์  name="bktel" -->
                          <label for="recipient-name" class="col-form-label">Phone:</label>
                          <input type="text" class="form-control" id="recipient-name<?php echo $modalNumber; ?>" 
                                 name="bktel<?php echo $modalNumber; ?>" value="<?php echo $bkcust; ?>" required>
                          </div>
                        <div class="mb-2 p-2">
                        <label for="recipient-name" class="col-form-label">Rooms:</label>
                        <select class="form-control"  name="rmid" required>
                        <option selected value="<?php echo $row['rmid']; ?>">เลือกห้อง</option>
                        <?php
                        
                        /* ต้นแบบแสดงทุกห้อง
                        $sql = "SELECT * FROM rooms LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype "
                        . "WHERE rmid NOT IN (SELECT rmid FROM books WHERE bkstatus > 0 "
                        . "AND ((bkin >= '$bkin' AND bkin < '$bkout') OR (bkin < '$bkin' AND bkout > '$bkin')))"
                        . $kw;
                        $result = $conn->query($sql); */
                      // (กำหนด ตัวแปร num_room จาก ลูป ให้ตรงกับคำสั่ง SQL  )
                           if($modalNumber == 1) {
                              $num_room = $num_room1;}
                        elseif($modalNumber == 2){
                               $num_room = $num_room2;}
                        elseif($modalNumber == 3){ 
                               $num_room = $num_room3;}
                        elseif($modalNumber == 4){
                               $num_room = $num_room4;};

                        // SQL ชุดนี้แสดงเฉพาะ ห้องเดี่ยว และส่งค่าห้องเดี่ยวไปบันทึกข้อมูลลง DB
                        $sql = "SELECT * FROM rooms LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype "
                                . "WHERE rmid NOT IN (SELECT rmid FROM books WHERE bkstatus > 0 "
                                . "AND ((bkin >= '$formattedDatebkin' AND bkin < '$formattedDatebkout') OR (bkin < '$formattedDatebkin' AND bkout > '$formattedDatebkin'))) "
                                . $num_room;
                        $result = $conn->query($sql);
                        $num = 1;
                        $roomprice =0;
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                          $roomprice ++
                            ?>
                              <option value="<?php echo $row['rmid']; ?>">
                                <?php echo $num++; ?>&nbsp;
                                <?php echo $row['rmid']; ?>&nbsp;
                                <?php echo $row['tpname']; ?>&nbsp;
                                <?php echo number_format($row['rmprice']*$roomprice,0);?>
                              </option>
                        <?php } ?>
                      </select><br />
                        </div>
                        </div>

                        <div class="mb-3 p-1">
                          <label for="message-text" class="col-form-label">Message:</label>
                          <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="submit<?php echo $modalNumber; ?>">Send message</button>
                    </div>  
                    <!-- EnD -->
                    </div>
                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End Modal -->
        <?php } ?>

    

    <section class="section">
      <div class="container">
        
        <div class="row">
          <div class="col-md-6 col-lg-6 mb-5" data-aos="fade-up">
            <a href="#" class="room">
              <figure class="img-wrap">
                <img src="images/img_1.jpg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Standard Room</h2>
                <span class="text-uppercase letter-spacing-1">600฿ / per night</span>
              </div>
            </a>
            <center>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">BookNow</button>
            </center>
          </div>

          <div class="col-md-6 col-lg-6 mb-5" data-aos="fade-up">
            <a href="#" class="room">
              <figure class="img-wrap">
                <img src="images/img_2.jpg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Superior Room</h2>
                <span class="text-uppercase letter-spacing-1">800฿ / per night</span>
              </div>
            </a>
            <center>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">BookNow</button>
            </center>
          </div>

          <div class="col-md-6 col-lg-6 mb-5" data-aos="fade-up">
            <a href="#" class="room">
              <figure class="img-wrap">
                <img src="images/img_3.jpg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Delux Room</h2>
                <span class="text-uppercase letter-spacing-1">800฿ / per night</span>
              </div>
            </a>
            <center>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">BookNow</button>
            </center>
          </div>

          <div class="col-md-6 col-lg-6 mb-5" data-aos="fade-up">
            <a href="#" class="room">
              <figure class="img-wrap">
                <img src="images/img_1.jpg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Family Room</h2>
                <span class="text-uppercase letter-spacing-1">1900฿ / per night</span>
              </div>
            </a>
            <center>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal4">BookNow</button>
            </center>
          </div>

          <!-- start
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
            <a href="#" class="room">
              <figure class="img-wrap">
                <img src="images/img_2.jpg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Family Room</h2>
                <span class="text-uppercase letter-spacing-1">120$ / per night</span>
              </div>
            </a>
          </div>
          End -->

          <!-- start
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
            <a href="#" class="room">
              <figure class="img-wrap">
                <img src="images/img_3.jpg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Presidential Room</h2>
                <span class="text-uppercase letter-spacing-1">250$ / per night</span>
              </div>
            </a>
          </div>
           End -->

        </div>
      </div>
    </section>
    
    <section class="section bg-light">

      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade">Great Offers</h2>
            <p data-aos="fade">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>
      
        <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
          <a href="#" class="image d-block bg-image-2" style="background-image: url('images/img_1.jpg');"></a>
          <div class="text">
            <span class="d-block mb-4"><span class="display-4 text-primary">1900฿</span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4">Family Room</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
          </div>
        </div>
        <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="200">
          <a href="#" class="image d-block bg-image-2 order-2" style="background-image: url('images/img_2.jpg');"></a>
          <div class="text order-1">
            <span class="d-block mb-4"><span class="display-4 text-primary">800฿</span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4">Delux Room</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
          </div>
        </div>

      </div>
    </section>

    <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
      <div class="container" >
        <div class="row align-items-center">
          <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
            <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
          </div>
          <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
            <a href="reservation.html" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
          </div>
        </div>
      </div>
    </section>
    
    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">The Rooms &amp; Suites</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Restaurant</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198 West 99th Street, <br> Grand Siam Inn 9999</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+66) 123 4567</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@sone.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Sign up for our newsletter</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Grand Siam Inn . <i class="icon-heart-o" aria-hidden="true"></i> By <a href="https://colorlib.com" target="_blank" >S-ONE</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-vimeo"></span></a>
          </p>
        </div>
      </div>
    </footer>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 
    <script src="js/main.js"></script>
    <script>
            document.getElementById('type_room1').value = "<?php echo $type_room1; ?>";
            document.getElementById('type_room2').value = "<?php echo $type_room2; ?>";
            document.getElementById('type_room3').value = "<?php echo $type_room3; ?>";
            document.getElementById('type_room4').value = "<?php echo $type_room4; ?>";
        </script>
  </body>
</html>