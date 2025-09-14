<?php
/**
 * Contact Form Handler
 * Handles form submissions and sends emails
 */

// Enable CORS for development
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Set content type to JSON
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Configuration
$config = [
    'to_email' => 'your.email@example.com', // Replace with your email
    'from_email' => 'noreply@yourdomain.com', // Replace with your domain
    'subject_prefix' => 'Portfolio Contact: ',
    'max_message_length' => 1000,
    'required_fields' => ['name', 'email', 'subject', 'message']
];

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to send email
function sendEmail($to, $subject, $message, $from) {
    $headers = [
        'From: ' . $from,
        'Reply-To: ' . $from,
        'X-Mailer: PHP/' . phpversion(),
        'Content-Type: text/html; charset=UTF-8'
    ];
    
    return mail($to, $subject, $message, implode("\r\n", $headers));
}

// Function to log contact attempts
function logContactAttempt($data, $success) {
    $logFile = 'contact_log.txt';
    $timestamp = date('Y-m-d H:i:s');
    $status = $success ? 'SUCCESS' : 'FAILED';
    $logEntry = "[$timestamp] $status - Name: {$data['name']}, Email: {$data['email']}, Subject: {$data['subject']}\n";
    
    file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
}

// Initialize response
$response = ['success' => false, 'message' => ''];

try {
    // Check if form data exists
    if (empty($_POST)) {
        throw new Exception('No form data received');
    }
    
    // Validate required fields
    $missing_fields = [];
    foreach ($config['required_fields'] as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            $missing_fields[] = $field;
        }
    }
    
    if (!empty($missing_fields)) {
        throw new Exception('Missing required fields: ' . implode(', ', $missing_fields));
    }
    
    // Sanitize and validate input data
    $form_data = [];
    foreach ($_POST as $key => $value) {
        $form_data[$key] = sanitizeInput($value);
    }
    
    // Validate email
    if (!validateEmail($form_data['email'])) {
        throw new Exception('Invalid email address');
    }
    
    // Check message length
    if (strlen($form_data['message']) > $config['max_message_length']) {
        throw new Exception('Message is too long. Maximum ' . $config['max_message_length'] . ' characters allowed.');
    }
    
    // Prepare email content
    $subject = $config['subject_prefix'] . $form_data['subject'];
    
    $email_message = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #6366f1; color: white; padding: 20px; text-align: center; }
            .content { background: #f8f9fa; padding: 20px; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #6366f1; }
            .value { margin-top: 5px; }
            .footer { background: #e9ecef; padding: 15px; text-align: center; font-size: 12px; color: #666; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
            </div>
            <div class='content'>
                <div class='field'>
                    <div class='label'>Name:</div>
                    <div class='value'>{$form_data['name']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Email:</div>
                    <div class='value'>{$form_data['email']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Subject:</div>
                    <div class='value'>{$form_data['subject']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Message:</div>
                    <div class='value'>" . nl2br($form_data['message']) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Submitted:</div>
                    <div class='value'>" . date('Y-m-d H:i:s') . "</div>
                </div>
            </div>
            <div class='footer'>
                <p>This message was sent from your portfolio contact form.</p>
            </div>
        </div>
    </body>
    </html>";
    
    // Send email
    $email_sent = sendEmail(
        $config['to_email'],
        $subject,
        $email_message,
        $config['from_email']
    );
    
    if ($email_sent) {
        $response['success'] = true;
        $response['message'] = 'Thank you for your message! I will get back to you soon.';
        
        // Log successful contact
        logContactAttempt($form_data, true);
        
        // Optional: Send auto-reply to user
        $auto_reply_subject = 'Thank you for contacting me';
        $auto_reply_message = "
        <html>
        <head>
            <title>Thank you for your message</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #6366f1; color: white; padding: 20px; text-align: center; }
                .content { background: #f8f9fa; padding: 20px; }
                .footer { background: #e9ecef; padding: 15px; text-align: center; font-size: 12px; color: #666; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Thank You!</h2>
                </div>
                <div class='content'>
                    <p>Hi {$form_data['name']},</p>
                    <p>Thank you for reaching out to me through my portfolio website. I have received your message and will get back to you as soon as possible.</p>
                    <p>Best regards,<br>Your Name</p>
                </div>
                <div class='footer'>
                    <p>This is an automated response. Please do not reply to this email.</p>
                </div>
            </div>
        </body>
        </html>";
        
        // Send auto-reply
        sendEmail(
            $form_data['email'],
            $auto_reply_subject,
            $auto_reply_message,
            $config['from_email']
        );
        
    } else {
        throw new Exception('Failed to send email. Please try again later.');
    }
    
} catch (Exception $e) {
    $response['success'] = false;
    $response['message'] = $e->getMessage();
    
    // Log failed contact attempt
    if (isset($form_data)) {
        logContactAttempt($form_data, false);
    }
    
    // Log error for debugging
    error_log('Contact form error: ' . $e->getMessage());
}

// Return JSON response
echo json_encode($response);
?>
