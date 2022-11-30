<html>
    <head>
        <script src="resources/js/script.js"></script>
        <title>Captcha Form</title>
    </head>
<body>
<h1>Test Captcha</h1>
    <form name="form" method="post" action="">
        <div>
            <label for="subject">Objet</label><br />
            <input type="text" placeholder="Subject" name="subject" required />
        </div><br/>
        <div>
            <label for="lname">Message</label><br />
            <textarea placeholder="Message" name="message" required></textarea>
        </div><br/>
        <div>
        <label>Entrez le captcha: </label><br />
        <p><img src="genCaptcha.php?newCaptcha=<?= rand(); ?>" id="captchaImg" ></p>

        <label for="captcha">Rafraichir le captcha - <a href="javascript: Refresh(); ">cliquez ici</a></label><br />
            <input type="text" name="captcha" required/>
        </div><br />
        <div>
        <input type="submit" name="submit" value="Submit">
        </div>
    </form>
</body>
</html>