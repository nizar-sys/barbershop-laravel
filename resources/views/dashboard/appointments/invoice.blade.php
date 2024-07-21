<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            background-color: #f5f5f5;
            color: #333;
        }

        .receipt {
            width: 300px;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #000;
            border-radius: 10px;
            background-color: #fff;
        }

        .receipt h2,
        .receipt h4 {
            text-align: center;
            margin: 5px 0;
            color: #000;
        }

        .receipt h4 {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .receipt .details,
        .receipt .services,
        .receipt .total {
            margin: 10px 0;
        }

        .receipt .details table,
        .receipt .services table,
        .receipt .total table {
            width: 100%;
            border-collapse: collapse;
        }

        .receipt .details th,
        .receipt .details td,
        .receipt .services th,
        .receipt .services td,
        .receipt .total th,
        .receipt .total td {
            text-align: left;
            padding: 3px 0;
        }

        .receipt .details th {
            width: 40%;
            font-weight: normal;
        }

        .receipt .details td {
            width: 60%;
        }

        .receipt .services th,
        .receipt .services td {
            border: 1px solid #ddd;
            padding: 5px;
        }

        .receipt .services th {
            background-color: #f5f5f5;
        }

        .receipt .total th,
        .receipt .total td {
            font-weight: bold;
            padding-top: 10px;
        }

        .receipt .total td {
            text-align: right;
        }

        .receipt .footer {
            text-align: center;
            margin-top: 20px;
            border-top: 1px dashed #000;
            padding-top: 10px;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="receipt">
        <h2>Oesman's Barbershop</h2>
        <h4>Invoice</h4>
        <div class="details">
            <table>
                <tr>
                    <th>ID</th>
                    <td>{{ $invoiceData['id'] }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>@dateId($invoiceData['date'])</td>
                </tr>
                <tr>
                    <th>Pelanggan</th>
                    <td>{{ $invoiceData['client_name'] }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $invoiceData['client_email'] }}</td>
                </tr>
                <tr>
                    <th>No Telp.</th>
                    <td>{{ $invoiceData['client_phone'] }}</td>
                </tr>
                <tr>
                    <th>Layanan</th>
                    <td>:</td>
                </tr>
            </table>
        </div>
        <div class="services">
            <table>
                <thead>
                    <tr>
                        <th>Layanan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $invoiceData['service'] }}</td>
                        <td>@currencyIdr($invoiceData['amount'])</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="total">
            <table>
                <tr>
                    <th>Total</th>
                    <td>@currencyIdr($invoiceData['amount'])</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            Terima kasih atas kunjungan Anda!
        </div>
    </div>

    <script>
        window.print()
    </script>
</body>

</html>
