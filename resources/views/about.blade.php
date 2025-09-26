@extends('layouts.app')

@section('title', 'Tentang Kami - Tele Stunting')

@section('content')
    <section class="py-20 bg-gradient-to-br from-accent to-background">
        <div class="container mx-auto px-4">
            <div class="text-center space-y-6 max-w-4xl mx-auto">
                <h1 class="text-4xl lg:text-5xl font-bold text-balance">
                    Tentang <span class="text-primary">Tele Stunting</span>
                </h1>
                <p class="text-lg text-muted-foreground text-pretty">
                    Inovasi teknologi kesehatan untuk deteksi dini stunting dengan metode Fuzzy Tsukamoto yang akurat
                    dan mudah digunakan.
                </p>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-3xl font-bold text-balance">Misi Kami</h2>
                    <div class="space-y-4 text-muted-foreground leading-relaxed">
                        <p>
                            Tele Stunting hadir dengan misi untuk membantu orang tua Indonesia dalam memantau
                            tumbuh kembang anak secara dini dan akurat. Kami percaya bahwa setiap anak berhak
                            mendapatkan kesempatan tumbuh optimal.
                        </p>
                        <p>
                            Dengan memanfaatkan teknologi Fuzzy Tsukamoto, kami menyediakan platform yang
                            mudah digunakan untuk deteksi dini stunting, sehingga intervensi dapat dilakukan
                            sedini mungkin.
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="card p-4 text-center">
                            <div class="text-2xl font-bold text-primary">95%</div>
                            <div class="text-sm text-muted-foreground">Akurasi Diagnosis</div>
                        </div>
                        <div class="card p-4 text-center">
                            <div class="text-2xl font-bold text-secondary">1000+</div>
                            <div class="text-sm text-muted-foreground">Keluarga Terlayani</div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/relawan-stunting.webp') }}"
                         alt="Tim Tele Stunting"
                         class="w-full h-auto rounded-2xl shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-muted/20">
        <div class="container mx-auto px-4">
            <div class="text-center space-y-4 mb-16">
                <h2 class="text-3xl font-bold text-balance">Teknologi Fuzzy Tsukamoto</h2>
                <p class="text-lg text-muted-foreground text-pretty max-w-2xl mx-auto">
                    Metode diagnosis canggih yang memberikan hasil akurat berdasarkan multiple parameter kesehatan anak.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card p-8 text-center space-y-4">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto">
                        <i data-lucide="brain" class="h-8 w-8 text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Algoritma Cerdas</h3>
                    <p class="text-muted-foreground leading-relaxed">
                        Menggunakan logika fuzzy untuk menganalisis data antropometri dengan tingkat akurasi tinggi.
                    </p>
                </div>

                <div class="card p-8 text-center space-y-4">
                    <div class="w-16 h-16 bg-secondary/10 rounded-2xl flex items-center justify-center mx-auto">
                        <i data-lucide="activity" class="h-8 w-8 text-secondary"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Multi Parameter</h3>
                    <p class="text-muted-foreground leading-relaxed">
                        Mempertimbangkan tinggi badan, berat badan, usia, dan faktor lainnya untuk diagnosis
                        komprehensif.
                    </p>
                </div>

                <div class="card p-8 text-center space-y-4">
                    <div class="w-16 h-16 bg-accent rounded-2xl flex items-center justify-center mx-auto">
                        <i data-lucide="target" class="h-8 w-8 text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Hasil Akurat</h3>
                    <p class="text-muted-foreground leading-relaxed">
                        Memberikan hasil diagnosis yang dapat diandalkan dengan tingkat kepercayaan tinggi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="space-y-6">
                    <h2 class="text-3xl font-bold text-balance">Hubungi Kami</h2>
                    <p class="text-muted-foreground leading-relaxed">
                        Kami siap membantu Anda dalam memantau tumbuh kembang anak. Jangan ragu untuk menghubungi tim
                        kami
                        jika ada pertanyaan atau membutuhkan bantuan.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <i data-lucide="mail" class="h-5 w-5 text-primary"></i>
                            <span>info@telestunting.com</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i data-lucide="phone" class="h-5 w-5 text-primary"></i>
                            <span>+62 123 456 789</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i data-lucide="map-pin" class="h-5 w-5 text-primary"></i>
                            <span>Jakarta, Indonesia</span>
                        </div>
                    </div>
                </div>

                <div class="card p-8">
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name"
                                   class="w-full px-3 py-2 border border-input rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   placeholder="Masukkan nama lengkap Anda">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                   class="w-full px-3 py-2 border border-input rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   placeholder="Masukkan alamat email Anda">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium mb-2">Subjek</label>
                            <input type="text" id="subject" name="subject"
                                   class="w-full px-3 py-2 border border-input rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   placeholder="Subjek pesan Anda">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="4"
                                      class="w-full px-3 py-2 border border-input rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                      placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-full rounded-md">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
