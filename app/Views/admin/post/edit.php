<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold">Edit Berita</h1>
        <p class="text-sm text-slate-500">
            Ubah dan perbarui postingan berita
        </p>
    </div>

    <!-- FORM -->
    <form id="editForm"
        class="space-y-6 bg-white p-6 rounded-xl shadow-sm"
        enctype="multipart/form-data">

        <!-- JUDUL -->
        <div class="space-y-1">
            <label class="text-sm font-medium">
                Judul Berita <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                name="title"
                value="<?= htmlspecialchars($post['title']) ?>"
                required
                class="w-full rounded-lg border px-4 py-2
                       focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <!-- KATEGORI -->
        <div class="space-y-1">
            <select
                name="category"
                required
                class="w-full rounded-lg border px-4 py-2 bg-white
               focus:outline-none focus:ring focus:ring-blue-200">

                <option value="" disabled selected>-- Pilih Kategori --</option>
                <option value="UKM">UKM</option>
                <option value="Sekolah">Sekolah</option>
                <option value="Event">Event</option>
                <option value="Pengumuman">Pengumuman</option>
                <option value="Prestasi">Prestasi</option>
            </select>
        </div>

        <!-- THUMBNAIL -->
        <div class="space-y-1">
            <label class="text-sm font-medium">
                Thumbnail <span class="text-gray-500">(Kosongkan jika tidak diganti)</span>
            </label>

            <!-- Preview lama -->
            <img
                src="<?= BASE_URL ?>posts/uploads/<?= $post['thumbnail'] ?>"
                class="h-32 rounded-lg border object-cover mb-2">

            <input
                type="file"
                name="thumbnail"
                accept="image/*"
                class="w-full border px-3 py-2 bg-white">

            <p class="text-xs text-slate-500">
                Format JPG / PNG, max 2MB
            </p>
        </div>

        <!-- CONTENT -->
        <div class="space-y-1">
            <label class="text-sm font-medium">
                Isi Berita <span class="text-red-500">*</span>
            </label>
            <textarea id="paragraph"
                name="paragraph"><?= $post['paragraph'] ?></textarea>
        </div>

        <!-- ACTIONS -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t">
            <a href="<?= BASE_URL ?>admin/post/index"
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
        selector: '#paragraph',
        height: 300,
        menubar: false,
        plugins: 'lists link code fullscreen',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link | fullscreen'
    });

    document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault();

        tinymce.triggerSave();

        const formData = new FormData(this);

        fetch('<?= BASE_URL ?>admin/post/update/<?= $post['id'] ?>', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(res => {
                if (!res.success) {
                    alert(res.message || 'Gagal update berita');
                    return;
                }

                alert('Berita berhasil diupdate');
                window.location.href = '<?= BASE_URL ?>admin/post/index';
            })
            .catch(() => {
                alert('Terjadi kesalahan server');
            });
    });
</script>