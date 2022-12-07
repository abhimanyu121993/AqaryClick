
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register</title>
</head>

<body style="margin:0;padding:0">

    <div
        style="width:100%;min-width:320px;font-family:Helvetica,Arial;font-weight:bold;font-size:24px;background-color:#efefeb">
        <div style="margin:0 auto;width:100%;max-width:598px;text-align:center;background-color:#242e30">
            <table
                style="width:100%;max-width:599px;font-family:Arial;font-size:16px;color:#868686;background-color:#efefeb"
                cellspacing="0" cellpadding="0" border="0">
                <tbody>
                    <tr>
                        <td style="padding-top:30px;background-color:#efefeb;width:auto"> </td>
                        <td style="padding-top:30px;background-color:#efefeb;text-align:center;width:75px">
                        </td>
                        <td style="padding-top:30px;height:38px;background-color:#efefeb;width:auto"> </td>
                    </tr>
                </tbody>
            </table>
            <table
                style="width:100%;max-width:600px;font-family:Arial;font-size:16px;color:#868686;background-color:#242e30;table-layout:fixed"
                cellspacing="0" cellpadding="0" border="0">
                <tbody>
                    <tr style="background-color:#deab12">
                        <td style="text-align:center;width:auto;background-color:#242e30"> </td>
                        <td style="height:38px;text-align:center;width:75px;background-color:#242e30">
                        </td>
                        <td style="text-align:center;width:auto;background-color:#242e30"> </td>
                    </tr>
                </tbody>
            </table>
            <div style="font-size:0;background-color:#242e30">
                <div style="width:15%;display:inline-block;vertical-align:top">
                    <img style="width:100%;min-height:auto"
                        src="http://www.uberconference.com/static/img2/emails/announcement_l.gif">
                </div>
                <div style="display:inline-block;width:70%;vertical-align:top;color:#f7f7f7;text-align:center">
                    <div style="font-size:42px;font-weight:bold;padding-bottom:12px;padding-top:25px">Invoice Created Successfully</div>
                    <hr style="width:80%;border:1px solid #2f6577">
                    <div style="font-size:24px;font-weight:normal;padding-top:12px;padding-bottom:6px">Your Invoice
                        details:</div>
                    <table style="margin:auto">
                        <tbody>
                            <tr>
                                <td style="color:#afafaf;font-size:14px;padding:6px">Your Invoice Number</td>
                                <td style="color:#fff;font-size:14px">
                                    {{ $data->invoice_no }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="margin:auto">
                        <tbody>
                            <tr>
                                <td style="color:#afafaf;font-size:14px;padding:6px;white-space:nowrap">Your Receipt
                                </td>
                                <td
                                    style="color:#fff;font-size:14px;padding-right:6px;white-space:nowrap;text-decoration:none">
                                    {{ $data->receipt_no }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td width="100%" style="padding-top:32px;text-align:center" align="center">
                                    <table width="220px" cellspacing="0" cellpadding="0" style="display:inline-block">
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="width:15%;display:inline-block;vertical-align:top">
                    <img style="width:100%;min-height:auto"
                        src="">
                </div>
            </div>
            <div style="text-align:center">
                <img style="width:100%;min-height:auto;vertical-align:bottom"
                    src="">
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

</html>
