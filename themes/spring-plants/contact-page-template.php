<?php
/**
 * Template name: Contact Page
 */
?>
 
<?php get_header(); ?>

 <div class="row">
     <div class="col-md-6">
        <section id="contact-form-section">
            <form class="needs-validation" novalidate>
                <div id="name-form-group" class="form-group">
                    <label for="name-input">Your Name</label> 
                    <input id="name-input" name="name-input" required="required" class="form-control" type="text" required>
                    <div class="invalid-feedback">
                        Please choose a real name.
                    </div>
                </div>
                <div class="form-group">
                    <label for="email-input">Your Email</label> 
                    <input id="email-input" name="email-input" required="required" class="form-control" type="email">
                </div>
                <div class="form-group">
                    <label for="subject-input">Subject</label> 
                    <div>
                    <select id="subject-input" name="subject-input" required="required" class="custom-select">
                        <option value="General enquiry">General enquiry</option>
                        <option value="Product enquiry">Product enquiry</option>
                        <option value="Order support">Order support</option>
                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message-input">Message</label> 
                    <textarea id="message-input" name="message-input" cols="40" rows="5" required="required" class="form-control"></textarea>
                </div> 
                <div class="form-group">
                    <label for="file-input">Image Upload (optional)</label>
                    <input type="file" class="form-control-file" id="file-input" multiple>
                    <small id="file-help-text" name="file-input" class="form-text text-muted">JPG, PNG image upload. File size(s) must not exceed 25mb.</small>
                </div>
                <div class="form-group">
                    <div id="recaptcha-captcha" class="g-recaptcha" data-sitekey="6LedE1gUAAAAAME2wxOJDtu2yCw56OKt76Yqwsvn"></div>
                </div>
                <div class="form-group">
                    <button id="contact-form-submit" name="submit" type="submit" class="btn btn-primary" disabled>Submit</button>
                </div>
            </form>
        </section>
    </div>
    <div class="col-md-6">
        <section id="business-contact-section">
            <?php while ( have_posts() ) : the_post(); ?>
                <p><i class="far fa-envelope"></i><span style="padding-left: 10px;"> <?php echo get_post_meta(get_the_ID(), 'Email Address', true); ?>  </span></p>
                <p><i class="fas fa-map-marker"></i><span style="padding-left: 10px;"> <?php echo get_post_meta(get_the_ID(), 'Business Address', true); ?> </span></p>
            <?php endwhile; ?>
        </section>
    </div>
</div>

<?php get_footer();?>