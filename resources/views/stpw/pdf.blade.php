<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STPW Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>STPW Details</h1>

    <div class="section">
        <div class="section-title">Company Information</div>
        <table>
            <tr>
                <th>Company Name</th>
                <td>{{ $stpw->company_name }}</td>
            </tr>
            <tr>
                <th>Company Address</th>
                <td>{{ $stpw->company_address }}</td>
            </tr>
            <tr>
                <th>Store Name</th>
                <td>{{ $stpw->store_name }}</td>
            </tr>
            <tr>
                <th>Store Address</th>
                <td>{{ $stpw->store_address }}</td>
            </tr>
            <tr>
                <th>Trademark</th>
                <td>{{ $stpw->trademark }}</td>
            </tr>
            <tr>
                <th>Responsible Person</th>
                <td>{{ $stpw->responsible_person }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Business Details</div>
        <table>
            <tr>
                <th>Business Type</th>
                <td>{{ $stpw->business_types }}</td>
            </tr>
            <tr>
                <th>Investment Value</th>
                <td>{{ number_format($stpw->investment_value, 2) }}</td>
            </tr>
            <tr>
                <th>Franchise Type</th>
                <td>{{ $stpw->franchise_type }}</td>
            </tr>
            <tr>
                <th>Service Type</th>
                <td>{{ $stpw->service_type }}</td>
            </tr>
            <tr>
                <th>Building Ownership</th>
                <td>{{ $stpw->building_ownership }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Additional Information</div>
        <table>
            <tr>
                <th>Franchised Goods Composition</th>
                <td>{{ $stpw->franchised_goods_composition }}</td>
            </tr>
            <tr>
                <th>Workforce</th>
                <td>{{ $stpw->workforce }}</td>
            </tr>
            <tr>
                <th>Allowed Other Products</th>
                <td>{{ $stpw->allowed_other_products }}</td>
            </tr>
            <tr>
                <th>Distributors</th>
                <td>{{ implode(', ', json_decode($stpw->distributors, true)) }}</td>
            </tr>
            <tr>
                <th>Building Facility</th>
                <td>{{ $stpw->building_facility }}</td>
            </tr>
            @if($stpw->building_facility == 'AC')
            <tr>
                <th>AC Unit Count</th>
                <td>{{ $stpw->ac_unit_count }}</td>
            </tr>
            @endif
        </table>
    </div>

    @if($stpw->notes)
    <div class="section">
        <div class="section-title">Notes</div>
        <p>{{ $stpw->notes }}</p>
    </div>
    @endif
</body>
</html>

