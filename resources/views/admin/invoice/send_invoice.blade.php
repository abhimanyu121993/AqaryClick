<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 100%;
            height:auto;
        }
        p{
            width: 80%;
        }
        .summary{
            display: flex;
            width: 100%;
            height: auto;
            align-items: center;
            justify-content: center;
        }

        details{
            cursor: pointer;
        }

        .main{
        width:600px;
        }
    </style>
</head>
<body>
    <div class="main">
    <details>
        <summary>Invoice Reciept</summary>
        <div class="summary">
              <p>
                Dear user you can  <a href="{{url('admin/invoice-print', $invoice->invoice_no)}}">Download</a>  Your invoice reciept on the click of Download Button. Your invoice number is <b>{{$invoice->invoice_no}}</b>.
                <br>
                Thank You <br>
                Team Aqary Click.
              </p>

            </div>
    </details>
</div>
</body>
</html>
