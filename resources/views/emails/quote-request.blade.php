<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quote request</title>
</head>
<body style="margin:0;padding:0;background:#f3f6f9;font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif;color:#0B0B0B;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f3f6f9;padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;background:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e4eaf1;">
                    <tr>
                        <td style="background:#314968;padding:28px 32px;">
                            <p style="margin:0;font-size:12px;letter-spacing:0.14em;text-transform:uppercase;color:#c9d5e3;font-weight:600;">
                                New website enquiry
                            </p>
                            <h1 style="margin:10px 0 0;font-size:24px;line-height:1.3;color:#ffffff;font-weight:700;">
                                Quote request received
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px 32px 8px;">
                            <p style="margin:0 0 20px;font-size:15px;line-height:1.6;color:#555551;">
                                A customer submitted a quote request on
                                <strong style="color:#0B0B0B;">{{ $company['name'] }}</strong>.
                            </p>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e4eaf1;width:34%;font-size:13px;color:#6b6b67;vertical-align:top;">Name</td>
                                    <td style="padding:12px 0;border-bottom:1px solid #e4eaf1;font-size:15px;color:#0B0B0B;font-weight:600;">{{ $quote['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e4eaf1;font-size:13px;color:#6b6b67;vertical-align:top;">Phone</td>
                                    <td style="padding:12px 0;border-bottom:1px solid #e4eaf1;font-size:15px;color:#0B0B0B;font-weight:600;">
                                        <a href="tel:{{ preg_replace('/\s+/', '', $quote['phone']) }}" style="color:#314968;text-decoration:none;">{{ $quote['phone'] }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e4eaf1;font-size:13px;color:#6b6b67;vertical-align:top;">Email</td>
                                    <td style="padding:12px 0;border-bottom:1px solid #e4eaf1;font-size:15px;color:#0B0B0B;font-weight:600;">
                                        <a href="mailto:{{ $quote['email'] }}" style="color:#314968;text-decoration:none;">{{ $quote['email'] }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #e4eaf1;font-size:13px;color:#6b6b67;vertical-align:top;">Subject</td>
                                    <td style="padding:12px 0;border-bottom:1px solid #e4eaf1;font-size:15px;color:#0B0B0B;font-weight:600;">{{ $quote['title'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;font-size:13px;color:#6b6b67;vertical-align:top;">Message</td>
                                    <td style="padding:12px 0;font-size:15px;color:#0B0B0B;line-height:1.6;white-space:pre-wrap;">{{ $quote['message'] }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:8px 32px 28px;">
                            <div style="margin-top:12px;padding:16px 18px;background:#f3f6f9;border-left:4px solid #314968;border-radius:0 8px 8px 0;">
                                <p style="margin:0;font-size:13px;line-height:1.5;color:#555551;">
                                    Reply directly to this email or call
                                    <strong style="color:#0B0B0B;">{{ $quote['phone'] }}</strong>
                                    to follow up.
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#0B0B0B;padding:18px 32px;text-align:center;">
                            <p style="margin:0;font-size:12px;color:#b0b0ad;">
                                {{ $company['name'] }} · Quote request notification
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
