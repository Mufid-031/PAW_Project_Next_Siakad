@php
    $sidebarItems = [
        ['icon' => 'ionicon-home-outline', 'label' => 'Dashboard', 'href' => 'dashboard'],
        ['icon' => 'ionicon-people-outline', 'label' => 'Users', 'href' => 'users'],
        ['icon' => 'ionicon-book-outline', 'label' => 'Course', 'href' => 'course'],
        ['icon' => 'ionicon-calendar-outline', 'label' => 'Schedule ', 'href' => 'schedule'],
        ['icon' => 'ionicon-school-outline', 'label' => 'Lecture', 'href' => 'teacher'],
        ['icon' => 'ionicon-document-text-outline', 'label' => 'Grade', 'href' => 'grade'],
        ['icon' => 'ionicon-settings-outline', 'label' => 'Setting', 'href' => ''],
    ];
@endphp

<div x-data="{ sidebarOpen: false }" class="relative w-full">
    <div x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-x-full"
        x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform -translate-x-full"
        :class="{
            'w-[300px] md:w-[300px]': sidebarOpen,
            'w-[60px] md:w-[60px]': !sidebarOpen
        }"
        class="fixed z-40 h-full transition-all duration-500 ease-in-out overflow-hidden bg-ultramarine-900 block"
        :aria-hidden="!sidebarOpen">
        <ul class="text-slate-200">
            <div class="relative group mb-10">
                <span class="flex items-center gap-3 px-4 py-3 rounded-tl-[30px] rounded-bl-[30px]">
                    <span>
                        <x-fas-university
                            class="w-[2rem] transition-transform duration-300 transform group-hover:scale-110" />
                    </span>
                    <p class="text-xl font-medium" x-show="sidebarOpen" x-cloak>Sivitas</p>
                </span>
            </div>
            @foreach ($sidebarItems as $item)
                <li class="relative group">
                    <a href="/{{ $item['href'] }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-tl-[30px] rounded-bl-[30px] transition-all duration-300 group-hover:bg-white group-hover:text-ultramarine-900 {{ request()->is($item['href'] != '' ? $item['href'] : '/') ? 'bg-white text-ultramarine-900' : '' }}">
                        <span>
                            <x-dynamic-component :component="$item['icon']"
                                class="w-[1.75rem] transition-transform duration-300 transform group-hover:scale-110" />
                        </span>
                        <span class="text-lg font-medium " x-show="sidebarOpen" x-cloak>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Toggle Menu -->
    <div x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" @click="sidebarOpen = false"
        class="fixed inset-0 z-30 bg-black bg-opacity-50 md:hidden"></div>

    <!-- Main Content -->
    <div :class="{
        'w-full md:w-[calc(100%_-_300px)] md:left-[300px]': sidebarOpen,
        'w-full md:w-[calc(100%_-_60px)] md:left-[60px]': !sidebarOpen
    }"
        class="absolute min-h-screen transition-all duration-500 ease-in-out">

        <!-- Header -->
        <x-admin-navbar />

        {{ $slot }}

    </div>
</div>
