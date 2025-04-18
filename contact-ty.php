<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="shortcut icon" type="icon" href="img/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a168cf4844.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">

</head>
<body style="background: url(img/wallpaper.jpeg) 100% no-repeat">

 <!--Navigation Bar -->
    <header class="header">
        <a href="index.html" class="logo"><img src="img/logo.png" alt="Yamiraku" height="80px weight 100px"></a>

        <nav class="navbar">
            <a href="index.html" >Home</a>
            <a href="contact.html" class="active">Contact</a>
            <a href="career.php">Career</a>
            <a href="login.php">Login</a>

        </nav> 

        
    </section></header><br><br><br><br><br><br>
    
   
    <!--Contact Form -->
    <div class="content">
    
        <div class="container">
          <div class="contact-row justify-content-center">
            <div class="col-md-10">
              
    
              <div class="row justify-content-center">
                <div class="col-md-6">
                  
                <h3 class="heading mb-4" style="color: white; font-size: 45px;">Send Your Inquiry!</h3>
                 
                 <img src="img/cs.png" width="500px" height="500px">

                </div>
                
                <div class="col-md-6 pt-1">
                  
                  <form action="https://formsubmit.co/calvenc0914@gmail.com" method="POST" class="mb-5"  id="contactForm" name="contactForm">
                    <div class="row">
                      <div class="col-md-12 form-group" style="padding-bottom: 20px;">
                        <label for="exampleInputName" style="color: white; font-size: 25px;">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Your name" style="width: 550px;"  required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 form-group" style="padding-bottom: 20px;">
                        <label for="exampleInputEmail1" style="color: white; font-size: 25px;">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" style="width: 550px;"  required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 form-group" style="padding-bottom: 20px;">
                        <label for="exampleInputSubject" style="color: white; font-size: 25px;">Email Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" style="width: 550px;"  required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 form-group" style="padding-bottom: 20px;">
                        <label for="exampleInputMessage" style="color: white; font-size: 25px;">Message</label>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="Write your message" style="width: 550px; height: 140px;" required></textarea>
                      </div>
                    </div>  
                    <div class="row">
                      <input type="hidden" name="_next" value="http://localhost/fyp/contact.html">
                      <div class="col-12">
                        <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                      <span class="submitting"></span>
                      </div>
                    </div>
                  </form>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
    
      </div>

      <!-- Go up Button-->
<a href="#" class="to-top">
    <i class="fa-solid fa-arrow-up"></i>
</a>
        

        
    <!--Footer -->
    <footer>
        <p>Yamiraku Music Studio</p>
        <p><i>Where words fail, music speaks.</i></p>
        <div class="foot-sci">
          <a href="https://www.facebook.com"><i class='bx bxl-facebook-circle'></i></a>
          <a href="https://www.instagram.com"><i class='bx bxl-instagram'></i></a>
          <a href="https://twitter.com"><i class='bx bxl-twitter'></i></a>
        </div>
        <p style="color: white;">Yamiraku Music Studio, Copyright © 2023</p>
    
    </footer>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
        <script>
            


             //nav scroll animation
 const body =document.body;
 let lastScroll = 0;
 
 window.addEventListener('scroll',() =>{
     const currentScroll = window.pageYOffset
 
     if (currentScroll <= 0){
         body.classList.remove("scroll-up")
     }
 
     if(currentScroll > lastScroll && !body.classList.contains("scroll-down")){
         body.classList.remove("scroll-up")
         body.classList.add("scroll-down")
     }
 
     if(currentScroll < lastScroll && body.classList.contains("scroll-down")){
         body.classList.remove("scroll-down")
         body.classList.add("scroll-up")
     }
 
     lastScroll = currentScroll;
 })

 //transition css

 const sections = document.querySelectorAll("section");

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150; // Removed the semicolon and fixed the offset calculation
        let height = sec.offsetHeight;

        if (top >= offset && top < offset + height) {
            sec.classList.add('show-animate');
        } 
    });
};

//to-top button

const toTop = document.querySelector(".to-top");

window.addEventListener("scroll", () => {
    if (window.pageYOffset > 100) {
        toTop.classList.add("active");
    } else {
        toTop.classList.remove("active");
    }


})


window.onload = function() {
            // Display the alert message
            alert("Thank you for contacting us. We will reach out to you shortly.");
            
            // Redirect back to the same page
            window.location.href = 'contact.html'; // Update with your page URL
        };
        </script>   
    
</body>
</html>