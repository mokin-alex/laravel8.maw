<li class="nav-item {{ request()->routeIs('news.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.index') }}">{{ __('Новости') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('news.category.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.category.index') }}">{{ __('Рубрики') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('about')?'active':'' }}">
    <a class="nav-link" href="{{ route('about') }}">{{ __('О нас') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('vue')?'active':'' }}">
    <a class="nav-link" href="{{ route('vue') }}">{{ __('Vue') }}</a>
</li>

