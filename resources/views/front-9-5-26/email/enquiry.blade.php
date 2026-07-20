<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting">
    <title>Emailer</title>
    <style>
        @media (max-width: 480px) {
            .contact-link a {
                font-size: 12px !important;
                white-space: nowrap !important;
            }

            .text-center td
            {
                padding: 24px 48px 58px 24px !important;
            }
        }
    </style>
</head>

<body style="margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;">
    <center>
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px; margin:0 auto;">
            <tr>
                <td style="background-color: #C12729; height: 10px;"></td>
            </tr>
            <tr>
                <td style="text-align: center; padding: 24px 0;">
                    <img src="https://intelliworkz.co.in/flexibellow/images/emailer/logo.png" alt="logo" style="max-width:150px; height:auto;">
                </td>
            </tr>
            <tr>
                <td>
                    <img src="https://intelliworkz.co.in/flexibellow/images/emailer/banner.png" alt="banner" style="width: 100%; height: auto; display: block;">
                </td>
            </tr>
            <tr class="text-center">
                <td style="padding: 37px 48px 58px 48px; font-family: 'Rubik', sans-serif; color: #333333;">
                    <h2 style=" font-size: 18px;">Thank You for Your Enquiry.</h2>
                    <p style=" font-size: 14px; line-height: 20px;">
                        Download the Enquiry PDF: <a href="{{ $fileUrl }}">Click here</a>
                    </p>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td style="background-color: #C12729; text-align: center; padding:8px;">
                    <p style=" font-size:12px; color:#FFFFFF; font-family:'Rubik', sans-serif; margin: 0;">
                        © 2025 Flexibel Expansion Joints. All Rights Reserved.
                    </p>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
