
<form name="form" method="post" action="mailto:yourmail@mail.com">
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
    <p><img src="captcha.php?rnd=<?= rand(); ?>" id='captchaImage'></p>

    <label for="captcha">Rafraichir le captcha - <a href="">cliquez ici</a></label><br />
        <input type="text" name="captcha" required/>
    </div><br />
    <div>
        <button type="submit">Envoyer</button>
    </div>
</form>