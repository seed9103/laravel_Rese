<!DOCTYPE html>
<html>
<head>
    <title>予約のリマインダー</title>
</head>
<body>
    <h1>こんにちは、{{ $reservation->user->name }}さん</h1>
    <p>以下の内容で予約がされています。</p>
    <p>レストラン名: {{ $reservation->restaurant->name }}</p>
    <p>日付: {{ $reservation->reservation_date }}</p>
    <p>時間: {{ $reservation->reservation_time }}</p>
    <p>人数: {{ $reservation->num_people }}人</p>
    <p>お楽しみください！</p>
</body>
</html>