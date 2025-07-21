<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>صفحه اصلی - رأی‌گیری</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles/home.css') }}">
</head>

<body>

    <div class="header">
        <h1>🗳️ سامانه رأی‌گیری عمومی</h1>

        @guest
            <div class="auth-buttons">
                <a href="{{ route('loginView') }}">ورود</a>
                <a href="{{ route('registerView') }}">ثبت‌نام</a>
            </div>
        @else
            <div class="auth-buttons">
                <a href="{{ route('logout') }}">خروج از حساب</a>
            </div>
        @endguest
        {{-- @if (!Auth::check())
        <div class="auth-buttons">
            <a href="{{ route('loginView') }}">ورود</a>
            <a href="{{ route('registerView') }}">ثبت‌نام</a>
        </div>
    @endif --}}
    </div>


    <div class="polls">
        @php
            $stickers = [
                '🔥',
                '🎉',
                '😍',
                '💡',
                '🚀',
                '🎯',
                '😎',
                '🍕',
                '🎮',
                '🐱',
                '📚',
                '💻',
                '🏆',
                '🎵',
                '🌈',
                '✨',
                '⚡',
                '😺',
                '🧠',
                '📱',
            ];
        @endphp

        @foreach ($votes as $vote)
            @php
                $randomSticker = $stickers[array_rand($stickers)];
            @endphp
            <div class="poll-card">
                <h2 class="poll-title">{{ $vote->question }} {{ $randomSticker }}</h2>

                @guest
                    <a href="{{ route('loginView') }}" class="vote-button" title="رأی دادن">+</a>
                @else
                    @if (Auth::user()->role != 1)
                        <a href="{{ route('vote.inc', $vote->id) }}" class="vote-button" title="رأی دادن">+</a>
                    @endif
                    @endguest

                </div>
            @endforeach
        </div>

    </body>

    </html>
