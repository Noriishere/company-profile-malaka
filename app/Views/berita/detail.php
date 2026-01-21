<article class="max-w-4xl mx-auto px-6 py-12">

    <!-- JUDUL -->
    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
        <?= htmlspecialchars($data['post']['title']) ?>
    </h1>

    <!-- META -->
    <div class="text-sm text-gray-500 mb-8">
        Diposting pada
        <?= date('d F Y', strtotime($data['post']['created_at'])) ?>
    </div>

    <!-- GAMBAR UTAMA -->
    <?php if (!empty($data['post']['image1'])) : ?>
        <img
            src="/posts/uploads/<?= htmlspecialchars($data['post']['image1']) ?>"
            alt="<?= htmlspecialchars($data['post']['title']) ?>"
            class="w-full rounded-xl mb-8"
        >
    <?php endif; ?>

    <!-- ISI PARAGRAF 1 -->
    <div class="prose prose-lg max-w-none mb-10">
        <?= $data['post']['paragraph1'] ?>
    </div>

    <!-- GAMBAR KEDUA -->
    <?php if (!empty($data['post']['image2'])) : ?>
        <img
            src="/uploads/<?= htmlspecialchars($data['post']['image2']) ?>"
            class="w-full rounded-xl mb-8"
        >
    <?php endif; ?>

    <!-- ISI PARAGRAF 2 -->
    <?php if (!empty($data['post']['paragraph2'])) : ?>
        <div class="prose prose-lg max-w-none">
            <?= nl2br($data['post']['paragraph2']) ?>
        </div>
    <?php endif; ?>

    <!-- BACK -->
    <div class="mt-12">
        <a href="/berita" class="text-blue-600 font-medium">
            ← Kembali ke Berita
        </a>
    </div>

</article>