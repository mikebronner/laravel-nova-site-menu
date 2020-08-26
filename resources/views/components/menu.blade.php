<div class="{{ $class }}">

    @foreach ($menuItems as $menuItem)
        <x-menu-item
            :model="$menuItem"
        />
    @endif

</div>
