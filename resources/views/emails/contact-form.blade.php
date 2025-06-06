<!DOCTYPE html>
<html>
    <head>
        <title>Pesan Baru dari Website</title>
    </head>
    <body>
        <h2>Anda menerima pesan baru dari form kontak:</h2>
        <p><strong>Nama:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Subjek:</strong> {{ $data['subject'] }}</p>
        <hr>
        <p><strong>Pesan:</strong></p>
        <p>{!! nl2br(e($data['message'])) !!}</p>
    </body>
</html>