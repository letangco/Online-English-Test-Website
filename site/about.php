
    <link rel="stylesheet" href="./css/about2.css">
    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <head>
	<title>ABOUT</title>
</head>
    <div class='content'>
    <div class="info">
        <h4 class="title1" style="font-size: 20px;">WHY CHOOSE US?</h4>
        <hr>
        <div>
                <h5>Our misson</h5>
                <p>To be the experts in language assessment: delivering excellence and innovation.</p>
                <h5>Why choose us?</h5>
                <p>The certified english learning method for busy adults</p>
                <p>Flexible schedule, unlimited study time</p>
                <p>Guaranteed success or your money back</p>
                <p>The wall street english global community</p>
        </div>
        
    </div>
    <div class="title contact">
        <h4 class="title2" style="font-size: 20px;"">CONTACT US</h4>
        <hr>
        <div>
                <img src="./img/addr-icon.png" alt="address"><p>35 Le Thanh Ton Street, District 1, Ho Chi Minh City</p>
                <img src="./img/mail-icon.png" alt="mail"><p>adm@vnseameo.org</p>
                <img src="./img/phone-icon.png" alt="phone"><p>Tel: ( 84 -28 ) 3824 5618 (Ext. 101, 102, 122, 155)</p>
        </div> 
    </div>

    </div>
    <script>
    $(document).ready(function(){
        $('.title1').click(function(){
            $('.title1 ~ div').toggle(500,'swing');
        })
        
    })
</script>
