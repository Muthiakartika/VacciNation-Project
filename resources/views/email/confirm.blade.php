<!DOCTYPE html>
<html>

<head>
    <title>Vaccination Status Notification</title>
</head>

<body>
<h1>{{ $details['title'] }}</h1>
<p>{{ $details['body'] }}</p>
@php
    // MENGAMBIL DATA PALING AKHIR PADA TABEL DAFTAR TENANT
    $vaccinations = DB::table('vaccinations')->orderBy('id', 'DESC')->first();

    $date = \Carbon\Carbon::parse($vaccinations->appointmentDate)->isoFormat('DD-MM-Y');
@endphp
<table style="width: 100%;">
    <tbody>
    <tr>
        <td style="width: 14%;">Name </td>
        <td style="width: 2%;">:</td>
        <td style="width: 83%;">{{$vaccinations->patientName}}</td>
    </tr>
    <tr>
        <td style="width: 14%;">Batch Number</td>
        <td style="width: 2%;">:</td>
        <td style="width: 83%;">{{$vaccinations->batchNo}}</td>
    </tr>
    <tr>
        <td style="width: 14%;">Appointment Date</td>
        <td style="width: 2%;">:</td>
        <td style="width: 83%;">{{$date}}</td>
    </tr>
    <tr>
        <td style="width: 14%;">Vaccination Dose</td>
        <td style="width: 2%;">:</td>
        <td style="width: 83%;">{{$vaccinations->vaccineDose}}</td>
    </tr>
    </tbody>
</table>
<p>Please arrive at the date you requested previously.</p>
<p>Thank You<br />VacciNation</p>
</body>

</html>
