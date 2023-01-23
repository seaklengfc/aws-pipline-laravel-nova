<table>
    <tbody>
    <tr>
        <td>Summary Report</td>
    </tr>
    <tr>
        <td>Date from</td>
        <td>8/1/2022</td>
    </tr>
    <tr>
        <td>Date to</td>
        <td>8/1/2022</td>
    </tr>
    <tr></tr>
    <tr>
        <td>Platform name</td>
        <td>Cellcard CPG</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td>Transaction date</td>
        <td>Merchant Name</td>
        <td>Partner name</td>
        <td>Amount</td>
        <td>Charge</td>
        <td>Cashback</td>
        <td>Cashback percentage</td>
        <td>Action</td>
        <td>Provide Code</td>
    </tr>
    @foreach($snapshots as $snapshot)
        <tr>
            <td>{{ $snapshot->date }}</td>
            <td>{{ $snapshot->merchant_name }}</td>
            <td>{{ $snapshot->partner_name }}</td>
            <td>{{ $snapshot->amount }}</td>
            <td>{{ $snapshot->charge }}</td>
            <td>{{ $snapshot->cashback }}</td>
            <td>{{ $snapshot->cashback_percentage }}</td>
            <td>{{ $snapshot->action }}</td>
            <td>{{ $snapshot->provider_code }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
