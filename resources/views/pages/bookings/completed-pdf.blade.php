<!DOCTYPE html>
<html>
<head>
    <title>Daftar Booking Selesai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Daftar Booking Selesai</h1>
        <p>Tanggal: {{ now()->format('d-m-Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Rumah</th>
                <th>Pembooking</th>
                <th>NO. HP</th>
                <th>Tanggal Booking</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $index => $booking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $booking->house->name ?? 'Data tidak tersedia' }}</td>
                <td>{{ $booking->user->name ?? 'Data tidak tersedia' }}</td>
                <td>{{ $booking->phone_number ?? 'Data tidak tersedia' }}</td>
                <td>{{ $booking->booking_date->format('d-m-Y') }}</td>
                <td>{{ $booking->payment_status_text }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis oleh sistem FindUrHouse</p>
    </div>
</body>
</html> 