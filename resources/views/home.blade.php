@extends('layouts.app')

@section('title', 'Tele Stunting - Deteksi Dini Stunting pada Balita')

@section('content')
    <section class="relative overflow-hidden bg-gradient-to-br from-accent to-background py-20 lg:py-32">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="space-y-4">
                        <h1 class="text-4xl lg:text-6xl font-bold text-balance leading-tight">
                            Tele Stunting – <span class="text-primary">Deteksi Dini</span> Stunting pada Balita
                        </h1>
                        <p class="text-lg text-muted-foreground text-pretty leading-relaxed">
                            Membantu orang tua dalam memantau tumbuh kembang anak sejak dini dengan diagnosis berbasis
                            Fuzzy Tsukamoto.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{route("filament.parent.auth.login")}}" class="btn btn-primary btn-lg rounded-full text-base px-8 inline-flex items-center">
                            Mulai Sekarang
                            <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                        </a>
                        <a href="{{ route('edukasi') }}"
                           class="btn btn-outline btn-lg rounded-full text-base px-8 bg-transparent">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>

                    <div class="flex items-center space-x-6 pt-4">
                        <div class="flex items-center space-x-2">
                            <i data-lucide="check-circle" class="h-5 w-5 text-primary"></i>
                            <span class="text-sm text-muted-foreground">Diagnosis Akurat</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i data-lucide="shield" class="h-5 w-5 text-primary"></i>
                            <span class="text-sm text-muted-foreground">Data Aman</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i data-lucide="heart" class="h-5 w-5 text-primary"></i>
                            <span class="text-sm text-muted-foreground">Ramah Keluarga</span>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative bg-gradient-to-br from-primary/10 to-secondary/10 rounded-3xl p-8 lg:p-12">
                        <img src="{{ asset("images/family-with-doctor.jpg")  }}"
                             alt="Keluarga berkonsultasi dengan dokter tentang tumbuh kembang anak"
                             class="w-full h-auto rounded-2xl">

                        <div class="absolute -top-4 -right-4 bg-white rounded-2xl p-4 shadow-lg border">
                            <div class="flex items-center space-x-2">
                                <i data-lucide="trending-up" class="h-5 w-5 text-primary"></i>
                                <div>
                                    <div class="text-sm font-semibold">Pertumbuhan Normal</div>
                                    <div class="text-xs text-muted-foreground">+15% bulan ini</div>
                                </div>
                            </div>
                        </div>

                        <div class="absolute -bottom-4 -left-4 bg-white rounded-2xl p-4 shadow-lg border">
                            <div class="flex items-center space-x-2">
                                <i data-lucide="users" class="h-5 w-5 text-secondary"></i>
                                <div>
                                    <div class="text-sm font-semibold">1000+ Keluarga</div>
                                    <div class="text-xs text-muted-foreground">Telah terpantau</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-muted/20">
        <div class="container mx-auto px-4">
            <div class="text-center space-y-4 mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-balance">
                    Mengapa Memilih <span class="text-primary">Tele Stunting</span>?
                </h2>
                <p class="text-lg text-muted-foreground text-pretty max-w-2xl mx-auto">
                    Teknologi canggih yang mudah digunakan untuk memantau kesehatan dan pertumbuhan anak Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card border-0 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="p-8 text-center space-y-4">
                        <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto">
                            <i data-lucide="heart" class="h-8 w-8 text-primary"></i>
                        </div>
                        <h3 class="text-xl font-semibold">Deteksi Dini Akurat</h3>
                        <p class="text-muted-foreground leading-relaxed">
                            Menggunakan metode Fuzzy Tsukamoto untuk diagnosis yang lebih akurat dan dapat diandalkan.
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="p-8 text-center space-y-4">
                        <div class="w-16 h-16 bg-secondary/10 rounded-2xl flex items-center justify-center mx-auto">
                            <i data-lucide="shield" class="h-8 w-8 text-secondary"></i>
                        </div>
                        <h3 class="text-xl font-semibold">Mudah & Aman</h3>
                        <p class="text-muted-foreground leading-relaxed">
                            Interface yang ramah pengguna dengan keamanan data tingkat tinggi untuk melindungi privasi
                            keluarga.
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="p-8 text-center space-y-4">
                        <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mx-auto">
                            <i data-lucide="users" class="h-8 w-8 text-primary"></i>
                        </div>
                        <h3 class="text-xl font-semibold">Dukungan Keluarga</h3>
                        <p class="text-muted-foreground leading-relaxed">
                            Panduan lengkap dan edukasi untuk membantu orang tua memahami tumbuh kembang anak.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="bg-gradient-to-r from-primary to-secondary rounded-3xl p-8 lg:p-16 text-center text-white">
                <div class="max-w-3xl mx-auto space-y-6">
                    <h2 class="text-3xl lg:text-4xl font-bold text-balance">
                        Mulai Pantau Tumbuh Kembang Anak Anda Hari Ini
                    </h2>
                    <p class="text-lg opacity-90 text-pretty">
                        Bergabunglah dengan ribuan keluarga yang telah mempercayakan kesehatan anak mereka kepada Tele
                        Stunting.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                        <button
                            class="btn btn-lg rounded-full text-base px-8 bg-white text-primary hover:bg-white/90 inline-flex items-center">
                            Mulai Gratis Sekarang
                            <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                        </button>
                        <button
                            class="btn btn-outline btn-lg rounded-full text-base px-8 border-white/20 text-white hover:bg-white/10 bg-transparent">
                            Hubungi Kami
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
