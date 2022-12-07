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
        <div style="margin:0 auto;width:100%;max-width:598px;text-align:center;background-color:#ffffff">
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
                style="width:100%;max-width:600px;font-family:Arial;font-size:16px;color:#868686;background-color:#ffffff;table-layout:fixed"
                cellspacing="0" cellpadding="0" border="0">
                <tbody>
                    <tr style="background-color:#deab12">
                        <td style="text-align:center;width:auto;background-color:#ffffff"> </td>
                        <td style="height:38px;text-align:center;width:75px;background-color:#ffffff">
                        </td>
                        <td style="text-align:center;width:auto;background-color:#ffffff"> </td>
                    </tr>
                </tbody>
            </table>
            <div style="font-size:0;background-color:#ffffff">
                <div style="width:15%;display:inline-block;vertical-align:top">
                    <img style="width:100%;min-height:auto"
                        src="http://www.uberconference.com/static/img2/emails/announcement_l.gif">
                </div>
                <div style="display:inline-block;width:70%;vertical-align:top;color: #f08a48;text-align:center">
                    <div style="font-size:42px;font-weight:bold;padding-bottom:12px;padding-top:25px">Welcome!
                        <div style="font-size:24px;font-weight:bold;padding-bottom:12px;padding-top:6px">Your Contract Registered Successfully</div>

                    </div>
                    <hr style="width:80%;border:1px solid #10e6e6">
                    <div style="font-size:24px;font-weight:normal;padding-top:12px;padding-bottom:6px">Your contract
                        details:</div>
                    <table style="margin:auto">
                        <tbody>
                            <tr>
                                <td style="color:#10e6e6;font-size:14px;padding:6px">Contract Code</td>
                                <td style="color:#10e6e6;font-size:14px">
                                    {{$data->contract_code}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="margin:auto">
                        <tbody>
                            <tr>
                                <td style="color:#10e6e6;font-size:14px;padding:6px;white-space:nowrap">Document
                                </td>
                                <td
                                    style="color:#10e6e6;font-size:14px;padding-right:6px;white-space:nowrap;text-decoration:none">
                                    {{$data->qid_document}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="margin:auto">
                        <tbody>
                            <tr>
                                <td style="color:#10e6e6;font-size:14px;padding:6px;white-space:nowrap">Mobile Number</td>
                                <td style="color:#10e6e6;font-size:14px;white-space:nowrap">{{$data->tenant_mobile}}</td>
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

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

</html>

