<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Games Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .report-date {
            text-align: right;
            color: #666;
            margin-bottom: 20px;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #3b82f6;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #ddd;
        }
        td {
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 12px;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        tr:hover {
            background-color: #f3f4f6;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Game Index Report</h1>
    <div class="report-date">
        Generated on: {{ date('M d, Y H:i') }}
    </div>

    @if($games->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Developer</th>
                    <th>Publisher</th>
                    <th>Release Year</th>
                    <th>Platform</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $key => $game)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $game->title }}</td>
                        <td>{{ $game->developer }}</td>
                        <td>{{ $game->publisher }}</td>
                        <td>{{ $game->release_year }}</td>
                        <td>{{ $game->platform->platform_name ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Total Records: {{ $games->count() }} | Page 1</p>
            <p>This report is automatically generated and does not require a signature.</p>
        </div>
    @else
        <p style="text-align: center; color: #999; padding: 40px;">No games found matching the filter criteria.</p>
    @endif
</body>
</html>
