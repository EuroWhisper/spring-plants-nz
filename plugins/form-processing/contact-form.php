<?php
include_once('form.php');
include_once('validator.php');

class ContactForm extends Form {
    public $name;
    public $email;
    public $subject;
    public $message;
    public $response;
    public $files = [];
    public $attachments = [];


    public function processForm() {
        if ($this->uploadFiles() && $this->validateData()) {
            $this->sendEmail();
            $this->cleanUploads();
            return true;
        } else {
            return false;
        }
    }

    public function uploadFiles() {
        // Check which file form fields contain files and add them to $files array.
        for ($i = 0; $i < count($_FILES); $i++) {
            $this->files[] = $_FILES['image'.$i];
        }
        

        // If files have been uploaded, move them into the server's images directory.
        if (count($this->files) > 0) {
            // Upload files to the /uploads/contact-form-images directory on the server and list uploaded files as attachments.
            foreach ($this->files as $file) {
                $uploadFile = WP_CONTENT_DIR . '/uploads/contact-form-images/' . basename($file['name']);
                if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                    $this->attachments[] = $uploadFile;
                } else {
                    echo 'File upload failed, please contact us directly at lornapaulinenz@gmail.com';
                    $this->cleanUploads();
                    return false;
                }
            }
        }
        unset($file);
        return true;
    }

    /**
     * Deletes all files from the plugin's uploads folder.
     */
    public function cleanUploads() {
        unset($this->files);
        $files = array_diff(scandir(WP_CONTENT_DIR . '/uploads/contact-form-images/'), array('..','.'));

        if ($files) {
            foreach ($files as $file) {
                unlink(WP_CONTENT_DIR . '/uploads/contact-form-images/' . $file);
            }
            unset($file);
        }
    }
    
    public function validateData() {

        $this->name    = sanitize_text_field( $_POST["name-input"] );
        $this->message    = sanitize_text_field( $_POST["message-input"] );
		$this->email   = sanitize_email( $_POST["email-input"] );
        $this->subject = sanitize_text_field( $_POST["subject-input"] );
        $this->response = $_POST["g-recaptcha-response"];
        

        $valid = true;
        $errorMessage = '';

        // Validate captcha.
        if (Validator::validateCaptcha(Form::$privateCaptchaKey, $this->response) == false) {
            $errorMessage = $errorMessage . 'Captcha test failed. Please try again. <br>';
            $valid = false;
        }
        
        // Validate email address.
        if (Validator::validateEmail($this->email) == false)  {
            $errorMessage = $errorMessage . 'Please enter a real email address. <br>';
            $valid = false;
        }

        // Validate full name.
        if (Validator::validateTextField($this->name, 1, 5000) == false) {
            $errorMessage = $errorMessage . 'Please enter a real name. <br>';
            $valid = false;
        }

        // Validate subject.
        if (Validator::validateTextField($this->subject, 1, 500) == false) {
            $errorMessage = $errorMessage . 'Subject length must not exceed 500 characters. <br>';
            $valid = false;
        }

        // Validate message.
        if (Validator::validateTextField($this->message, 1, 10000) == false) {
            $errorMessage = $errorMessage . 'Message length must be between 1-10,000 characters long. <br>';
            $valid = false;
        }

        // Validate uploaded images.
        foreach ($this->attachments as $file) {
            if (Validator::validateFileSize($file, 25000000) == false) {
                $errorMessage = $errorMessage . 'Uploaded image(s) must not exceed the 25MB size limit. <br>';
                $valid = false;
            }
        }
        unset($file);


        if (!$valid) {
            echo $errorMessage;
            $this->cleanUploads();
        }
        return $valid;
        
    }

    public function sendEmail() {
        $subject = "An enquiry has been made.";
        $headers = "From: $this->name <$this->email>" . "\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $emailMessage = "
        <!DOCTYPE html>
        <html>
        <head></head>
        <body>
        <div>
        <h2>An enquiry about spring plants has been made.</h2>
        <p>Name: $this->name <br>
        Email: $this->email <br>
        Subject: $this->subject <br>
        Message: $this->message </p>
        </div>
        </body>
        </html>
        ";
        
        // If email has been processed for sending, display a success message
        if ( wp_mail(Form::$to, $subject, $emailMessage, $headers, $this->attachments ) ) {
            echo "Success";
        } else {
            echo 'Email not sent. Please contact us directly at lornapaulinenz@gmail.com';
        }
    }
}

?>