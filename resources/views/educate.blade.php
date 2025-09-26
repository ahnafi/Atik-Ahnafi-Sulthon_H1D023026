@extends('layouts.app')

@section('title', 'Edukasi Stunting - Tele Stunting')

@section('content')
    <section class="py-20 bg-gradient-to-br from-accent to-background">
        <div class="container mx-auto px-4">
            <div class="text-center space-y-6 max-w-4xl mx-auto">
                <h1 class="text-4xl lg:text-5xl font-bold text-balance">
                    Edukasi <span class="text-primary">Stunting</span>
                </h1>
                <p class="text-lg text-muted-foreground text-pretty">
                    Pelajari lebih lanjut tentang stunting, penyebab, dampak, dan cara pencegahannya untuk kesehatan optimal anak Anda.
                </p>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-3xl font-bold text-balance">Apa itu Stunting?</h2>
                    <div class="space-y-4 text-muted-foreground leading-relaxed">
                        <p>
                            Stunting adalah kondisi gagal tumbuh pada anak balita akibat kekurangan gizi kronis,
                            terutama dalam 1000 hari pertama kehidupan (dari janin hingga anak berusia 2 tahun).
                        </p>
                        <p>
                            Anak yang mengalami stunting memiliki tinggi badan yang lebih pendek dari standar
                            usianya dan dapat berdampak pada perkembangan kognitif serta produktivitas di masa depan.
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="card p-4 text-center">
                            <div class="text-2xl font-bold text-primary">21.6%</div>
                            <div class="text-sm text-muted-foreground">Prevalensi Stunting di Indonesia</div>
                        </div>
                        <div class="card p-4 text-center">
                            <div class="text-2xl font-bold text-secondary">1000</div>
                            <div class="text-sm text-muted-foreground">Hari Pertama Kritis</div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/infografis-stunting.webp') }}"
                         alt="Infografis tentang stunting"
                         class="w-full h-auto rounded-2xl shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-muted/20">
        <div class="container mx-auto px-4">
            <div class="text-center space-y-4 mb-16">
                <h2 class="text-3xl font-bold text-balance">Penyebab Stunting</h2>
                <p class="text-lg text-muted-foreground text-pretty max-w-2xl mx-auto">
                    Memahami penyebab stunting adalah langkah pertama dalam pencegahan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="card p-6 text-center space-y-4">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto">
                        <i data-lucide="utensils" class="h-6 w-6 text-red-600"></i>
                    </div>
                    <h3 class="font-semibold">Kekurangan Gizi</h3>
                    <p class="text-sm text-muted-foreground">
                        Asupan nutrisi yang tidak memadai selama kehamilan dan masa balita.
                    </p>
                </div>

                <div class="card p-6 text-center space-y-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mx-auto">
                        <i data-lucide="droplets" class="h-6 w-6 text-blue-600"></i>
                    </div>
                    <h3 class="font-semibold">Sanitasi Buruk</h3>
                    <p class="text-sm text-muted-foreground">
                        Lingkungan yang tidak bersih dapat menyebabkan infeksi berulang.
                    </p>
                </div>

                <div class="card p-6 text-center space-y-4">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto">
                        <i data-lucide="baby" class="h-6 w-6 text-green-600"></i>
                    </div>
                    <h3 class="font-semibold">Pola Asuh</h3>
                    <p class="text-sm text-muted-foreground">
                        Kurangnya pengetahuan tentang pemberian ASI dan MPASI yang tepat.
                    </p>
                </div>

                <div class="card p-6 text-center space-y-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mx-auto">
                        <i data-lucide="stethoscope" class="h-6 w-6 text-purple-600"></i>
                    </div>
                    <h3 class="font-semibold">Akses Kesehatan</h3>
                    <p class="text-sm text-muted-foreground">
                        Terbatasnya akses ke layanan kesehatan yang berkualitas.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center space-y-4 mb-16">
                <h2 class="text-3xl font-bold text-balance">Cara Mencegah Stunting</h2>
                <p class="text-lg text-muted-foreground text-pretty max-w-2xl mx-auto">
                    Pencegahan stunting dapat dilakukan dengan langkah-langkah sederhana namun konsisten.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white text-sm font-semibold">1</span>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">Perbaikan Gizi Ibu Hamil</h3>
                            <p class="text-muted-foreground text-sm">
                                Pastikan ibu hamil mendapat asupan gizi yang cukup, terutama protein, zat besi, dan asam folat.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white text-sm font-semibold">2</span>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">ASI Eksklusif 6 Bulan</h3>
                            <p class="text-muted-foreground text-sm">
                                Berikan ASI eksklusif selama 6 bulan pertama tanpa makanan atau minuman tambahan.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white text-sm font-semibold">3</span>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">MPASI Bergizi</h3>
                            <p class="text-muted-foreground text-sm">
                                Berikan makanan pendamping ASI yang bergizi seimbang mulai usia 6 bulan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white text-sm font-semibold">4</span>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">Pemantauan Rutin</h3>
                            <p class="text-muted-foreground text-sm">
                                Lakukan pemeriksaan kesehatan dan tumbuh kembang anak secara rutin ke posyandu atau puskesmas.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white text-sm font-semibold">5</span>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">Sanitasi & Kebersihan</h3>
                            <p class="text-muted-foreground text-sm">
                                Jaga kebersihan lingkungan dan praktikkan cuci tangan yang benar untuk mencegah infeksi.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-secondary rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white text-sm font-semibold">6</span>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">Edukasi Berkelanjutan</h3>
                            <p class="text-muted-foreground text-sm">
                                Terus belajar tentang pola asuh yang baik dan konsultasi dengan tenaga kesehatan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-r from-primary to-secondary">
        <div class="container mx-auto px-4">
            <div class="text-center text-white space-y-6">
                <h2 class="text-3xl font-bold text-balance">
                    Mulai Deteksi Dini dengan Tele Stunting
                </h2>
                <p class="text-lg opacity-90 text-pretty max-w-2xl mx-auto">
                    Gunakan teknologi Fuzzy Tsukamoto untuk memantau tumbuh kembang anak Anda secara akurat dan mudah.
                </p>
                <a href="{{route("filament.parent.auth.login")}}" class="btn btn-lg rounded-full text-base px-8 bg-white text-primary hover:bg-white/90 inline-flex items-center">
                    Mulai Sekarang
                    <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 bg-muted/20">
        <div class="container mx-auto px-4">
            <div class="text-center space-y-4 mb-16">
                <h2 class="text-3xl font-bold text-balance">Standar Pertumbuhan WHO</h2>
                <p class="text-lg text-muted-foreground text-pretty max-w-2xl mx-auto">
                    Unduh referensi standar pertumbuhan anak dari World Health Organization (WHO) untuk memantau tumbuh kembang anak.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Weight for Age (WFA) -->
                <div class="card p-6 space-y-6">
                    <div class="text-center space-y-2">
                        <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto">
                            <i data-lucide="scale" class="h-8 w-8 text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-bold">Weight for Age (WFA)</h3>
                        <p class="text-sm text-muted-foreground">
                            Standar berat badan menurut umur untuk anak 0-5 tahun
                        </p>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-muted/50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="male" class="h-4 w-4 text-white"></i>
                                </div>
                                <span class="font-medium">Laki-laki (0-5 tahun)</span>
                            </div>
                            <a href="https://cdn.who.int/media/docs/default-source/child-growth/child-growth-standards/indicators/weight-for-age/wfa_boys_0-to-5-years_zscores.xlsx?sfvrsn=97a05331_9"
                               target="_blank"
                               class="btn btn-sm bg-blue-500 hover:bg-blue-600 text-white">
                                <i data-lucide="download" class="h-4 w-4 mr-1"></i>
                                Download
                            </a>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-muted/50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center">
                                    <i data-lucide="female" class="h-4 w-4 text-white"></i>
                                </div>
                                <span class="font-medium">Perempuan (0-5 tahun)</span>
                            </div>
                            <a href="https://cdn.who.int/media/docs/default-source/child-growth/child-growth-standards/indicators/weight-for-age/wfa_girls_0-to-5-years_zscores.xlsx?sfvrsn=4c03b8db_7"
                               target="_blank"
                               class="btn btn-sm bg-pink-500 hover:bg-pink-600 text-white">
                                <i data-lucide="download" class="h-4 w-4 mr-1"></i>
                                Download
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Length/Height for Age (LHFA) -->
                <div class="card p-6 space-y-6">
                    <div class="text-center space-y-2">
                        <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto">
                            <i data-lucide="ruler" class="h-8 w-8 text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-bold">Length/Height for Age (LHFA)</h3>
                        <p class="text-sm text-muted-foreground">
                            Standar tinggi/panjang badan menurut umur untuk anak 0-5 tahun
                        </p>
                    </div>

                    <div class="space-y-3">
                        <div class="space-y-2">
                            <h4 class="font-medium text-sm text-muted-foreground">Laki-laki</h4>
                            <div class="grid grid-cols-1 gap-2">
                                <div class="flex items-center justify-between p-3 bg-muted/50 rounded-lg">
                                    <span class="text-sm">0-2 tahun</span>
                                    <a href="https://cdn.who.int/media/docs/default-source/child-growth/child-growth-standards/indicators/length-height-for-age/lhfa_boys_0-to-2-years_zscores.xlsx?sfvrsn=30e044c_9"
                                       target="_blank"
                                       class="btn btn-sm bg-green-500 hover:bg-green-600 text-white">
                                        <i data-lucide="download" class="h-4 w-4 mr-1"></i>
                                        Download
                                    </a>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-muted/50 rounded-lg">
                                    <span class="text-sm">2-5 tahun</span>
                                    <a href="https://cdn.who.int/media/docs/default-source/child-growth/child-growth-standards/indicators/length-height-for-age/lhfa_boys_2-to-5-years_zscores.xlsx?sfvrsn=17e5ad91_9"
                                       target="_blank"
                                       class="btn btn-sm bg-green-500 hover:bg-green-600 text-white">
                                        <i data-lucide="download" class="h-4 w-4 mr-1"></i>
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <h4 class="font-medium text-sm text-muted-foreground">Perempuan</h4>
                            <div class="grid grid-cols-1 gap-2">
                                <div class="flex items-center justify-between p-3 bg-muted/50 rounded-lg">
                                    <span class="text-sm">0-2 tahun</span>
                                    <a href="https://cdn.who.int/media/docs/default-source/child-growth/child-growth-standards/indicators/length-height-for-age/lhfa_girls_0-to-2-years_zscores.xlsx?sfvrsn=e9e66a95_11"
                                       target="_blank"
                                       class="btn btn-sm bg-pink-500 hover:bg-pink-600 text-white">
                                        <i data-lucide="download" class="h-4 w-4 mr-1"></i>
                                        Download
                                    </a>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-muted/50 rounded-lg">
                                    <span class="text-sm">2-5 tahun</span>
                                    <a href="https://cdn.who.int/media/docs/default-source/child-growth/child-growth-standards/indicators/length-height-for-age/lhfa_girls_2-to-5-years_zscores.xlsx?sfvrsn=2ec187b9_11"
                                       target="_blank"
                                       class="btn btn-sm bg-pink-500 hover:bg-pink-600 text-white">
                                        <i data-lucide="download" class="h-4 w-4 mr-1"></i>
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <div class="inline-flex items-center space-x-2 text-sm text-muted-foreground bg-muted/30 px-4 py-2 rounded-full">
                    <i data-lucide="info" class="h-4 w-4"></i>
                    <span>Data standar pertumbuhan resmi dari World Health Organization (WHO)</span>
                </div>
            </div>
        </div>
    </section>

@endsection
