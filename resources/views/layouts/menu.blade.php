<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="fa-solid fa-unlock"></i>
        <p>Administracja</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('blogs.index') }}" class="nav-link {{ Request::is('blogs*') ? 'active' : '' }}">
        <i class="fa-regular fa-newspaper"></i>
        <p>Blog</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('fAQS.index') }}" class="nav-link {{ Request::is('fAQS*') ? 'active' : '' }}">
        <i class="fa-regular fa-circle-question"></i>
        <p>FAQ</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('testimonials.index') }}" class="nav-link {{ Request::is('testimonials*') ? 'active' : '' }}">
        <i class="fa-solid fa-check-to-slot"></i>
        <p>Opinie</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('pages.index') }}" class="nav-link {{ Request::is('pages*') ? 'active' : '' }}">
        <i class="fa-solid fa-globe"></i>
        <p>Strony</p>
    </a>
</li>

