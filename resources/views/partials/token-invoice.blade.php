<style>
    body {
        font-family: Arial, sans-serif;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid rgb(0, 0, 0);
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .header .logo {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo i {
        color: rgb(255, 193, 36);
        font-size: 40px;
    }

    .logo span {
        font-weight: bold;
        font-size: 32px;
        letter-spacing: 2px;
    }

    .company-details {
        text-align: right;
        font-size: 16px;
        color: #1F4E78; /* Royal Blue Color */
        margin-bottom: 50px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: small;
        margin-bottom: 20px;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    thead {
        border-top: 1px solid rgb(177, 175, 175);
        border-bottom: 1px solid rgb(177, 175, 175);
    }

    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .details-group {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .details-group div {
        flex: 1;
    }

    .footer {
        text-align: center;
        margin-top: 40px;
        border-top: 1px solid rgb(177, 175, 175);
        padding-top: 10px;
    }
</style>

<div>
    <div class="header">
        <div class="logo">
            <i class="fas fa-building"></i>
            <div>
                <span style="color: black;">Hasnat</span>
                <span style="color: #1F4E78;">Properties</span>
            </div>
        </div>
        <div class="company-details" style="margin-top: 30px">

            <strong>Phone:</strong> <small>+9230000000</small><br>
            <strong>Address:</strong> <small>Lahore</small><br>
            <strong>Email:</strong> <small>hasnatproperties@gmail.com</small>
        </div>
    </div>

    <div class="invoice-header">
        <h1>INVOICE</h1>
        <div>
            <strong>Token ID:</strong> {{ $tokenReceipt->token_id ?? '' }}<br>
            <strong>Date:</strong> {{ date('Y-m-d') }}
        </div>
        <div>
            <strong>Token Amount:</strong> PKR: {{ number_format($tokenReceipt->token_amount ?? 0, 2) }}
        </div>
    </div>

    <div class="details-group">
        <div>
            <h4>Buyer Details:</h4>
            <p><strong>Name:</strong> {{ $selectedBuyer->buyer_name ?? '' }}</p>
            <p><strong>Email:</strong> {{ $selectedBuyer->buyer_email ?? '' }}</p>
            <p><strong>Phone:</strong> {{ $selectedBuyer->buyer_phone ?? '' }}</p>
            <p><strong>CNIC:</strong> {{ $selectedBuyer->buyer_cnic ?? '' }}</p>
            <p><strong>Address:</strong> {{ $selectedBuyer->buyer_adress ?? '' }}</p>
        </div>
        <div>
            <h4>Seller Details:</h4>
            <p><strong>Name:</strong> {{ $selectedSeller->seller_name ?? '' }}</p>
            <p><strong>Email:</strong> {{ $selectedSeller->seller_email ?? '' }}</p>
            <p><strong>Phone:</strong> {{ $selectedSeller->seller_phone ?? '' }}</p>
            <p><strong>CNIC:</strong> {{ $selectedSeller->seller_cnic ?? '' }}</p>
            <p><strong>Address:</strong> {{ $selectedSeller->seller_adress ?? '' }}</p>
        </div>
        <div>
            <h4>Agent Details:</h4>
            <p><strong>Name:</strong> {{ $selectedAgent->name ?? '' }}</p>
            <p><strong>Designation:</strong> {{ $selectedAgent->designation ?? '' }}</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th colspan="2">Property Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Title:</strong> {{ $selectedProperty->title ?? '' }}</td>
                <td><strong>Address:</strong> {{ $selectedProperty->adress ?? '' }}</td>
            </tr>
            <tr>
                <td><strong>Area:</strong> {{ $selectedProperty->area ?? '' }} <strong>{{ $selectedProperty->marla ?? '' }}</strong></td>
                <td><strong>Price:</strong> {{ number_format($selectedProperty->price ?? 0, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Type:</strong> {{ $selectedProperty->property_type ?? '' }}</td>

            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Thank you for your business!</p>
    </div>
</div>
