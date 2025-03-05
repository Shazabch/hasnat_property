
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .header img {
        max-height: 80px;
    }

    .company-details {
        text-align: right;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: x-small;

    }

    thead {
        border-top: 1px solid rgb(177, 175, 175);
        border-bottom: 1px solid rgb(177, 175, 175);
    }

    td {
        padding: 8px;
        text-align: left;
        /* border-bottom: 1px solid #ddd; */
    }

    th {
        padding: 8px;
        text-align: left;
    }

    .total {
        font-weight: bold;
    }

    .total-details td {
        padding-right: 0;
    }

    .item-column {
        width: 40%;
    }
</style>
<div>
<table>
    <tbody>
        <td>
        <td><img src="{{ asset('assets/media/bg/hasnat-logo.svg.png') }}" alt="Hasnat Property Logo" style="max-width: 200px; height: auto;"></td>
        </td>
        <td>
            <div class="company-details">
                <h2>Hasnat Properties
                </h2>
                <small>+9230000000</small><br>
                <small>Lahore</small><br>
                <small>hasnatproperties@gamail.com</small>
            </div>
        </td>
    </tbody>
</table>
<div style="margin-top: 20px; border-top:1px solid rgb(177, 175, 175)">
</div>

<table>
    <tbody>
        <tr>
            <td>
                <h1>INVOICE</h1>
            </td>
            <td style="text-align: right">
                <span style="text-align: left">
                    Token Amount <br>
                    <b style="font-size: 27px">MYR {{ number_format($tokenReceipt->token_amount ?? '0' ,2) }}</b>
                </span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h4>Buyer Details:</h4>
                <p><strong>Name:</strong> {{ $selectedBuyer->buyer_name ?? '' }}</p>
                <p><strong>Email:</strong> {{ $selectedBuyer->buyer_email ?? '' }}</p>
                <p><strong>Phone:</strong> {{ $selectedBuyer->buyer_phone ?? '' }}</p>
                <p><strong>CNIC:</strong> {{ $selectedBuyer->buyer_cnic ?? '' }}</p>
                <p><strong>Address:</strong> {{ $selectedBuyer->buyer_adress ?? '' }}</p>
            </td>
        </tr>
    </tbody>
</table>


<table>
    <tbody>
        <td colspan="2">
            <h4>Seller Details:</h4>
            <p><strong>Name:</strong> {{ $seller->seller_name ?? '' }}</p>
            <p><strong>Email:</strong> {{ $seller->seller_email ?? '' }}</p>
            <p><strong>Phone:</strong> {{ $seller->seller_phone ?? '' }}</p>
            <p><strong>CNIC:</strong> {{ $seller->seller_cnic ?? '' }}</p>
            <p><strong>Address:</strong> {{ $seller->seller_adress ?? '' }}</p>
        </td>
    </tbody>
</table>
<table>
    <td colspan="2">
        <h4>Agent Details:</h4>
        <p><strong>Name:</strong> {{ $agent->name ?? '' }}</p>
        <p><strong>Designation:</strong> {{ $agent->designation ?? '' }}</p>

    </td>
</table>


<table>
    <tr>
        <td colspan="2">
            <h4>Property Details:</h4>
            <p><strong>Title:</strong> {{ $tokenReceipt->property->title ?? '' }}</p>
            <p><strong>Address:</strong> {{ $tokenReceipt->property->adress ?? '' }}</p>
            <p><strong>Area:</strong> {{ $tokenReceipt->property->area ?? '' }}</p>
            <p><strong>Marla/Kanal/Sq.FT:</strong> {{ $tokenReceipt->property->marla ?? '' }}</p>
            <p><strong>Price:</strong> {{ number_format($tokenReceipt->property->price ?? 0, 2) }}</p>
            <p><strong>Type:</strong> {{ $tokenReceipt->property_type ?? '' }}</p>
        </td>
    </tr>
</table>

<table>
    <tr>
        <td colspan="2">
            <h4>Token Details:</h4>
            <p><strong>Token ID:</strong> {{ $tokenReceipt->token_id ?? '' }}</p>
            <p><strong>Token Amount:</strong> {{ number_format($tokenReceipt->token_amount ?? 0, 2) }}</p>
            <p><strong>Start Date:</strong> {{ $tokenReceipt->start_date ?? '' }}</p>
            <p><strong>End Date:</strong> {{ $tokenReceipt->end_date ?? '' }}</p>
        </td>
    </tr>
</table>
<div style="margin-top: 40px; border-top:1px solid rgb(177, 175, 175)">
    <p>Thank you for your business!</p>
</div>
</div>


{{-- <div class="invoice-container">
    <div class="invoice-header">
        <h2>Token Receipt</h2>
        <small>Date: {{ date('Y-m-d') }}</small>
    </div>

    <div class="invoice-details">
        <table>
            <tr>
                <th>Receipt No:</th>
                <td>{{ $tokenReceipt->token_id }}</td>
            </tr>
            <tr>
                <th>Property:</th>
                <td>{{ $tokenReceipt->property->title ?? '' }}</td>
            </tr>
            <tr>
                <th>Buyer Name:</th>
                <td>{{ $buyer->buyer_name }}</td>
            </tr>
            <tr>
                <th>Seller Name:</th>
                <td>{{  $seller->seller_name }}</td>
            </tr>
            <tr>
                <th>Agent Name:</th>
                <td>{{  $agent->name }}</td>
            </tr>
            <tr>
                <th>Token Amount:</th>
                <td>Rs. {{  $tokenReceipt->token_amount }}</td>
            </tr>
            <tr>
                <th>Start Date:</th>
                <td>{{  $tokenReceipt->start_date }}</td>
            </tr>
            <tr>
                <th>End Date:</th>
                <td>{{  $tokenReceipt->end_date }}</td>
            </tr>
        </table>
    </div>

    <div class="invoice-footer">
        <button onclick="window.print()">
            <i class="fas fa-print"></i> Print Receipt
        </button>
    </div>
</div> --}}


