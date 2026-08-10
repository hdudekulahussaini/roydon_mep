<!DOCTYPE html>
<html>
<head>
    <title>New Project Enquiry</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2 style="color: #0F2044;">New Project Enquiry Received</h2>
    
    <p>A new enquiry has been submitted through the website contact form.</p>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Name:</strong></td>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $enquiry->name }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Organisation:</strong></td>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $enquiry->organisation }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Email:</strong></td>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Phone:</strong></td>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $enquiry->phone }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>City:</strong></td>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $enquiry->city }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Project Type:</strong></td>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $enquiry->project_type ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Bed Count:</strong></td>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $enquiry->bed_count ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Expected Programme:</strong></td>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $enquiry->expected_programme ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Budget Range:</strong></td>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $enquiry->budget_range ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;"><strong>Referral Source:</strong></td>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $enquiry->referral_source ?? 'N/A' }}</td>
        </tr>
    </table>

    @if($enquiry->details)
    <h3 style="margin-top: 30px; color: #0F2044;">Project Details:</h3>
    <p style="background: #f9f9f9; padding: 15px; border-left: 4px solid #0E9B9B;">
        {!! nl2br(e($enquiry->details)) !!}
    </p>
    @endif

    <p style="margin-top: 30px;">
        <a href="{{ route('admin.enquiries.index') }}" style="display: inline-block; padding: 10px 20px; background-color: #0E9B9B; color: #ffffff; text-decoration: none; border-radius: 5px;">View in Admin Panel</a>
    </p>
</body>
</html>
