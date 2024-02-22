<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice</title>
    <style>
        .invoice_details {
            width: 500px;
            height: 600px;
            border: 1px solid #000;
            margin: 20px auto;
            /* text-align: center; */
            padding: 5px;
        }

        .invoice_details h3,
        h5 {
            text-align: center;
            text-decoration: underline;
        }

        .content {
            width: 250px;
            height: 500px;
            border-right: 1px dotted #000;
            padding: 10px;

        }
    </style>
</head>

<body>
    <div class="invoice_details">
        <h3>Store</h3>
        <h5>Invoice Number:({{$print->id}})</h5>
        <div class="content">
            <!-- /////////////////////////////////////////////// -->
            <?php
            $price = $print->price;
            $quantity = $print->quantity;
            $UnitPrice = $price / $quantity;
            ?>
            <!-- /////////////////////////////////////////////// -->



            
            <h6>Customer Name: {{ $print->Name }}</h6>
            <h6>Date: {{$date= now()}}</h6>
            <!-- <h6>Date: {{$now = Time()}}</h6> -->
            <!-- <h6></h6> -->
            <h6>Customer Phone : {{ $print->phone }}</h6>
            <h6>Customer Address : {{ $print->address }}</h6>
            --------------------------------------
            <h6>Product: {{ $print->Item }}</h6>
            <h6>quantity: {{ $print->quantity }}</h6>
            <h6>UnitPrice: {{ $UnitPrice }}</h6>



            ----------------------------------
            <h6>Total Price : {{ $print->price }}</h6>

        </div>
    </div>
</body>

</html>