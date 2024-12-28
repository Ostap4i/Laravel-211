@extends('templates.main')

@section('content')
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('feedback') }}" method="POST">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <label for="message">Message:</label><br>
        <textarea name="message" id="message" rows="4" required>{{ old('message') }}</textarea>
        @error('message')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <label for="rate">Rate (1-5):</label><br>
        <input type="number" name="rate" id="rate" min="1" max="5" value="{{ old('rate') }}"
            required>
        @error('rate')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br><br>

        <button type="submit">Submit</button>
    </form>
@endsection
