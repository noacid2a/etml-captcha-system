
<form name="form" method="post" action="mailto:yourmail@mail.com">
    <div>
        <label for="subject">Objet</label><br/>
        <input type="text" placeholder="Subject" name="subject" required />
    </div><br/>
    <div>
        <label for="lname">Message</label><br/>
        <textarea placeholder="Message" name="message" required></textarea>
    </div><br/>
    <div>
    <label>Entrez le captcha: </label>
    <!-- img captcha ici-->
    <input type="text" name="captcha" required/>
    </div>
    <div>
        <button type="submit">Envoyer</button>
    </div>
</form>