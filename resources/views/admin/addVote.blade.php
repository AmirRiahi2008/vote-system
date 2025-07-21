<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>افزودن رأی‌گیری جدید</title>
    <link rel="stylesheet" href={{ asset('styles/addVote.css') }}>
</head>

<body>

    <header>
        <h1>➕ افزودن رأی‌گیری</h1>
        <a onclick='return confirm("Are You Sure Wanna Log Out?")' href={{ route('logout') }}>خروج از حساب</a>
    </header>

    <nav>
        <a href={{ url('/') }}>🏠 رأی‌گیری‌ها</a>
        <a href={{ route('vote.add.form') }}>➕ افزودن رأی‌گیری جدید</a>
    </nav>

    <div class="card">
        <form action="{{ route('vote.add') }}" method="POST">
            @csrf

            <label for="question">موضوع رأی‌گیری:</label>
            <input type="text" id="question" name="question" placeholder="مثلاً بهترین زبان برنامه‌نویسی؟" required>

            <button type="submit" style="margin-top: 1rem;">ثبت رأی‌گیری</button>
        </form>

    </div>

</body>

</html>
