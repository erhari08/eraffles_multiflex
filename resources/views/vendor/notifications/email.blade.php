<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verify Email</title>
</head>
<body style="margin:0; padding:0; background-color:#f6f9fc; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f6f9fc;">
        <tr>
            <td align="center">

                <!-- Main Wrapper -->
                <table width="600" cellpadding="0" cellspacing="0"
                       style="margin:40px auto; background-color:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 8px 20px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color:#198754; padding:30px;">
                            <img src="{{ asset('storage/images/PPC_council_image.png') }}" width="400" alt="Logo" style="margin-bottom:10px;">
                           
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px; background-color:#ffffff; color:#333333;">

                            <h2 style="font-size:20px; margin-top:0; color:#198754;">Hello {{ $user ?? 'User' }},</h2>

                            <p style="font-size:16px; line-height:1.6;">
                                Thank you for registering. Please click the button below to verify your email address.
                            </p>

                            <div style="text-align:center; margin: 30px 0;">
                                <a href="{{ $actionUrl }}"
                                   style="background-color:#198754; color:#ffffff; padding:14px 28px; border-radius:6px; text-decoration:none; font-weight:bold; display:inline-block;">
                                    {{ $actionText }}
                                </a>
                            </div>

                            <p style="font-size:14px; color:#666666;">
                                If you did not create an account, no further action is required.
                            </p>

                            @isset($actionText)
                                <hr style="margin:40px 0; border:none; border-top:1px solid #e0e0e0;">
                                <p style="font-size:13px; color:#999999;">
                                    If you're having trouble clicking the <strong>"{{ $actionText }}"</strong> button,
                                    copy and paste the URL below into your web browser:
                                </p>
                                <p style="word-break:break-all; font-size:13px; color:#999;">
                                    <a href="{{ $actionUrl }}" style="color:#198754;">{{ $displayableActionUrl ?? $actionUrl }}</a>
                                </p>
                            @endisset

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f1f1f1; text-align:center; padding:20px; font-size:13px; color:#999999;">
                            <p style="margin:0;">
                                © {{ now()->year }} Pondicherry Pharmacy Council. All rights reserved.
                            </p>
                            <p style="margin:8px 0 0;">
                                📍 Gorimedu, Puducherry - 605006<br>
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
