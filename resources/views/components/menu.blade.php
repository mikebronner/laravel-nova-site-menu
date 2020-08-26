<div class="{{ $class }}">

    @foreach ($menuItems as $menuItem)
        <x-menu-item
            :menuItem="$menuItem"
        />
    @endforeach

</div>
