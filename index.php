<?php
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Ld-P1gUAAAAALhNMVJmYlNmX_7TWeeFflI3vsul',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }


    if ($_POST["submit"])
    {
        $res = post_captcha($_POST['g-recaptcha-response']);

        if (!$res['success']) 
        {
            // What happens when the CAPTCHA wasn't checked
            $error = '<br />Please make sure you have ticked the reCAPTCHA box';
        }

        if (!$_POST["name"])
        {
            $error .= "<br />Please enter your name";
        }

        if (!$_POST["email"])
        {
            $error .= "<br />Please enter your email address";
        }

        if (!$_POST["message"])
        {
            $error .= "<br />Please enter a message";
        }

        if ($_POST["email"] != "" AND !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
        {
            $error .= '<br />Please enter a valid email address';
        } 

        if ($error)
        {
            $result = '<div class = "error"><strong>There were error(s) in your form:</strong> '.$error.'</div>';
        }
        else
        {
            if (mail("beth@ejrgraphicdesign.co.uk", "Message from website", "Name: ".$_POST["name"]."
            
                email: ".$_POST["email"]."

                message: ".$_POST["message"]
            
            ))
            {
                $result = '<div class = "success"><strong>Thank you!</strong> I\'ll be in touch.</div>';
                $_POST["name"] = "";
                $_POST["email"] = "";
                $_POST["message"] = "";
            }
            else
            {
                $result = '<div class = "error">Sorry, there was an error sending your message. Please try again later.</div>';
            }

        }
    }
    
    

/*
        $emailTo = "";
        $subject = "";
        $body = "";
        $headers = "";

        if (mail($emailTo, $subject, $body, $headers))
        {
            echo "Mail sent successfully!";
        }
        else
        {
            echo "Mail not sent!";
        }
*/
?>
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="shortcut icon" href="assets/icons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/icons/favicon.ico" type="image/x-icon">

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/main.js" defer></script>

    <title>EJR Design</title>
</head>

<body>

    <header>
        <div id="logo">
            <img style="width: 100%;" src="assets/images/logo.png" alt="logo">
        </div>
        <nav>
            <div id="hamburger-menu" style="background-image: url('/assets/icons/hamburger_icon.svg')"></div>
            <div class="nav-btn" onclick="gotoHome()"><h2>HOME</h2></div>
            <div class="nav-btn" onclick="gotoAbout()"><h2>ABOUT</h2></div>
            <div class="nav-btn" onclick="gotoGallery()"><h2>GALLERY</h2></div>
            <div class="nav-btn" onclick="gotoContact()"><h2>CONTACT</h2></div>
        </nav>
    </header>

    <section id="home" class="card">
        
        <div id="slideshow">
            <img class="mySlides animate-fade" id="slide1" src="assets/images/home-images/books.jpg">
            <img class="mySlides animate-fade" id="slide2" src="assets/images/home-images/helpyoself.jpg">
            <img class="mySlides animate-fade" id="slide3" src="assets/images/home-images/ini.jpg">
            <img class="mySlides animate-fade" id="slide4" src="assets/images/home-images/pastaaa.jpg">
            <img class="mySlides animate-fade" id="slide5" src="assets/images/home-images/watermark.jpg">
        </div>
    </section>
    <script src="assets/js/slideshow.js"></script>

    <section id="about" class="card">
        <div id="about-text">
            <h1 id="about-heading">HELLO</h1>
            <p>My formal name is Elizabeth but formal names are only good for use by angry 
                parents so please, call me Beth! I am a graphic designer currently based in 
                the beautiful city of Carlisle.</p>
            <p>My current design focus is in the area of promotional design (with particular 
                interest in promoting a cause or campaign) but I do try to incorporate design 
                into my everyday life as much as possible. Whether it be screen printing onto 
                T-shirts and bags as gifts or creating posters and leaflets for church.</p>
            <p>Do you need a design solution? Please take a look at my gallery to see my past 
                works of posters, cover images, leaflets, book jacket designs, magazine 
                spreads and more! You can also check out my Facebook feed to see what current 
                projects I am working on.</p>
        </div>
        <div id="about-img">
            <img src="assets/images/about-img.jpg">
        </div>
        <div class="clear"></div>
    </section>

    <section id="gallery" class="card">
        <div id="gallery-container">
            <h1 id="gallery-heading">GALLERY</h1>
            <div class="gallery-img-container">
                <img class="gallery-img" onclick="openModal(this)" src="assets/images/gallery/caving events poster.jpg" alt="Caving Events Poster">
                <div class="zoom-icon"></div>
            </div>
            <div class="gallery-img-container">
                <img class="gallery-img" onclick="openModal(this)" src="assets/images/gallery/stand.jpg" alt="">
                <div class="zoom-icon"></div>
            </div>
            <div class="gallery-img-container">
                <img class="gallery-img" onclick="openModal(this)" src="assets/images/gallery/wednesday at one.jpg" alt="">
                <div class="zoom-icon"></div>
            </div>
            <div class="gallery-img-container">
                <a href=""><img class="gallery-img" src="assets/images/gallery/bus stop.jpg" alt=""></a>
                <h3 class="cta-text">VIEW PROJECT</h3>
            </div>
            <div class="gallery-img-container">
                <a href="ll-portfolio.html" target="_blank"><img class="gallery-img" src="assets/images/lesson-learned/21.jpg" alt=""></a>
                <h3 class="cta-text">VIEW PROJECT</h3>
            </div>
            <div class="gallery-img-container">
                <img class="gallery-img" onclick="openModal(this)" src="assets/images/home-images/helpyoself.jpg" alt="">
                <div class="zoom-icon"></div>
            </div>
            <div class="gallery-img-container">
                <a href="banner-portfolio.html" target="_blank"><img class="gallery-img" src="assets/images/banner/Anchor Mock Up.jpg" alt=""></a>
                <h3 class="cta-text">VIEW PROJECT</h3>
            </div>
            <div class="gallery-img-container">
                <a href="wm-portfolio.html" target="_blank"><img class="gallery-img" src="assets/images/watermark/watermark.jpg" alt=""></a>
                <h3 class="cta-text">VIEW PROJECT</h3>
            </div>
            <div class="gallery-img-container">
                <a href="sh-portfolio.html" target="_blank"><img class="gallery-img" src="assets/images/gallery/front of light2.jpg" alt=""></a>
                <h3 class="cta-text">VIEW PROJECT</h3>
            </div>
            <div class="gallery-img-container">
                <a href="book-portfolio.html" target="_blank"><img class="gallery-img" src="assets/images/books/1_00.jpg" alt=""></a>
                <h3 class="cta-text">VIEW PROJECT</h3>
            </div>
            <div class="gallery-img-container">
                <img class="gallery-img" onclick="openModal(this)" src="assets/images/home-images/pastaaa.jpg" alt="">
                <div class="zoom-icon"></div>
            </div>
            <div class="gallery-img-container">
                <a href="dt-portfolio.html" target="_blank"><img class="gallery-img" src="assets/images/dogs-trust/4.jpg" alt=""></a>
                <h3 class="cta-text">VIEW PROJECT</h3>
            </div>
        </div>
        <!-- The Modal -->
        <div id="modal">

            <!-- The Close Button -->
            <span id="close-btn" onclick="closeModal()">&times;</span>
        
            <!-- Modal Content (The Image) -->
            <img id="modal-img">
        
            <!-- Modal Caption (Image Text) -->
            <div id="caption"></div>
        </div>
    </section>

    <section id="contact" class="card">
        <h1>GET IN TOUCH!</h1>
        <?php echo $result; ?>
        <form action="#contact" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your name here" value = "<?php echo $_POST["name"]; ?>">

            <label for="email">Email Address:</label>
            <input type="text" id="email" name="email" placeholder="Your email address here" value = "<?php echo $_POST["email"]; ?>">

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" placeholder="Your message here" value = "<?php echo $_POST["message"]; ?>"></textarea>

            <div class="g-recaptcha" data-sitekey="6Ld-P1gUAAAAAJ2yzb_XM1iBKl0rd5X5y1vYhAJH"></div>

            <input type="submit" name="submit" value="Send">
        </form>
    </section>

</body>
</html>