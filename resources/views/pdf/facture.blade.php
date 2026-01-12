<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture {{ $facture->numero_facture }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-info {
            margin-bottom: 20px;
        }
        .client-info {
            margin-bottom: 30px;
        }
        .product-info {
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .total {
            text-align: right;
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>FACTURE</h1>
        <h2>{{ $facture->numero_facture }}</h2>
    </div>

    <div class="invoice-info">
        <p><strong>Date de facturation:</strong> {{ $facture->date_facture->format('d/m/Y H:i') }}</p>
        <p><strong>Statut:</strong> {{ $facture->status }}</p>
    </div>

    <div class="client-info">
        <h3>Client</h3>
        <p>{{ $facture->client->name }}</p>
    </div>

    <div class="product-info">
        <h3>Détails du produit</h3>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $facture->produit_info['nom'] }}</td>
                    <td>${{ number_format($facture->produit_info['prix'], 2) }}</td>
                    <td>{{ $facture->produit_info['quantite'] }}</td>
                    <td>${{ number_format($facture->montant_total, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="total">
        <p>Total: ${{ number_format($facture->montant_total, 2) }}</p>
    </div>

    @if($facture->notes)
    <div class="notes">
        <h3>Notes</h3>
        <p>{{ $facture->notes }}</p>
    </div>
    @endif
</body>
</html>
