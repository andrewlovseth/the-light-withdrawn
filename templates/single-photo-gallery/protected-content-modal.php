<dialog id="password-protected-modal" class="password-protected-modal">
    <div class="password-protected-modal__content">
        <button class="password-protected-modal__close" id="close-btn" aria-label="Close">&times;</button>

        <div class="password-protected-modal__copy | copy copy-2">
            <p>To view and download the images without a watermark, enter the password provided with your copy of Woodrow Wilson: The Light Withdrawn. In the print and ebook editions, the password appears beneath the QR code on the first page of the Notes (p. 501 in the print edition).  In the audiobook, the password is provided in the Opening Credits. </p>
        </div>

        <?php echo do_shortcode('[bearsmith_password_form]'); ?>

        <a href="#" class="password-protected-modal__dismiss" id="dismiss-btn">
            <div class="faux-checkbox"></div>
            The watermark doesn't bother me. Don't show this message again.
        </a>
    </div>
</dialog>