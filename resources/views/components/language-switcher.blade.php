<div class="relative group" x-data="{ open: false }">
    <button @click="open = !open" class="flex items-center gap-1 text-sm font-medium hover:text-blue-200 transition-colors">
        <span x-text="$store.language.current === 'en' ? 'English' : 'ไทย'">
            {{ $currentLocale === 'en' ? 'English' : 'ไทย' }}
        </span>
        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'transform rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg py-1 z-50">
        <a href="#" 
           @click.prevent="
               $store.language.change('en'); 
               open = false; 
               window.location.href = '{{ request()->fullUrlWithQuery(['lang' => 'en']) }}'" 
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 {{ $currentLocale === 'en' ? 'bg-blue-50 font-medium' : '' }}">
            English
        </a>
        <a href="#" 
           @click.prevent="
               $store.language.change('th'); 
               open = false; 
               window.location.href = '{{ request()->fullUrlWithQuery(['lang' => 'th']) }}'" 
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 {{ $currentLocale === 'th' ? 'bg-blue-50 font-medium' : '' }}">
            ไทย
        </a>
    </div>
</div>
