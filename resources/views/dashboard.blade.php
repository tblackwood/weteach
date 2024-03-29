@extends('app')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-gray-200 min-h-screen">
        @include('partials.dashboard-header')
        @if(auth()->user()->onTrial())
            <div class="container rounded-lg mx-auto mt-8">
                @include('partials.trial_notification', ['action_btn' => true])
            </div>
        @endif
        <div class="flex container mx-auto">

            @include('partials.dashboard-nav')

            <div class="w-full bg-white rounded-lg mx-auto my-8 px-10 py-8">
                <h1 class="text-2xl font-medium mb-2">Welcome to Your Dashboard</h1>
                <h2 class="font-medium text-sm text-gray-500 mb-4 uppercase tracking-wide">Feel free to modify this view for your app</h2>
                <p>You can include any data in the main dashboard area of your application. It's typically a good idea to add quick links to popular sections of your application.</p>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
