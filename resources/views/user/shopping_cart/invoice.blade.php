<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        .header, .footer { width: 100%; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 8px; border: 1px solid #ccc; }
        .no-border { border: none !important; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <h1>FACTURA</h1>
    </div>

    <table class="no-border">
        <tr class="no-border">
            <td class="no-border">
                <strong>Datos del Cliente</strong><br>
                {{ $clientData['name'] }}<br>
                {{ $clientData['address'] }}<br>
                {{ $clientData['phone'] }}
            </td>
            <td class="no-border text-right">
                <strong>Datos de la Empresa</strong><br>
                {{ $companyData['name'] }}<br>
                {{ $companyData['address'] }}<br>
                {{ $companyData['phone'] }}
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>Detalle</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
    @foreach($items as $item)
    <tr>
        <td>{{ \App\Models\Product::find($item['product_id'])->name }}</td>
        <td class="text-center">{{ $item['quantity'] }}</td>
        <td class="text-right">{{ number_format($item['unit_price'], 2) }} €</td>
        <td class="text-right">{{ number_format($item['subtotal'], 2) }} €</td>
    </tr>
    @endforeach
</tbody>

    </table>

    <table>
        <tr>
            <td class="no-border" colspan="3" style="text-align:right;">Subtotal</td>
            <td class="text-right">{{ number_format($rawSubtotal, 2) }} €</td>
        </tr>
        <tr>
            <td class="no-border" colspan="3" style="text-align:right;">Envío</td>
            <td class="text-right">{{ number_format($shipping, 2) }} €</td>
        </tr>
        <tr>
            <td class="no-border" colspan="3" style="text-align:right;">IVA ({{ $vatRate * 100 }}%)</td>
            <td class="text-right">{{ number_format($vat, 2) }} €</td>
        </tr>
        <tr>
            <td class="no-border bold" colspan="3" style="text-align:right;">Total</td>
            <td class="text-right bold">{{ number_format($total, 2) }} €</td>
        </tr>
    </table>

    <div class="footer">
        <p>Información de pago: Transferencia bancaria - Banco X - Nº de cuenta: 1234-5678-9101</p>
    </div>

</body>
</html>
