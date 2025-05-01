<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .invoice-card {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            position: relative;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .invoice-header h1 {
            text-align: center;
            width: 100%;
            margin-bottom: 20px;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            font-size: 15px;
        }

        .invoice-details th,
        .invoice-details td {
            padding: 10px 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .invoice-details th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .invoice-details tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .invoice-total {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        .invoice-footer {
            text-align: center;
            margin-top: 30px;
        }

        .footer-note {
            font-size: 14px;
            color: #888;
            margin-top: 20px;
            text-align: center;
        }

        .info-line {
    display: flex;
    flex-wrap: wrap; /* Allow wrapping */
    margin-bottom: 20px;
}

.info-line p {
    flex: 1 1 100%; /* Make each <p> take full width if needed */
    word-break: break-word; /* Allow breaking long words */
    white-space: normal; /* Let text wrap */
    margin: 5px 0;
}


        .print-btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .print-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        .back-btn {
            background-color: #007BFF;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        @media print {
            .print-btn-container {
                display: none;
            }

            body {
                padding: 0;
                margin: 0;
            }

            .invoice-card {
                width: 100%;
                margin: 0;
                padding: 20px;
                box-shadow: none;
                border-radius: 0;
            }
        }
    </style>
</head>

<body>

    <div class="invoice-card">
        <div class="info-line">
            <p><strong>Customer Name:</strong> {{ $invoice->customer->name ?? 'Unknown' }}</p>
            <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>
        </div>

        <div class="invoice-details">
            <div class="table-title">ORDER DETAILS</div>
            <table>
                <thead>
                    <tr>
                        <th>Order Details</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Order Description</td>
                        <td>{{ $invoice->order_details }}</td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td>{{ number_format($invoice->total_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Discount</td>
                        <td>{{ number_format($invoice->discount, 2) ?? '0.00' }}</td>
                    </tr>
                    <tr>
    <td>Advanced Payment</td>
    <td>{{ number_format($invoice->advanced_payment, 2) }}</td>
</tr>

                    <tr>
                        <td>Status</td>
                        <td>{{ ucfirst($invoice->status) }}</td>
                    </tr>

                    

                </tbody>
            </table>
        </div>

        <div class="invoice-total">
            <p><strong>Total Payable:</strong> {{ number_format($invoice->total_amount - $invoice->discount, 2) }}</p>
        </div>

        <div class="invoice-footer">
            <p>Thank you for your business!</p>
        </div>

        <div class="footer-note">
            <p>This is a computer-generated document and does not require a signature.</p>
        </div>

        <!-- Buttons -->
        <div class="print-btn-container">
            <a href="{{ route('invoice.index') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Index
            </a>
            <button class="print-btn" onclick="window.print()">
                <i class="fas fa-print"></i> Print Invoice
            </button>
        </div>
    </div>

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script>
        document.querySelector('.print-btn').addEventListener('click', function () {
            console.log('Printing invoice...');
        });
    </script>

</body>

</html>
