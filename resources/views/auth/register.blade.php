<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>ثبت‌نام در سیستم رأی‌گیری</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('styles/register.css') }}>
</head>

<body>

    <div class="register-container">
        <h2>📝 ثبت‌نام</h2>
        <form action="/register" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">نام کامل</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error" style="color:red">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">ایمیل</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
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

            <div class="form-group">
                <label for="password_confirmation">تأیید رمز عبور</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" style="width: 100%;">ثبت‌نام</button>
        </form>


        <div class="register-footer">
            حساب داری؟ <a href={{ route('loginView') }} style="color: var(--accent-color); text-decoration: none;">وارد شو</a>
        </div>
    </div>

</body>

</html>
