<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>پنل ادمین - رأی‌گیری</title>
    <link rel="stylesheet" href={{ asset('styles/admin.css') }}>
</head>

<body>

    <header>
        <h1>🎛️ پنل ادمین</h1>
        <a onclick="return confirm('Are You Sure Wanna Log Out ?')" href={{ route("logout") }}>خروج از حساب</a>
    </header>

    <nav>
        <a href={{ url("/") }}>🏠 رأی‌گیری‌ها</a>
        <a href={{ route("vote.add.form") }}>➕ افزودن رأی‌گیری جدید</a>
    </nav>

    <div class="vote-options">
        @foreach ($votes as $vote)
            <div>
                <span>{{ $vote->question }}</span>
                <span>{{ $vote->count }} رأی</span>
                <a onclick="return confirm('Are You Sure Wanna Delete Vote {{ $vote->question }} ?')" href={{ route('vote.delete', $vote->id) }} class="delete-btn" title="حذف گزینه">حذف</a>
            </div>
        @endforeach
    </div>

</body>

</html>
