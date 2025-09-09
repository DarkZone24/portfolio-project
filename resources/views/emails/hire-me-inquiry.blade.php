<?php
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Hire Me Inquiry</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 8px 8px; }
        .field { margin-bottom: 20px; }
        .field label { font-weight: bold; color: #555; }
        .field-value { background: white; padding: 10px; border-radius: 4px; border-left: 4px solid #667eea; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Hire Me Inquiry</h1>
            <p>You have received a new project inquiry!</p>
        </div>
        
        <div class="content">
            <div class="field">
                <label>Name:</label>
                <div class="field-value">{{ $inquiryData->name }}</div>
            </div>
            
            <div class="field">
                <label>Email:</label>
                <div class="field-value">{{ $inquiryData->email }}</div>
            </div>
            
            <div class="field">
                <label>Contact:</label>
                <div class="field-value">{{ $inquiryData->contact }}</div>
            </div>
            
            <div class="field">
                <label>Message:</label>
                <div class="field-value">{{ $inquiryData->message }}</div>
            </div>
            
            <div class="field">
                <label>Submitted:</label>
                <div class="field-value">{{ $inquiryData->created_at->format('M d, Y \a\t h:i A') }}</div>
            </div>
            
            <div class="field">
                <label>IP Address:</label>
                <div class="field-value">{{ $inquiryData->ip_address }}</div>
            </div>
        </div>
        
        <div class="footer">
            <p>This inquiry was submitted through your Hire Me form.</p>
            <p><strong>Reply to this client as soon as possible!</strong></p>
        </div>
    </div>
</body>
</html>
