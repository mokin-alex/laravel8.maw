<li class="nav-item {{ request()->routeIs('news.')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.') }}">{{ __('Новости') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('admin.addNews')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.addNews') }}">{{ __('Add News') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('admin.addCategory')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.addCategory') }}">{{ __('Add Rubric') }}</a>
</li>
<li class="nav-item {{ request()->routeIs('admin.download.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.download.index') }}">{{ __('Downloads') }}</a>
</li>



