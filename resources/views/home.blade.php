@extends('layouts.app')

@section('title', 'Home')
@section('main')
    @auth
        @if ((auth()->user()->role->id == 1))
            <script>
                window.location.href = "{{ route('candidat.index') }}";
            </script>
        @endif
        @if ((auth()->user()->role->id == 2))
            <script>
                window.location.href = "{{ route('admin.results') }}";
            </script>
        @endif

        @if ((auth()->user()->role->id == 3))
            <script>
                window.location.href = "{{ route('result.index') }}";
            </script>
        @endif
    @endauth
@endsection
