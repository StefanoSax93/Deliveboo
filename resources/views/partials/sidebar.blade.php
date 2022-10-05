<div class="d-flex flex-column flex-shrink-0 h-100 p-3 text-bg-dark sidebar">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item h4">
            <a href="{{ route('admin.home') }}"
                class="nav-link {{ Request::route()->getName() === 'admin.home' ? 'active' : '' }}" aria-current="page">
                <i class="fa-solid fa-table-columns"></i>
                <span class="d-none d-md-inline">Dashboard</span>
            </a>
        </li>

        <li class="nav-item h4">
            <a href="{{ route('admin.dishes.index') }}"
                class="nav-link {{ Request::route()->getName() === 'admin.dishes.index' ? 'active' : '' }}" aria-current="page">
                <i class="fa-solid fa-pizza-slice"></i>
                <span class="d-none d-md-inline">Piatti</span>
            </a>
        </li>

        <li class="nav-item h4">
            <a href="{{ route('admin.orders.index') }}"
                class="nav-link {{ Request::route()->getName() === 'admin.orders.index' ? 'active' : '' }}" aria-current="page">
                <i class="fa-regular fa-clipboard"></i>
                <span class="d-none d-md-inline">Ordini</span>
            </a>
        </li>

        <li class="nav-item h4">
            <a href="{{ route('admin.dishes.trash') }}"
                class="nav-link {{ Request::route()->getName() === 'admin.dishes.trash' ? 'active' : '' }}" aria-current="page">
                <i class="fa-solid fa-trash"></i>
                <span class="d-none d-md-inline">Cestino</span>
            </a>
        </li>

        {{-- <li class="nav-item h4">
            <a href="{{ route('admin.orders.index') }}"
                class="nav-link {{ Request::route()->getName() === 'admin.posts.index' ? 'active' : '' }}" aria-current="page">
                <i class="fa-solid fa-clipboard"></i>
                Orders
            </a>
        </li> --}}

    </ul>
    
</div>