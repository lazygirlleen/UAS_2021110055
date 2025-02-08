@extends('layouts.app')

@section('content')

<div class="text-center mb-4">
    <h1 class="text-3xl font-bold text-teal">Selamat Datang di Teyvat Nexus</h1>
    <p class="text-gray-600 mt-2">Nikmati berbagai fitur menarik dari website kami!</p>
    <p class="text-gray-600 mt-2">Berikut merupakan fitur-fitur yang kami tawarkan</p>
</div>

<main class="grid w-full place-content-center bg-gray-100">

    <div x-data="imageSlider" x-init="startAutoSlide()" class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-4">

        <!-- Image Container -->
        <div class="relative h-80" style="width: 30rem">
            <template x-for="(image, index) in images" :key="index">
                <div x-show="currentIndex == index + 1"
                     x-transition:enter="transition transform duration-300"
                     x-transition:enter-start="opacity-0 scale-90"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition transform duration-300"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-90"
                     class="absolute top-0">
                    <img :src="image" alt="Slide Image" class="rounded-sm w-full h-full object-cover" />
                </div>
            </template>
        </div>
    </div>
</main>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("imageSlider", () => ({
            currentIndex: 1,
            images: [
                "{{ asset('storage/2.png') }}",
                "{{ asset('storage/3.png') }}",
                "{{ asset('storage/4.png') }}",
                "{{ asset('storage/5.png') }}",
                "{{ asset('storage/1.png') }}"
            ],
            interval: null,

            // Fungsi untuk slide berikutnya
            forward() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex++;
                } else {
                    this.currentIndex = 1;
                }
            },

            // Fungsi untuk memulai slide otomatis
            startAutoSlide() {
                this.interval = setInterval(() => {
                    this.forward();
                }, 3000); // Pindah slide setiap 3 detik
            },

            // Fungsi untuk menghentikan slide otomatis (jika dibutuhkan)
            stopAutoSlide() {
                clearInterval(this.interval);
            }
        }));
    });
</script>

<style>
    /* Gradasi untuk counter display */
    .bg-gradient-to-r {
        background: linear-gradient(to right, #2563eb, #1d4ed8);
    }

    /* Animasi counter display */
    .counter-animated {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
</style>

@endsection

