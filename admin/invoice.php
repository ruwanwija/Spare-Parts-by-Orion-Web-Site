<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
    h2{
        font-family:Verdana,Geneva,Tahoma,sans-serif;
        text-align:center;
    }
    table{
        font-family:Arial,Helvetica,sans-serif;
        border-collapse:collapse;
        width:100%;
    }
    td,th{
        border:1px solid #444;
        padding:8px;
        text-align:right;
    }
    .mytable{
        text-align:right;
    }
    #invoice {
        width: 90%; /* Adjust the percentage to control the width */
        margin: 0 auto; /* Center the table on the page */
    }

    #invoice th, #invoice td {
        padding: 10px; /* Reduce padding for cells */
    }

    #invoice .my-table {
        text-align: right;
    }
    #invoice button{
        text-align:center;
    }
    .button-container {
        display: flex;
        justify-content: flex-end;
        margin-right: 100px;
        margin-top: 20px;
    }
    </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
</head>
<body>
<div id=Test>
    <div style="margin-top:20px;">
        <h2>Invoice</h2>
    </div>
        <table id="invoice">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php
            $order_id = $_POST['order_id'];
            $product_names = explode(',', $_POST['product_names']);
            $product_quantity = explode(',', $_POST['product_quantity']);
            $total_subtotal = explode(',', $_POST['total_subtotal']);
            $total = $_POST['total'];
                for ($i = 0; $i < count($product_names); $i++) {
                    if ($i === 0) { 
                        echo "<tr><td rowspan='".count($product_names)."'>$order_id</td>";
                    }
                ?>
                    <td><?= $product_names[$i] ?></td>
                    <td><?= $product_quantity[$i] ?></td>
                    <td><?= $total_subtotal[$i] ?></td>
                    
                </tr>
            <?php } ?>
                <tr>
                    <td colspan="3" class="my-table">Amount Price(Rs:)</td>
                    <td><?= $total ?></td>
                </tr>
                <tr>
                    <td colspan="5" style=" padding-top:50px;">Signature</td>
                </tr>
                </tbody>
            </thead>
        </table>
        <div class="button-container">
        <button class="btn btn-primary" id="generate-pdf">Download PDF</button>
    </div>
    </div>
</div>
       
    
    <script>
       document.getElementById('generate-pdf').addEventListener('click', () => {
        var divToPrint = document.getElementById('Test');
        var popupWin = window.open('', '');
        popupWin.document.open();
        popupWin.document.write('<html><head><title>INVOICE NAME (INV: ' + 123 + ')</title><style> table {font-family: Arial,Helvetica,sans-serif;border-collapse: collapse;width: 100%;}td,th {border: 1px solid #444;padding: 8px;text-align: right;}.mytable {text-align: right;}#invoice {width: 90%;margin: 0 auto;;}#invoice th, #invoice td {padding: 10px;;}#invoice .my-table {text-align: right;}</style></head><body onload="window.print(); setTimeout(window.close, 0);">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
});


    </script>
</body>
</html>
