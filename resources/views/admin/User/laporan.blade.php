<!DOCTYPE html>
<html>
<head>
    <title>Laporan User</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Laporan User</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->role->level }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
