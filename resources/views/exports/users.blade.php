<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #333; padding: 6px; text-align: left; }
    th { background-color: #f0f0f0; }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Daftar Users</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Sekolah</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{ $user['id'] }}</td>
          <td>{{ $user['name'] }}</td>
          <td>{{ $user['email'] }}</td>
          <td>{{ $user['school'] ?? '-' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>