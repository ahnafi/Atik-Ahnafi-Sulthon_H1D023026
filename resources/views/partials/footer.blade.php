<footer class="bg-muted/20 py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg">
                        <img src="{{ asset('logo.png') }}" alt="Tele Stunting Logo" class=" text-white">
                    </div>
                    <span class="text-xl font-semibold">Tele Stunting</span>
                </div>
                <p class="text-sm text-muted-foreground leading-relaxed">
                    Membantu orang tua memantau tumbuh kembang anak dengan teknologi diagnosis Fuzzy Tsukamoto yang
                    akurat.
                </p>
            </div>


            <div class="space-y-4">
                <h3 class="font-semibold">Navigasi</h3>
                <div class="space-y-2">
                    <a href="{{ route('home') }}"
                       class="block text-sm text-muted-foreground hover:text-primary transition-colors">
                        Beranda
                    </a>
                    <a href="{{ route('edukasi') }}"
                       class="block text-sm text-muted-foreground hover:text-primary transition-colors">
                        Edukasi
                    </a>
                    <a href="{{ route('tentang') }}"
                       class="block text-sm text-muted-foreground hover:text-primary transition-colors">
                        Tentang
                    </a>
                </div>
            </div>


            <div class="space-y-4">
                <h3 class="font-semibold">Dukungan</h3>
                <div class="space-y-2">
                    <a href="#" class="block text-sm text-muted-foreground hover:text-primary transition-colors">
                        Bantuan
                    </a>
                    <a href="#" class="block text-sm text-muted-foreground hover:text-primary transition-colors">
                        FAQ
                    </a>
                    <a href="#" class="block text-sm text-muted-foreground hover:text-primary transition-colors">
                        Kontak
                    </a>
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="font-semibold">Kontak</h3>
                <div class="space-y-2">
                    <p class="text-sm text-muted-foreground">
                        Email: info@telestunting.com
                    </p>
                    <p class="text-sm text-muted-foreground">
                        Telepon: +62 123 456 789
                    </p>
                </div>
            </div>
        </div>

        <div class="border-t mt-12 pt-8 text-center">
            <p class="text-sm text-muted-foreground">
                © {{ date('Y') }} Tele Stunting. Semua hak dilindungi.
            </p>
        </div>
    </div>
</footer>
