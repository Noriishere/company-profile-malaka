<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8 text-slate-800">

    <!-- HEADER -->
    <div class="mb-10">
        <h1 class="text-4xl font-extrabold tracking-wide bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
            Visitor Analytics
        </h1>
        <p class="text-slate-500 mt-2 text-sm">
            Insight traffic pengunjung website MALAKA
        </p>
    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        <!-- TOTAL -->
        <div class="relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-lg transition duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-100 blur-3xl rounded-full"></div>
            <p class="text-sm text-slate-500">Total Visitor</p>
            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                <?= number_format($data['totalVisitors']) ?>
            </h2>
        </div>

        <!-- TODAY -->
        <div class="relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-lg transition duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 bg-green-100 blur-3xl rounded-full"></div>
            <p class="text-sm text-slate-500">Visitor Hari Ini</p>
            <h2 class="text-4xl font-bold text-green-600 mt-2">
                <?= number_format($data['todayVisitors']) ?>
            </h2>
        </div>

        <!-- STATUS -->
        <div class="relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-lg transition duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 bg-purple-100 blur-3xl rounded-full"></div>
            <p class="text-sm text-slate-500">Status Traffic</p>
            <h2 class="text-3xl font-bold text-purple-600 mt-2">
                Stabil 🚀
            </h2>
        </div>

    </div>

    <!-- CHART SECTION -->
    <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-lg">

        <h3 class="text-xl font-bold mb-6 text-slate-800 tracking-wide">
            Traffic 7 Hari Terakhir
        </h3>

        <canvas id="visitorChart"></canvas>

    </div>

</div>