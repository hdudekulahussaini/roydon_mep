<!DOCTYPE html>
<html>
<head>
    <title>Thank You for Contacting Roydon MEP</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #0F2044;">Thank you for your enquiry, {{ $enquiry->name }}!</h2>
        
        <p>We have successfully received your project details for <strong>{{ $enquiry->organisation }}</strong>.</p>
        
        <p>Our engineering team is currently reviewing your requirements. We will respond within one business day with a preliminary approach, indicative programme, and commercial framework.</p>
        
        <div style="background: #F8FAFC; padding: 20px; border-left: 4px solid #0E9B9B; margin: 25px 0;">
            <h3 style="margin-top: 0; color: #0F2044;">Your Submitted Details Summary:</h3>
            <ul style="list-style-type: none; padding-left: 0; margin-bottom: 0;">
                <li style="margin-bottom: 8px;"><strong>City:</strong> {{ $enquiry->city }}</li>
                <li style="margin-bottom: 8px;"><strong>Phone:</strong> {{ $enquiry->phone }}</li>
                @if($enquiry->project_type)
                    <li style="margin-bottom: 8px;"><strong>Project Type:</strong> {{ $enquiry->project_type }}</li>
                @endif
                @if($enquiry->bed_count)
                    <li style="margin-bottom: 8px;"><strong>Bed Count:</strong> {{ $enquiry->bed_count }}</li>
                @endif
            </ul>
        </div>
        
        <p>If you have any urgent questions, please feel free to reply directly to this email or call us at {{ \App\Models\ContactSetting::first()?->phone ?? '+91-73307 56745' }}.</p>
        
        <p style="margin-top: 30px;">
            Best regards,<br>
            <strong>The Roydon MEP Team</strong><br>
            <a href="{{ config('app.url') }}" style="color: #0E9B9B;">www.roydonmep.com</a>
        </p>
    </div>
</body>
</html>
