<nav class="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur">
    <div class="container mx-auto px-4">
        <div class="flex h-16 items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary">
                    <i data-lucide="heart" class="h-5 w-5 text-white"></i>
                </div>
                <span class="text-xl font-semibold text-foreground">Tele Stunting</span>
            </a>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                   class="text-sm font-medium transition-colors hover:text-primary {{ request()->routeIs('home') ? 'text-primary' : 'text-muted-foreground' }}">
                    Beranda
                </a>
                <a href="{{ route('edukasi') }}"
                   class="text-sm font-medium transition-colors hover:text-primary {{ request()->routeIs('edukasi') ? 'text-primary' : 'text-muted-foreground' }}">
                    Edukasi
                </a>
                <a href="{{ route('tentang') }}"
                   class="text-sm font-medium transition-colors hover:text-primary {{ request()->routeIs('tentang') ? 'text-primary' : 'text-muted-foreground' }}">
                    Tentang
                </a>
                <a href="{{route("filament.parent.auth.login")}}" class="btn btn-primary btn-sm rounded-full">
                    Mulai Sekarang
                </a>
            </div>

            <button id="mobile-menu-button"
                    class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-muted-foreground hover:text-foreground hover:bg-muted focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary"
                    onclick="toggleMobileMenu()">
                <i data-lucide="menu" class="h-5 w-5"></i>
                <i data-lucide="x" class="h-5 w-5" style="display: none;"></i>
            </button>
        </div>

        <div id="mobile-menu" class="md:hidden border-t py-4 hidden">
            <div class="flex flex-col space-y-4">
                <a href="{{ route('home') }}"
                   class="text-sm font-medium transition-colors hover:text-primary {{ request()->routeIs('home') ? 'text-primary' : 'text-muted-foreground' }}">
                    Beranda
                </a>
                <a href="{{ route('edukasi') }}"
                   class="text-sm font-medium transition-colors hover:text-primary {{ request()->routeIs('edukasi') ? 'text-primary' : 'text-muted-foreground' }}">
                    Edukasi
                </a>
                <a href="{{ route('tentang') }}"
                   class="text-sm font-medium transition-colors hover:text-primary {{ request()->routeIs('tentang') ? 'text-primary' : 'text-muted-foreground' }}">
                    Tentang
                </a>
                <a href="{{route("filament.parent.auth.login")}}" class="btn btn-primary btn-sm w-fit rounded-full">
                    Mulai Sekarang
                </a>
            </div>
        </div>
    </div>
</nav>
