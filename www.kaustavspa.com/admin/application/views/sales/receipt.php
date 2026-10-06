<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt - <?= html_escape($invoice->invoice_number) ?></title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            color: #000;
            background: #fff;
            margin: 0;
            padding: 10px;
        }
        .receipt-container {
            width: 78mm;
            margin: 0 auto;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .text-left { text-align: left; }
        .fw-bold { font-weight: bold; }
        .divider { border-top: 1px dashed #000; margin: 6px 0; }
        .double-divider { border-top: 2px solid #000; margin: 6px 0; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 3px 0; }
        .btn-print {
            padding: 8px 16px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
        }
        @media print {
            .no-print { display: none; }
            body { padding: 0; }
        }
    </style>
</head>
<body onload="window.print()">

<div class="no-print text-center" style="margin-bottom: 15px;">
    <button class="btn-print" onclick="window.print()">PRINT RECEIPT</button>
</div>

<div class="receipt-container">
    <div class="text-center">
        <h3 class="fw-bold" style="margin: 0;"><?= html_escape(get_setting('business_name')) ?></h3>
        <div><?= html_escape(get_setting('business_address')) ?></div>
        <div>Tel: <?= html_escape(get_setting('business_phone')) ?></div>
        <div>Tax Reg: <?= html_escape(get_setting('tax_name', 'VAT')) ?></div>
    </div>

    <div class="divider"></div>

    <div class="text-left">
        <div><strong>Rcpt:</strong> <?= html_escape($invoice->invoice_number) ?></div>
        <div><strong>Date:</strong> <?= date('d/m/Y h:i A', strtotime($invoice->created_at)) ?></div>
        <div><strong>Cust:</strong> <?= html_escape($invoice->customer_name) ?></div>
        <div><strong>Staff:</strong> <?= html_escape($invoice->cashier_name ? $invoice->cashier_name : 'Staff') ?></div>
    </div>

    <div class="divider"></div>

    <table class="table">
        <thead>
            <tr>
                <th class="text-left">Item</th>
                <th class="text-center" width="20">Qty</th>
                <th class="text-right">Price</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td class="text-left"><?= html_escape($item->item_name) ?></td>
                    <td class="text-center"><?= $item->quantity ?></td>
                    <td class="text-right"><?= number_format($item->unit_price, 2) ?></td>
                    <td class="text-right"><?= number_format($item->subtotal, 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="divider"></div>

    <table class="table">
        <tr>
            <td class="text-left">Subtotal:</td>
            <td class="text-right"><?= format_currency($invoice->subtotal) ?></td>
        </tr>
        <?php if ((float)$invoice->discount_amount > 0): ?>
            <tr>
                <td class="text-left">Discount:</td>
                <td class="text-right">-<?= format_currency($invoice->discount_amount) ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td class="text-left">Tax:</td>
            <td class="text-right"><?= format_currency($invoice->tax_amount) ?></td>
        </tr>
        <tr class="fw-bold" style="font-size: 14px;">
            <td class="text-left">TOTAL:</td>
            <td class="text-right"><?= format_currency($invoice->grand_total) ?></td>
        </tr>
        <tr>
            <td class="text-left">Paid:</td>
            <td class="text-right"><?= format_currency($invoice->paid_amount) ?></td>
        </tr>
        <?php if ((float)$invoice->due_amount > 0): ?>
            <tr class="fw-bold">
                <td class="text-left">Balance Due:</td>
                <td class="text-right"><?= format_currency($invoice->due_amount) ?></td>
            </tr>
        <?php endif; ?>
    </table>

    <div class="divider"></div>

    <div class="text-center" style="margin-top: 10px;">
        <div class="fw-bold">*** THANK YOU ***</div>
        <div>Please visit again!</div>
        <div style="font-size: 10px; margin-top: 5px;"><?= website_url() ?></div>
    </div>
</div>

</body>
</html>
