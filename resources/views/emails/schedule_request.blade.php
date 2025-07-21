<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Schedule Appointment</title>
</head>

<body style="margin:0; padding:0; background-color:#f0f4f8; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0f4f8;">
        <tr>
            <td align="center">
                <!-- Main Wrapper -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="margin:40px auto; background-color:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 8px 20px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color:#198754; padding:30px 20px;">
                            <img src="{{ asset('storage/images/PPC_council_image.png') }}" width="400" alt="PPC Logo"
                                style="margin-bottom:10px;">

                        </td>
                    </tr>

                    <!-- Divider -->
                    <tr>
                        <td style="border-top:4px solid #e0e0e0;"></td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px 30px; color:#333333; line-height:1.6;">

                            <h2 style="margin-top:0; font-size:22px; color:#198754;">Hello {{ $user }},</h2>

                            <p style="font-size:16px;">
                                Please choose a convenient date to schedule your appointment. Available slots:
                            </p>

                            <ul style="font-size:16px; padding-left:20px;">
                                @foreach ($appointmentdates as $date)
                                    <li><strong>{{ \Carbon\Carbon::parse($date)->format('d-m-Y h:i A') }}</strong></li>
                                @endforeach
                            </ul>

                            <p style="font-size:16px;">
                                Click the button below to confirm your preferred appointment date.
                            </p>

                            <div style="text-align: center; margin: 35px 0;">
                                <a href="{{ config('app.url') }}"
                                    style="background-color:#198754; color:#ffffff; padding:14px 32px; border-radius:6px; text-decoration:none; font-weight:bold; display:inline-block;">
                                    Schedule Appointment
                                </a>
                            </div>

                            <p style="font-size:14px; color:#666;">
                                If you have any questions, feel free to contact us.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="background-color:#f8f8f8; padding:25px 30px; text-align:center; color:#888; font-size:13px;">

                            <p style="margin:0;">
                                © {{ now()->year }} Pondicherry Pharmacy Council. All rights reserved.
                            </p>
                            <p style="margin:8px 0 0;">
                                📍 Govt Pharmacy Campus, Indira Nagar, Gorimedu, Puducherry - 605006<br>
                                📞 +91-9025589399, +91-9400127205<br>
                                📧 <a href="mailto:ponphacil@gmail.com"
                                    style="color:#198754; text-decoration:none;">ponphacil@gmail.com</a>
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
