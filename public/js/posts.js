let currentPage = 1;

function loadPosts(page = 1) {
  fetch(`/api/posts.php?page=${page}`)
    .then(res => res.json())
    .then(res => {

      const banner = document.getElementById('banner');
      const posts = document.getElementById('posts');
      const pagination = document.getElementById('pagination');

      banner.innerHTML = '';
      posts.innerHTML = '';
      pagination.innerHTML = '';

      if (!res.data || res.data.length === 0) {
        posts.innerHTML = '<p class="text-center text-gray-500">Tidak ada berita.</p>';
        return;
      }

      // =========================
      // 1️⃣ POST PERTAMA = BANNER
      // =========================
      const first = res.data[0];

      banner.innerHTML = `
        <article class="relative w-full h-[350px] md:h-[500px] rounded-3xl overflow-hidden group cursor-pointer shadow-xl border border-gray-200">
          
          <div class="absolute inset-0 w-full h-full">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent z-10"></div>
            <img src="/posts/uploads/${first.thumbnail}" 
                 class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
          </div>

          <div class="absolute bottom-0 left-0 w-full p-6 md:p-10 z-20">
            <h1 class="text-2xl md:text-4xl font-extrabold text-white leading-tight mb-3 group-hover:text-blue-200 transition-colors">
              ${first.title}
            </h1>

            <p class="text-slate-300 text-xs md:text-sm font-semibold">
              ${first.creator} • ${new Date(first.created_at).toLocaleDateString()}
            </p>

            <a href="/berita/detail/${first.id}" 
               class="inline-block mt-4 text-white font-semibold underline">
               Baca selengkapnya →
            </a>
          </div>
        </article>
      `;

      // =========================
      // 2️⃣ SISANYA = GRID
      // =========================
      const rest = res.data.slice(1);

      rest.forEach(post => {
        posts.innerHTML += `
          <article class="bg-white rounded-xl shadow overflow-hidden hover:shadow-lg transition-all">
            <img src="/posts/uploads/${post.thumbnail}" 
                 class="h-56 w-full object-cover">
            <div class="p-6">
              <h2 class="text-xl font-semibold mb-2">${post.title}</h2>
              <p class="text-sm text-gray-500 mb-3">
                ${post.creator} • ${new Date(post.created_at).toLocaleDateString()}
              </p>
              <div class="text-gray-700 line-clamp-3 [&>p]:inline [&>p]:mr-1">
                ${post.paragraph}
              </div>
              <a href="/berita/detail/${post.id}"
                 class="inline-block mt-4 text-blue-600 font-medium">
                Baca selengkapnya →
              </a>
            </div>
          </article>
        `;
      });

      // =========================
      // 3️⃣ PAGINATION
      // =========================
      for (let i = 1; i <= res.pagination.last_page; i++) {
        pagination.innerHTML += `
          <button
            onclick="loadPosts(${i})"
            class="px-4 py-2 rounded ${
              i === res.pagination.current_page
                ? 'bg-blue-600 text-white'
                : 'bg-gray-200 hover:bg-gray-300'
            }">
            ${i}
          </button>
        `;
      }

    });
}

loadPosts();