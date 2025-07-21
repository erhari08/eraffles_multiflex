<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body style="margin:0; padding:0; background-color:#f6f9fc; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f6f9fc;">
        <tr>
            <td align="center">

                <!-- Main Wrapper -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="margin:40px auto; background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="background-color:#198754; padding:30px;">
                            <img src="{{ url('storage/images/PPC_council_image.png') }}" alt="PPC Logo" width="120"
                                style="margin-bottom:10px;">
                            <h1 style="color:#ffffff; font-size:24px; margin:10px 0 0;">Pondicherry Pharmacy Council
                            </h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <x-mail::message>
                        {{-- Greeting --}}
                        @if (!empty($greeting))
                            # {{ $greeting }}
                        @else
                            @if ($level === 'error')
                                # @lang('Whoops!')
                            @else
                                # @lang('Hello!')
                            @endif
                        @endif

                        {{-- Intro Lines --}}
                        @foreach ($introLines as $line)
                            {{ $line }}
                        @endforeach

                        {{-- Action Button --}}
                        @isset($actionText)
                            <?php
                            $color = match ($level) {
                                'success', 'error' => $level,
                                default => 'primary',
                            };
                            ?>
                            <x-mail::button :url="$actionUrl" :color="$color">
                                {{ $actionText }}
                            </x-mail::button>
                        @endisset

                        {{-- Outro Lines --}}
                        @foreach ($outroLines as $line)
                            {{ $line }}
                        @endforeach

                        {{-- Salutation --}}
                        @if (!empty($salutation))
                            {{ $salutation }}
                        @else
                            @lang('Regards,')<br>
                            {{ config('app.name') }}
                        @endif

                        {{-- Subcopy --}}
                        @isset($actionText)
                            <x-slot:subcopy>
                                @lang("If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n" . 'into your web browser:', [
                                    'actionText' => $actionText,
                                ]) <span
                                    class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
                            </x-slot:subcopy>
                        @endisset
                    </x-mail::message>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color:#f1f1f1; text-align:center; padding:20px;">
                            <p style="font-size:13px; color:#999999; margin:0;">
                                © {{ now()->year }} Pondicherry Pharmacy Council. All Rights Reserved.
                                <br>
                                Gorimedu, Puducherry - 605006
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
