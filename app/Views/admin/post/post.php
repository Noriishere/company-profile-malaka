<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">  

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold">Tambah Berita</h1>
        <p class="text-sm text-slate-500">
            Buat dan publish postingan berita
        </p>
    </div>

    <!-- FORM -->
    <form id="postForm"
        class="space-y-6 bg-white p-6 rounded-xl shadow-sm"
        enctype="multipart/form-data">

        <!-- JUDUL -->
        <div class="space-y-1">
            <label class="text-sm font-medium">Judul Berita <span class="text-red-500">*</span></label>
            <input
                type="text"
                placeholder="Masukkan judul berita"
                class="w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                name="title">
        </div>

        <!-- IMAGE -->
        <div class="space-y-1">
            <label class="text-sm font-medium">Gambar Utama <span class="text-red-500">*</span></label>
            <input type="file" name="image1" accept="image/*" class="w-full border px-3 py-2 bg-white" required />
            <p class="text-xs text-slate-500">
                Format JPG / PNG, max 2MB
            </p>
        </div>

        <!-- CONTENT -->
        <div class="space-y-1">
            <label class="text-sm font-medium">Isi Berita <span class="text-red-500">*</span></label>
            <textarea id="paragraph1" name="paragraph1"></textarea>
        </div>

        <!-- IMAGE 2 -->
        <div class="space-y-1">
            <label class="text-sm font-medium">Gambar Kedua <span class="text-gray-500">(Optional)</span></label>
            <input type="file" name="image2" accept="image/*" class="w-full border px-3 py-2 bg-white" />
            <p class="text-xs text-slate-500">
                Format JPG / PNG, max 2MB
            </p>
        </div>

        <!-- CONTENT -->
        <div class="space-y-1">
            <label class="text-sm font-medium">Isi Berita 2 <span class="text-gray-500">(Optional)</span></label>
            <textarea id="paragraph2" name="paragraph2"></textarea>
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
                Publish
            </button>
        </div>

    </form>

</div>
<script>
    document.getElementById('postForm').addEventListener('submit', function(e) {
        e.preventDefault();

        tinymce.triggerSave();

        const form = e.target;
        const formData = new FormData(form);

        if (!formData.get('image1') || !formData.get('image1').name) {
            alert('Gambar utama wajib diisi');
            return;
        }

        fetch('<?= BASE_URL ?>admin/post/store', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(res => {
                if (!res.success) {
                    alert(res.message || 'Gagal menyimpan berita');
                    return;
                }

                alert('Berita berhasil dipublish');
                window.location.href = '<?= BASE_URL ?>admin/post/index';
            })
            .catch(err => {
                console.error(err);
                alert('Terjadi kesalahan server');
            });
    });
</script>