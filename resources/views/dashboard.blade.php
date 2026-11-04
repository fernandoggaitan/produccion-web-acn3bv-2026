<x-layouts.app :title="__('Dashboard')">
    
    <h1 class="mb-3"> {{ __('welcome.welcome') }} </h1>

    <ul>
        <li>  
            <a href="{{ route('greeting', 'en') }}"> English </a>
        </li>
        <li>  
            <a href="{{ route('greeting', 'es') }}"> Español </a>
        </li>
    </ul>

</x-layouts.app>
