<header class="px-6 bg-white flex flex-wrap items-center lg:py-0 py-2">
    <div class="container mx-auto flex flex-wrap items-center">
        <div class="flex-1 flex justify-between items-center font-black text-gray-700">
            <a href="{{ route('dashboard') }}"><img src="/img/logo-icon.png" alt="WeTeach logo" class="h-8"></a>
        </div>

        <label for="menu-toggle" class="cursor-pointer lg:hidden block">
            <svg class="fill-current text-gray-600 hover:text-gray-800" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"</path></svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden lg:flex lg:items-center lg:w-auto w-full relative" id="menu">
            <nav>
                <ul class="lg:flex items-center justify-between text-sm font-medium text-gray-700 pt-4 lg:pt-0">
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent @if(Request::is('dashboard')) {{ 'text-indigo-500 font-bold' }} @else {{ 'text-gray-600 hover:text-gray-900' }} @endif" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent @if(Request::is('support')) {{ 'text-indigo-500 font-bold' }} @else {{ 'text-gray-600 hover:text-gray-900' }} @endif" href="{{ route('support') }}">Support</a></li>
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent @if(Request::is('announcements/unread')){{ 'text-indigo-500 font-bold' }}@else{{ 'text-gray-500 hover:text-gray-700' }}@endif lg:mb-0 mb-2 relative" href="{{ route('announcements.unread') }}">
                        @if( auth()->user()->hasUnreadAnnouncements() )
                            <span class="bg-pink-500 w-2 h-2 rounded-full absolute left-0 top-0 ml-3 mt-4 announcement-indicator"></span>
                        @endif
                        <svg width="15px" height="18px" class="fill-current" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1"><g id="noun_notification_1594286" transform="translate(-59)"><g id="Group" transform="translate(59)"><path d="M6.094 2.271c-2.426.642-4.219 2.907-4.219 5.604v3.857c0 .355-.28.643-.624.643-.691 0-1.251.577-1.251 1.286v.965c0 .177.139.32.313.32h14.374a.318.318 0 00.313-.32v-.965c0-.71-.563-1.286-1.25-1.286a.633.633 0 01-.625-.643V7.875c0-2.696-1.792-4.961-4.219-5.604v-.664c0-.8-.63-1.446-1.406-1.446-.775 0-1.406.647-1.406 1.446v.664zM5.312 15.59h4.375c0 1.243-.979 2.25-2.187 2.25-1.208 0-2.188-1.007-2.188-2.25z" id="Shape"/></g></g></g></svg>
                        </a>
                    </li>
                </ul>
            </nav>
            <a href="#" class="group lg:ml-4 flex items-center justify-start lg:mb-0 mb-4 pointer-cursor border-l border-gray-300 pl-6" id="userdropdown">
                <p class="font-bold text-xs pr-2 text-gray-700 text-right ignore-body-click">{{ auth()->user()->name }}<br>
                    @if(auth()->user()->onTrial())
                        <span class="text-xs text-teal-500 ignore-body-click">Trial Period</span>
                    @else
                        <span class="text-xs text-indigo-600 ignore-body-click">{{ ucfirst(auth()->user()->plan->name) }} Plan</span>
                    @endif
                </p>
                <img class="rounded-full w-10 h-10 border-2 border-gray-300 group-hover:border-indigo-500 ignore-body-click" src="{{ auth()->user()->photo }}" alt="avatar">
            </a>
            <div id="usermenu" class="absolute lg:mt-12 pt-1 z-40 left-0 lg:left-auto lg:right-0 lg:top-0 invisible lg:w-auto w-full">
                <div class="bg-white shadow-xl lg:px-8 px-6 lg:py-4 pb-4 pt-0 rounded rounded-t-none">
                    <a href="{{ route('settings') }}" class="pb-2 block text-gray-600 hover:text-gray-900 font-medium ignore-body-click">Settings</a>
                    <a href="/logout" class="block text-gray-600 hover:text-gray-900 font-medium ignore-body-click">Logout</a>
                </div>
            </div>

        </div>
    </div>

</header>

@if ($errors->any())
    <div class="container mx-auto max-w-3xl mt-8">
        <div class="bg-red-500 text-white p-4 rounded-lg">
            <p class="font-bold">Please fix the following errors</p>
            <ul class="list-disc ml-8">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if (session('alert'))
    <div class="container mx-auto max-w-3xl mt-8">
        @php $alert_type = session('alert_type'); @endphp
        <div class="@if($alert_type == 'info'){{ 'bg-blue-400' }}@elseif($alert_type == 'success'){{ 'bg-green-400' }}@elseif($alert_type == 'error'){{ 'bg-red-400' }}@elseif($alert_type == 'warning'){{ 'bg-orange-400' }}@endif text-white p-4 rounded-lg" role="alert">
            <p class="font-bold">{{ ucfirst(session('alert_type')) }}</p>
            <p>{{ session('alert') }}</p>
        </div>
    </div>
@endif
