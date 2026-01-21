<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">  

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold">Manajemen Berita</h1>
            <p class="text-sm text-slate-500">Kelola postingan berita</p>
        </div>

        <a href="<?= BASE_URL ?>admin/post/create"
            class="inline-flex items-center gap-2 bg-blue-600 text-white
                  px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
            + Tambah Berita
        </a>
    </div>

    <!-- CARD LIST -->
    <section id="post-list" class="space-y-4"></section>

    <!-- PAGINATION -->
    <div id="pagination" class="flex items-center justify-between text-sm text-slate-500"></div>

</div>

<script>
    let currentPage = 1;

    function fetchPosts(page = 1) {
        fetch(`?ajax=1&page=${page}`)
            .then(res => res.json())
            .then(res => {
                renderPosts(res.data);
                renderPagination(res.pagination);
                currentPage = page;
            });
    }

    function renderPosts(posts) {
        const el = document.getElementById('post-list');
        el.innerHTML = '';

        if (!posts.length) {
            el.innerHTML = `
            <div class="text-center text-slate-500 py-20">
                Belum ada berita
            </div>
        `;
            return;
        }

        posts.forEach(p => {
            el.innerHTML += `
        <article class="bg-white rounded-xl shadow-sm overflow-hidden flex flex-col md:flex-row">

            <div class="md:w-56 h-48 md:h-auto">
                <img src="<?= BASE_URL ?>posts/uploads/${p.image1}"
                     alt="${p.title}"
                     class="w-full h-full object-cover">
            </div>

            <div class="flex-1 p-5 flex flex-col justify-between gap-4">
                <div class="space-y-2">
                    <h2 class="text-lg font-semibold line-clamp-2">
                        ${p.title}
                    </h2>

                    <div class="text-sm text-slate-500 flex gap-4">
                        <span>👤 ${p.creator}</span>
                        <span>📅 ${formatDate(p.created_at)}</span>
                    </div>

                    <p class="text-sm text-slate-600 line-clamp-3">
                        ${stripHtml(p.paragraph1)}
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="/admin/post/edit/${p.id}"
                       class="text-sm font-medium text-blue-600 hover:underline">
                        Edit
                    </a>
                    <a href="#"
                    onclick="deletePost(${p.id}); return false;"
                    class="text-sm font-medium text-red-600 hover:underline">
                        Hapus
                    </a>
                </div>
            </div>
        </article>`;
        });
    }

    function deletePost(id) {
        if (!confirm('Yakin ingin menghapus berita ini?')) {
            return;
        }

        fetch(`<?= BASE_URL ?>admin/post/delete/${id}`, {
                method: 'POST'
            })
            .then(r => r.json())
            .then(r => {
                if (!r.success) {
                    alert(r.message);
                    return;
                }

                alert('Berita berhasil dihapus');
                location.reload();
            })
            .catch(err => {
                console.error(err);
                alert('Gagal menghapus berita');
            });
    }

    function renderPagination(p) {
        document.getElementById('pagination').innerHTML = `
        <span>Halaman ${p.current_page} dari ${p.last_page}</span>
        <div class="flex gap-2">
            <button onclick="fetchPosts(${p.current_page - 1})"
                ${p.current_page <= 1 ? 'disabled' : ''}
                class="px-3 py-1 border rounded bg-white disabled:opacity-50">
                Prev
            </button>
            <button onclick="fetchPosts(${p.current_page + 1})"
                ${p.current_page >= p.last_page ? 'disabled' : ''}
                class="px-3 py-1 border rounded bg-white disabled:opacity-50">
                Next
            </button>
        </div>
    `;
    }

    function stripHtml(html) {
        const d = document.createElement('div');
        d.innerHTML = html;
        return d.textContent || '';
    }

    function formatDate(date) {
        return new Date(date).toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        });
    }
    fetchPosts();
</script>