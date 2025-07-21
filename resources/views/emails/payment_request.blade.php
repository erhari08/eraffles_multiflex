<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Payment Request</title>
</head>

<body style="margin:0; padding:0; background-color:#f0f4f8; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0f4f8;">
        <tr>
            <td align="center">

                <!-- Main Wrapper -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="margin:40px auto; background-color:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 6px 18px rgba(0,0,0,0.07);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color:#198754; padding:30px 20px;">
                            <img src="{{ asset('storage/images/PPC_council_image.png') }}" width="400" alt="PPC Logo"
                                style="margin-bottom:10px;">
                           
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px 30px; color:#333333;">

                            <h2 style="margin-top:0; font-size:20px; color:#198754;">Hello {{ $user }},</h2>

                            <p style="font-size:16px; line-height:1.6; margin-bottom:20px;">
                                We hope you're doing well. This is a friendly reminder that you have a pending payment of:
                            </p>

                            <div style="font-size:24px; font-weight:bold; color:#198754; margin:10px 0 30px; text-align:center;">
                                ₹{{ $amount }}
                            </div>

                            <p style="font-size:16px; line-height:1.6; margin-bottom:30px;">
                                Please click the button below to securely proceed with the payment.
                            </p>

                            <div style="text-align:center;">
                                <a href="{{ config('app.url') }}"
                                    style="background-color:#198754; color:#ffffff; padding:14px 32px; border-radius:6px; text-decoration:none; font-weight:bold; display:inline-block;">
                                    Pay Now
                                </a>
                            </div>

                            <p style="font-size:13px; color:#666666; margin-top:30px; text-align:center;">
                                If you have already made this payment, please disregard this message.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f8f8f8; text-align:center; padding:20px; font-size:13px; color:#999999;">
                            <p style="margin:0;">
                                © {{ now()->year }} Pondicherry Pharmacy Council. All rights reserved.
                            </p>
                            <p style="margin:8px 0 0;">
                                📍 Govt Pharmacy Campus, Indira Nagar, Gorimedu, Puducherry - 605006<br>
                                📞 +91-9025589399, +91-9400127205<br>
                                📧 <a href="mailto:ponphacil@gmail.com" style="color:#198754; text-decoration:none;">ponphacil@gmail.com</a>
                            </p>
                        </td>
                    </tr>

                </table>
                <!-- End Main Wrapper -->

            </td>
        </tr>
    </table>

</body>

</html>
