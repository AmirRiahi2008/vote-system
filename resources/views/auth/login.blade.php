<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>ورود به پنل ادمین</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href={{ asset('styles/login.css') }}>

</head>

<body>

    <div class="login-container">
        <h2>🔐 ورود به سیستم رأی‌گیری</h2>
        <form action={{ route('login') }} method="POST">
            @csrf
            <div class="form-group">
                <label for="name">نام یوزر</label>
                <input type="text" id="name" name="name" required>
                @error('name')
                    <div class="error" style="color:red">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">رمز عبور</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error" style="color:red">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" style="width: 100%;">ورود</button>
        </form>
        <div class="login-footer">
            حساب نداری؟ <a href={{ route('registerView') }} style="color: var(--accent-color); text-decoration: none;">ثبت‌نام</a>
        </div>
    </div>

</body>

</html>
