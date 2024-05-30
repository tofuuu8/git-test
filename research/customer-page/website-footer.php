<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.contact-copyright{
    width: 100%;
    height: 100%;
    background: #E16C69;
    display: flex;
    justify-content: space-evenly;
    padding: 2% 0;
    flex-direction: column;
    border-top: 1px solid black;
}
.contact-copyright .contact{
    display: flex;
    justify-content: space-evenly;
}
.contact-copyright .contact .contact-left{
    width: 40%;
}
.contact-copyright .contact .contact-left img{
    width: 200px;
}
.contact-copyright .contact .contact-center{
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
}
.contact-copyright .contact .contact-center h2{
    letter-spacing: 1px;
    margin-bottom: 8px;
}
.contact-copyright .contact .contact-center .accepted-payment{
    display: flex;
    gap: 10px;
    align-items: center;
}
.contact-copyright .contact .contact-center img{
    width: 70px;
    height: 40px;
}
.contact-copyright .contact .contact-right{
    width: 20%;
}
.contact-copyright .contact .contact-right-header h2{
    margin-bottom: 8px;
    letter-spacing: 1px;
}
.contact-copyright .contact .contact-contact{
    display: flex;
    flex-direction: column;
}
.contact-copyright .contact .contact-contact p{
    margin-bottom: 15px;
    display: flex;
}
.contact-copyright .contact .contact-contact p a{
    display: flex;
    text-decoration: none;
    align-items: center;
    justify-content: center;
    color: black;
    transition: .3s;
}
.contact-copyright .contact .contact-contact p a:hover{
    color: white;
}
.contact-copyright .contact .contact-contact p i{
    margin-right: 15px;
    color: black;
    width: 17px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    font-size: 18px;
}
.contact-copyright .contact .contact-contact p .fa-facebook{
    background: blue;
    color: white;
    border-radius: 50px;
}
.contact-copyright .contact .contact-contact p .fa-bag-shopping{
    color: orange;
}
.contact-copyright .copyright{
    margin-top: 40px;
    display: flex;
    gap: 50px;
    align-items: center;
    justify-content: flex-end;
    margin-right: 20%;
    position: relative;
}
.contact-copyright .copyright::before{
    position: absolute;
    content: '';
    width: 105%;
    height: 2px;
    border-radius: 50px;
    background: black;
    top: -10px;
    left: 115px;
}
.contact-copyright .copyright a{
    color: black;
    text-decoration: none;
    transition: .3s;
}
.contact-copyright .copyright a:hover{
    color: white;
}

</style>
<body>
<div class="contact-copyright" id="contact">

    <div class="contact">
        <div class="contact-left">
            <img src="images/logo.png" alt="">
        </div>


        <div class="contact-right">
                <div class="contact-right-header">
                    <h2>Connect with us</h2>
                </div>
                <div class="contact-contact">
                    <p><a href="https://www.facebook.com/PrintmySHIRT11?mibextid=ZbWKwL" target="_blank"><i class="fa-brands fa-facebook"></i>Print my Shirt</a></p>
                    <p><a href=""><i class="fa-solid fa-bag-shopping"></i>Print my Shirt</a></p>
                    <p><i class="fa-solid fa-phone"></i>0932-506-8019</p>
                    <p><i class="fa-solid fa-location-dot"></i>750 King Alexander St, Novaliches, Quezon City, 1116 Metro Manila</p>
                    <p><i class="fa-regular fa-envelope"></i>revilla562@gmail.com</p>
                </div>
        </div>
    </div>

    <div class="copyright">
        <p><a href="../condition-privacy.html#privacy-policy" target="_blank">Privacy Policy</a></p>
        <p><a href="../condition-privacy.html" target="_blank">Terms and Condition</a></p>
        <p>©️ Copyright 2024  Print my Shirt  All rights reserved</p>
    </div>
    
</div>
</body>
</html>