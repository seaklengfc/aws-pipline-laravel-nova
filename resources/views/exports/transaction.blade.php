<table>
    <tbody>
    <tr>
        <td>ID</td>
        <td>Transaction ID</td>
        <td>Transaction Date</td>
        <td>Merchant ID</td>
        <td>Customer</td>
        <td>Action</td>
        <td>Action Meta</td>
        <td>Amount</td>
        <td>Charge</td>
        <td>Cashback</td>
        <td>Step</td>
        <td>Status</td>
        <td>Endpoint</td>
        <td>Request</td>
        <td>Reference ID</td>
        <td>Partner Reference ID</td>
        <td>Error Code</td>
        <td>Error Message</td>
        <td>Provider</td>
        <td>Promotion Title</td>
        <td>Promotion Cashback</td>
    </tr>
    @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->transaction_id }}</td>
            <td>{{ $transaction->insert_date }}</td>
            <td>{{ $transaction->merchant_id }}</td>
            <td>{{ $transaction->customer_id }}</td>
            <td>{{ $transaction->action }}</td>
            <td>{{ $transaction->action_meta }}</td>
            <td>{{ $transaction->amount/10000 }}</td>
            <td>{{ $transaction->charge/10000 }}</td>
            <td>{{ $transaction->cashback/10000 }}</td>
            <td>{{ $transaction->step }}</td>
            <td>{{ $transaction->status }}</td>
            <td>{{ $transaction->endpoint }}</td>
            <td>{{ $transaction->request }}</td>
            <td>{{ $transaction->reference_id }}</td>
            <td>{{ $transaction->partner_reference_id }}</td>
            <td>{{ $transaction->error_code }}</td>
            <td>{{ $transaction->error_message }}</td>
            <td>{{ $transaction?->provider?->code ?? '' }}</td>
            <td>{{ $transaction?->promotion?->title ?? '' }}</td>
            <td>%{{ $transaction?->promotion?->cashback_percentage ?? '' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
