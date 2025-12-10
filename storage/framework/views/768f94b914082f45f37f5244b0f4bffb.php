<h2>New Contact Submission</h2>
<p><strong>Name:</strong> <?php echo e($contact->name); ?></p>
<p><strong>Email:</strong> <?php echo e($contact->email); ?></p>
<p><strong>Subject:</strong> <?php echo e($contact->subject); ?></p>
<p><strong>Message:</strong><br><?php echo nl2br(e($contact->message)); ?></p>
<?php /**PATH C:\xampp\htdocs\My-Portfolio-Aquino\resources\views/emails/contact_form.blade.php ENDPATH**/ ?>