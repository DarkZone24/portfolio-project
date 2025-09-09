<?php
// ============================================
// Email Template: resources/views/emails/hire-me-auto-reply.blade.php
// ============================================
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank you for your inquiry!</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 8px 8px; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You, {{ $inquiryData->name }}!</h1>
            <p>Your message has been received successfully</p>
        </div>
        
        <div class="content">
            <p>Dear {{ $inquiryData->name }},</p>
            
            <p>Thank you for reaching out! I've received your inquiry and I'm excited to learn more about your project.</p>
            
            <p><strong>Here's what happens next:</strong></p>
            <ul>
                <li>I'll review your message within 24 hours</li>
                <li>I'll get back to you with any questions or to schedule a discussion</li>
                <li>We'll discuss your project requirements and timeline</li>
                <li>I'll provide you with a detailed proposal</li>
            </ul>
            
            <p>In the meantime, feel free to check out my portfolio or connect with me on social media.</p>
            
            <p><strong>Your submitted details:</strong></p>
            <p><strong>Email:</strong> {{ $inquiryData->email }}<br>
            <strong>Contact:</strong> {{ $inquiryData->contact }}<br>
            <strong>Submitted:</strong> {{ $inquiryData->created_at->format('M d, Y \a\t h:i A') }}</p>
            
            <p>Looking forward to working with you!</p>
            
            <p>Best regards,<br>
            <strong>Your Name</strong><br>
            Web Developer</p>
        </div>
        
        <div class="footer">
            <p>If you have any urgent questions, feel free to call or text me directly.</p>
        </div>
    </div>
</body>
</html>