let currentPage = 1;
function loadPosts(page = 1) {
  fetch(`/api/posts.php?page=${page}`)
    .then(res => res.json())
    .then(res => {
      const posts = document.getElementById('posts');
      const pagination = document.getElementById('pagination');

      posts.innerHTML = '';
      pagination.innerHTML = '';

      res.data.forEach(post => {
        posts.innerHTML += `
          <article class="bg-white rounded-xl shadow overflow-hidden">
            <img src="/posts/uploads/${post.image1}" class="h-56 w-full object-cover">
            <div class="p-6">
              <h2 class="text-xl font-semibold mb-2">${post.title}</h2>
              <p class="text-sm text-gray-500 mb-3">
                ${post.creator} • ${new Date(post.created_at).toLocaleDateString()}
              </p>
              <p class="text-gray-700 line-clamp-3">
                ${post.paragraph1}
              </p>
              <a href="/berita/detail/${post.id}"
                 class="inline-block mt-4 text-blue-600 font-medium">
                Baca selengkapnya →
              </a>
            </div>
          </article>
        `;
      });

      for (let i = 1; i <= res.pagination.last_page; i++) {
        pagination.innerHTML += `
          <button
            onclick="loadPosts(${i})"
            class="px-4 py-2 rounded ${
              i === res.pagination.current_page
                ? 'bg-blue-600 text-white'
                : 'bg-gray-200'
            }">
            ${i}
          </button>
        `;
      }
    });
}

loadPosts();