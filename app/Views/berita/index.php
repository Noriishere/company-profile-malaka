<section class="w-full py-10 bg-white min-h-screen">
    <div class="container mx-auto px-4 lg:px-8 flex flex-col min-h-[85vh]">

        <div class="text-left mb-8">
            <h4 class="text-primary font-bold tracking-widest uppercase text-xs mb-2">BERITA TERKINI</h4>
            <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900">
                Berita <span class="text-primary">MALAKA</span>
            </h2>
            <div class="w-24 h-1.5 bg-primary mt-4 rounded-full"></div>
        </div>

        <!-- ================= BANNER ================= -->
        <div id="banner" class="w-full mb-12">
            <div class="animate-pulse bg-gray-200 h-[400px] rounded-3xl"></div>
        </div>

        <!-- ================= GRID ================= -->
        <div 
            id="posts"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 mb-12 flex-grow content-start"
        >
            <!-- Skeleton -->
            <div class="animate-pulse bg-gray-200 h-64 rounded-3xl"></div>
            <div class="animate-pulse bg-gray-200 h-64 rounded-3xl"></div>
            <div class="animate-pulse bg-gray-200 h-64 rounded-3xl"></div>
        </div>

        <!-- ================= PAGINATION ================= -->
        <div id="pagination" class="mt-auto pt-8 pb-4 flex justify-center items-center gap-2"></div>

    </div>
</section>

<script src="/js/posts.js"></script>