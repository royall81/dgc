<div class="container container-md  mt-5 mb-5 ">
    <h1 class="  mb-5"><?= constant('CONTACT_TITLE'); ?></h1>
    <p>
        <?= constant('CONTACT_P1'); ?>
    </p>
</div>
<div class="container container-md mt-5 mb-5">
    <form action="/includes/handle-contact-form.php?redirect=<?= constant('NAV_LINK_CONTACT_THANKS_URL'); ?>" method="post" id="contact-form">

        <div class="form-group">
            <label><?= constant('CONTACT_FORM_NAME'); ?></label>
            <input type="text" id="contact-name" name="contact-name" class="form-control" required>
        </div>
        <div class="form-group">
            <label><?= constant('CONTACT_FORM_EMAIL'); ?></label>
            <input type="text" id="contact-email" name="contact-email" class="form-control" required>
        </div>
        <div class="form-group">
            <label><?= constant('CONTACT_FORM_PHONE'); ?></label>
            <input type="text" id="contact-phone" name="contact-phone" class="form-control">
        </div>
        <div class="form-group">
            <label><?= constant('CONTACT_FORM_SUBJECT'); ?></label>
            <input type="text" id="contact-subject" name="contact-subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label><?= constant('CONTACT_FORM_MESSAGE'); ?></label>
            <textarea id="contact-message" name="contact-message" class="form-control" rows="5" required></textarea>
        </div>

        <input type="hidden" name="recaptcha_response" id="recaptchaResponse" value="6LfYZQEVAAAAAGJEbybX-KzoBAoKIcqoAfeCQepG">

        <div style="visibility: hidden">
            <input name="check" id="check" type="check" >
        </div>
        <!-- <input type="submit" id="contact-submit" name="contact-submit" class="btn btn-lg"  style="background-color: #83624e; border: none;color: white;" value="<?= constant('CONTACT_FORM_SUBMIT'); ?>"> -->
        <button class="g-recaptcha btn btn-lg" style="background-color: #83624e; border: none;color: white;" value="<?= constant('CONTACT_FORM_SUBMIT'); ?>"
        data-sitekey="6LfYZQEVAAAAAGJEbybX-KzoBAoKIcqoAfeCQepG"
        data-callback='onSubmit'
        data-action='submit'>Send</button>

    </form>
</div>
