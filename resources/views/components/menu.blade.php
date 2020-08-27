<div
    class="{{ $class }}"
>

    @foreach ($menuItems as $menuItem)
        <x-menu-item
            :class="$itemClass"
            :activeClass="$itemActiveClass"
            :menuItem="$menuItem"
        />
    @endforeach

</div>
