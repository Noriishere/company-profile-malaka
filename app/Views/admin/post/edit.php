<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">  

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold">Edit Berita dengan judul <i>"<?= htmlspecialchars($post['title']) ?>"</i></h1>
            <p class="text-sm text-slate-500">Ubah deskripsi berita</p>
        </div>
    </div>
    <form id="editForm"
        enctype="multipart/form-data"
        class="space-y-6 bg-white p-6 rounded-xl shadow-sm">

        <!-- JUDUL -->
        <div class="space-y-1">
            <label class="text-sm font-medium">
                Judul Berita <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                name="title"
                value="<?= htmlspecialchars($post['title']) ?>"
                class="w-full rounded-lg border px-4 py-2
                   focus:outline-none focus:ring focus:ring-blue-200"
                required>
        </div>

        <!-- IMAGE 1 -->
        <div class="space-y-2">
            <label class="text-sm font-medium">
                Gambar Utama <span class="text-red-500">*</span>
            </label>

            <!-- preview -->
            <img
                src="<?= BASE_URL ?>posts/uploads/<?= $post['image1'] ?>"
                class="h-32 rounded-lg border object-cover">

            <input
                type="file"
                name="image1"
                accept="image/*"
                class="w-full border px-3 py-2 bg-white">

            <p class="text-xs text-slate-500">
                Kosongkan jika tidak ingin mengganti gambar
            </p>
        </div>

        <!-- CONTENT 1 -->
        <div class="space-y-1">
            <label class="text-sm font-medium">
                Isi Berita <span class="text-red-500">*</span>
            </label>
            <textarea id="paragraph1"
                name="paragraph1"><?= $post['paragraph1'] ?></textarea>
        </div>

        <!-- IMAGE 2 -->
        <div class="space-y-2">
            <label class="text-sm font-medium">
                Gambar Kedua <span class="text-gray-500">(Optional)</span>
            </label>

            <?php if (!empty($post['image2'])): ?>
                <img
                    src="<?= BASE_URL ?>posts/uploads/<?= $post['image2'] ?>"
                    class="h-32 rounded-lg border object-cover">
            <?php endif; ?>

            <input
                type="file"
                name="image2"
                accept="image/*"
                class="w-full border px-3 py-2 bg-white">

            <p class="text-xs text-slate-500">
                Kosongkan jika tidak ingin mengganti gambar
            </p>
        </div>

        <!-- CONTENT 2 -->
        <div class="space-y-1">
            <label class="text-sm font-medium">
                Isi Berita 2 <span class="text-gray-500">(Optional)</span>
            </label>
            <textarea id="paragraph2"
                name="paragraph2"><?= $post['paragraph2'] ?></textarea>
        </div>

        <!-- ACTIONS -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t">
            <a
                href="<?= BASE_URL ?>admin/post/index"
                class="px-4 py-2 text-sm rounded-lg border hover:bg-slate-50">
                Batal
            </a>

            <button
                type="submit"
                class="px-5 py-2 text-sm font-medium rounded-lg
                   bg-blue-600 text-white hover:bg-blue-700">
                Update
            </button>
        </div>

    </form>
</div>
<script>
    tinymce.init({
        selector: '#paragraph1, #paragraph2',
        height: 300,
        menubar: false,
        plugins: 'lists link code fullscreen',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link | fullscreen'
    });

    document.getElementById('editForm').addEventListener('submit', e => {
        e.preventDefault();
        tinymce.triggerSave();

        const fd = new FormData(e.target);

        fetch('<?= BASE_URL ?>admin/post/update/<?= $post['id'] ?>', {
                method: 'POST',
                body: fd
            })
            .then(r => r.json())
            .then(r => {
                if (!r.success) return alert(r.message);
                alert('Berhasil diupdate');
                location.href = '<?= BASE_URL ?>admin/post/index';
            });
    });
</script>