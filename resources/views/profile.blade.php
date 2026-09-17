<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f5f7;
            background-image:
                radial-gradient(circle at 1px 1px, rgba(0, 0, 0, 0.12) 1px, transparent 0),
                radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.06) 0, transparent 50%),
                radial-gradient(at 100% 0%, rgba(139, 92, 246, 0.05) 0, transparent 50%),
                radial-gradient(at 100% 100%, rgba(37, 99, 235, 0.04) 0, transparent 50%);
            background-size: 18px 18px, auto, auto, auto;
            background-attachment: fixed;
        }

        .container {
            width: 100%;
            max-width: 380px;
        }

        .card {
            background: #ffffff;
            padding: 52px 36px 44px;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
        }

        .avatar {
            width: 88px;
            height: 88px;
            margin: 0 auto 36px;
            display: block;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.08));
        }

        .field {
            margin-bottom: 24px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field + .field {
            padding-top: 24px;
            border-top: 1px solid #f0f0f0;
        }

        .label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .value {
            font-size: 22px;
            font-weight: 600;
            color: #111827;
        }

        .form-card {
            background: #ffffff;
            padding: 36px;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
        }

        .form-card h2 {
            font-size: 18px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 28px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group:last-child {
            margin-bottom: 0;
        }

        .input-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 14px;
            font-size: 15px;
            color: #111827;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            outline: none;
            font-family: inherit;
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        .input-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .btn {
            width: 100%;
            margin-top: 24px;
            padding: 12px;
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            color: #ffffff;
            background: #2563eb;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.15s, transform 0.15s, box-shadow 0.15s;
        }

        .btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .btn:active {
            transform: translateY(0);
            box-shadow: none;
        }
    </style>
</head>
<body>

    <div class="container">
        @unless($data['name'] !== '' || $data['npm'] !== '' || $data['class'] !== '')
        <form class="form-card" action="/profile" method="GET">
            <h2>Input Data</h2>

            <div class="input-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" value="{{ $data['name'] }}" placeholder="Masukkan nama">
            </div>

            <div class="input-group">
                <label for="npm">NPM</label>
                <input type="text" id="npm" name="npm" value="{{ $data['npm'] }}" placeholder="Masukkan NPM">
            </div>

            <div class="input-group">
                <label for="class">Kelas</label>
                <input type="text" id="class" name="class" value="{{ $data['class'] }}" placeholder="Masukkan kelas">
            </div>

            <button class="btn" type="submit">Submit</button>
        </form>
        @endunless

        @if($data['name'] !== '' || $data['npm'] !== '' || $data['class'] !== '')
        <div class="card">
            <svg class="avatar" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="44" cy="44" r="44" fill="#e5e7eb"/>
                <circle cx="44" cy="34" r="14" fill="#c4c0bc"/>
                <ellipse cx="44" cy="68" rx="22" ry="18" fill="#c4c0bc"/>
            </svg>

            <div class="field">
                <div class="label">Nama</div>
                <div class="value">{{ $data['name'] }}</div>
            </div>

            <div class="field">
                <div class="label">Kelas</div>
                <div class="value">{{ $data['class'] }}</div>
            </div>

            <div class="field">
                <div class="label">NPM</div>
                <div class="value">{{ $data['npm'] }}</div>
            </div>
        </div>
        @endif
    </div>

</body>
</html>
