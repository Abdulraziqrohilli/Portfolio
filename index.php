<?php
    require("db_files/connection.php");

    $sql = "SELECT * FROM user WHERE id = 1";
    $result = $conn->query($sql);

    $sql2 = "SELECT * FROM skills WHERE user_id = 1";
    $result2 = $conn->query($sql2);

    $sql3 = "SELECT * FROM services WHERE user_id = 1";
    $result3=$conn->query($sql3);

    $sql4 = "SELECT * FROM portfolio WHERE user_id = 1";
    $result4=$conn->query($sql4);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();            
    } else {
        echo "0 results";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assest/css/bootstrap.min.css">
    <link rel="stylesheet" href="assest/font-awesome/all.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Abdulraziq_Rohilli_PORTFOLIO</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Start of sidbar -->
            <div class="col-3 hide">
                <div class="sidbar">
                    <div>
                        <img class="profile" src="assest/images/profile.jpg"  alt="profile">    
                    </div>
                    <div>
                        <ul style="list-style: none;" id="menu">
                            <li><a href="#home"><span><i class="fa-solid fa-house-user" style="margin-right: 12px;"></i>HOME</span></a></li>
                            <li><a href="#about_me"><span><i class="fa-solid fa-user" style="margin-right: 12px;"></i>ABOUT</span></a></li>
                            <li><a href="#services"><span><i class="fa-solid fa-list" style="margin-right: 12px;"></i>SERVICES</span></a></li>
                            <li><a href="#porfolio"><span><i class="fa-solid fa-briefcase" style="margin-right: 12px;"></i>PORTFOLIO</span></a></li>
                            <li><a href="blog/index.html"><span><i class="fa-solid fa-blog" style="margin-right: 12px;"></i>BLOG</span></a></li>
                            <li><a href="#contact"><span><i class="fa-solid fa-address-book" style="margin-right: 12px;"></i>CONTACT</span></a></li>
                        </ul>      
                    </div>
                </div>      
            </div>
            <!-- End of sidbar -->

            <!-- Start of content -->
            <div class="col-9">

            <!-- Start of home section -->
                <div class="login"><a href="Login/index.php" style=text-decoration:none><span style="color: #fec544;"> Login</span></a></div> 
                <section id="home">   
                    <div class="container" style="padding-left: 0px;">
                        <h3>I 'm <span><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></span><br><span class="name"></span></h3>
                        <div class="clearfix"><img src="assest/images/<?php echo $user['img'] ?>" height="200" width="200" alt="picture"><br> 
                        </span><?php echo $user['description1'];?><span></div>
                        <button><a href="#contact">Hire me!</a></button>
                        <div class="st-social-info pt-5">
                          <div class="st-social-link">
                            <a href="" class="st-social-btn">
                              <span class="st-social-icon"><i class="fa-brands fa-facebook"></i></span>
                              <span class="st-icon-name">Facebook</span>
                            </a>
                            <a href="#" class="st-social-btn">
                              <span class="st-social-icon"><i class="fa-brands fa-pinterest"></i></span>
                              <span class="st-icon-name">Pinterst</span>
                            </a>
                            <a href="#" class="st-social-btn">
                              <span class="st-social-icon"><i class="fa-brands fa-instagram"></i></span>
                              <span class="st-icon-name">Instagram</span>
                            </a>
                            <a href="#" class="st-social-btn">
                              <span class="st-social-icon"><i class="fab fa-linkedin"></i></span>
                              <span class="st-icon-name">LinkedIn</span>
                            </a>
                          </div>
                    </div>
                </section>
            <!-- End of home section -->

            <!-- Start of about section -->
                <section id="about_me">
                    <div>
                        <div class="row">
                            <h1>About me</h1>
                            <h3><?php echo $user['skills'];?></h3>
                            <div class="text">
                              <?php echo $user['description2'];?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <h6><b >Birthday : </b> <?php echo $user['dob']; ?></h6> <br>
                                <h6><b >Website : </b><a href="#" style="text-decoration: none;  color: #a9adb8;"><?php echo $user['website']; ?></a></h6> <br>
                                <h6><b >Degree : </b><?php echo $user['degree']?></h6> <br>
                                <h6><b >City : </b><?php echo $user['city']?></h6> <br>
                                <button class="btn mt-lg-4" style="text-decoration: none;"><a href=""> Download CV </a></button>
                            </div>
                
                            <div class="col-4">
                                <h6><b>Age : </b><?php echo date("Y")-2004?></h6> <br>
                                <h6><b>Email : </b><?php echo $user['email']?></h6> <br>
                                <h6><b>Phone : </b><?php echo $user['phone']?></h6> <br>
                                <h6><b>Freelance : </b><?php if($user['freelance'] == 1) {echo "Available";} else {echo "Unavailable";}?></h6> <br>
                            </div>
                
                            <div class="col-4">

                            <?php while($skill = $result2->fetch_assoc()){  ?>
                                <div>
                                    <span><?php echo $skill['skill_name']; ?></span>
                                    <span class="percent"><?php echo $skill['skill_number']; ?></span>                    
                                </div>
                                <div class="progress" style="height: 8px;">
                                  <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:<?php echo $skill['skill_number']; ?>;"></div>
                                </div>
                                  <br>
                            <?php } ?>

                                </div>
                            </div>   
                    </div>
                </section>
            <!-- End of about section -->

            <!-- Start of services section -->
                <section id="services">
                  <div class="row">
                    <h1>services</h1>
                  </div>
                  <div class="row">
                  <?php while($services = $result3->fetch_assoc()){  ?>  
                    <div class="col-4">
                      <div class="card">
                      <div><i class="<?php echo $services['icon'];?>"></i></div>
                      <div class="card-body">
                        <h3 class="card-title"><?php echo $services['title']?></h3>
                        <div class="card-text"><?php echo $services['description']?></div>
                      </div>
                      </div>
                    </div>
                    <?php }?>
                </section>
            <!-- End of services section -->

            <!-- Start of portfolio section -->
                <section id="porfolio">
                  <div class="row">
                    <h1 class="port">Portfolio</h1>
                  </div>
                  <h3 class="p-projects">My last projects :</h3>
                  <div class="row">
                  <?php while($portfolio = $result4->fetch_assoc()){  ?>  
                    <div class="col-4">
                        <div class="card">
                          <img class="card-img-top" src="assest/images/portfolio/<?php echo $portfolio['img']; ?>" alt="Card image" style="width:100%">
                          <div>
                            <a href="<?php echo $portfolio['link']; ?>" class="btn btn-primary stretched-link">See Projects</a>
                            </div>
                        </div>
                    </div>
                    <?php }?>    
                </section>
            <!-- Start of portfolio section -->

            <!-- Start of contact section -->
            <section id="contact">
                  <div class="row contact-title"><h1>Contact</h1></div>
                  <div class="row row-content">
                    <div class="col-lg-6">
                      <h3 class="st-contact-title">Just say Hello</h3>
                      <?php if(isset($_GET['emailSent'])){ echo '<h5 class="text-success">Email Sent</h5>'; } ?>
                      <?php if(isset($_GET['emailError'])){ echo '<h5 class="text-danger">Email Sending Error</h5>'; } ?>
                      <div id="st-alert" style="display: none;"></div>
                      <form action="sendEmail.php" method="POST" class="st-contact-form" id="contact-form">
                        <div class="st-form-field">
                          <input type="text" id="name" name="name" placeholder="Your Name" required="">
                        </div>
                        <div class="st-form-field">
                          <input type="text" id="email" name="email" placeholder="Your Email" required="">
                        </div>
                        <div class="st-form-field">
                          <input type="text" id="subject" name="subject" placeholder="Your Subject" required="">
                        </div>
                        <div class="st-form-field">
                          <textarea cols="30" rows="10" id="msg" name="msg" placeholder="Your Message" required=""></textarea>
                        </div>
                        <input class="st-btn st-style1 st-color1" type="submit" id="submit" name="submit" value="Send Message">
                      </form>
                    </div>
                    <div class="col-lg-6">
                      <div class="st-height-b0 st-height-lg-b40"></div>
                      <h3 class="st-contact-title">Contact Info</h3>
                      <div class="st-contact-text pt-4">
                       Contact me I will response as soon as possible!
                      </div>
                      <div class="st-contact-info-wrap">
                        <div class="st-single-contact-info">
                          <div class="st-single-info-details">
                            <div><h6><h3><b>Email </b></h3><?php echo $user['email']?></h6> <br></div> 
                          </div>
                        </div>
                        <div class="st-single-contact-info">
                          <div><h6><h3><b>Phone </b></h3><?php echo $user['phone']?></h6> <br></div> 
                        </div>
                        <div class="st-single-contact-info">
                          <div><h6><h3><b>Address </b></h3><?php echo $user['address']?></h6> <br></div> 
                        </div>
                        <div class="st-social-info">
                          <div class="st-social-text">Let's get connected!</div>
                          <div class="st-social-link">
                            <a href="#" class="st-social-btn">
                              <span class="st-social-icon"><i class="fa-brands fa-facebook"></i></span>
                              <span class="st-icon-name">Facebook</span>
                            </a>
                            <a href="#" class="st-social-btn">
                              <span class="st-social-icon"><i class="fa-brands fa-pinterest"></i></span>
                              <span class="st-icon-name">Pinterst</span>
                            </a>
                            <a href="#" class="st-social-btn">
                              <span class="st-social-icon"><i class="fa-brands fa-instagram"></i></span>
                              <span class="st-icon-name">Instagram</span>
                            </a>
                            <a href="#" class="st-social-btn">
                              <span class="st-social-icon"><i class="fab fa-linkedin"></i></span>
                              <span class="st-icon-name">LinkedIn</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
            <!-- End of contact section -->
            </div>
            <!-- End of content -->
        </div>
    </div>
    <script src="javascript/jquery-3.6.3.min.js"></script>
    <script src="javascript/typed.min.js"></script>
    <script src="assest/js/bootstrap.js"></script>
    <script src="assest/font-awesome/all.js"></script>
    <script src="javascript/index.js"></script>
</body>
</html>

<?php
    $conn->close();
?>