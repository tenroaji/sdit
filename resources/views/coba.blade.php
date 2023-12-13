<h1>Data Penerimaan Pembayaran</h1>

@foreach ($records as $record)
    <div>
        <strong>Number:</strong> {{ $record->id }}
    </div>
@endforeach
