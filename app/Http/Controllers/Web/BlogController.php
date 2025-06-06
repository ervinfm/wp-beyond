<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    private string $defaultBlogImage = '/images/blog/default.jpg';
    private string $defaultAuthorAvatar = '/images/users/avatars/default-image.jpg';
    /**
     * Menampilkan halaman daftar artikel (Indeks Blog).
     */
    public function index(Request $request)
    {
        // 1. Ambil 3 artikel untuk bagian highlight/kolase
        $highlightedPosts = Post::with(['user:id,name', 'category:id,name,slug'])
            ->where('status', 'PUBLISHED')
            ->where('published_at', '<=', now())
            ->orderByDesc('is_featured') // Tampilkan yang featured dulu
            ->orderByDesc('published_at')
            ->take(3)
            ->get()
            ->map(fn ($post) => $this->transformPostData($post));

        // 2. Ambil ID dari artikel highlight agar tidak muncul lagi di daftar bawah
        $highlightedPostIds = $highlightedPosts->pluck('id');

        // 3. Ambil sisa artikel dengan pagination
        $posts = Post::with(['user:id,name', 'category:id,name,slug'])
            ->where('status', 'PUBLISHED')
            ->where('published_at', '<=', now())
            ->whereNotIn('id', $highlightedPostIds) // Kecualikan artikel highlight
            ->orderByDesc('published_at')
            ->paginate(6) // Misalnya 6 artikel per halaman
            ->through(fn ($post) => $this->transformPostData($post));

        // 4. Ambil semua kategori yang memiliki post published
        $categories = Category::whereHas('posts', function ($query) {
                $query->where('status', 'PUBLISHED')->where('published_at', '<=', now());
            })
            ->withCount(['posts' => function ($query) {
                $query->where('status', 'PUBLISHED')->where('published_at', '<=', now());
            }])
            ->orderBy('name', 'asc')
            ->get(['id', 'name', 'slug']);

        return Inertia::render('Web/Blog/Index', [
            'highlightedPosts' => $highlightedPosts,
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

     public function show(Post $post) // Gunakan Route Model Binding untuk kemudahan
    {
        // Pastikan post yang diakses sudah published
        // if ($post->status !== 'PUBLISHED' || $post->published_at > now()) {
        //     abort(404);
        // }
        
        // Eager load relasi untuk post utama
        $post->load(['user:id,name,bio', 'category:id,name,slug']); // Asumsi user punya kolom bio

        // Transformasi data untuk post utama
        $transformedPost = [
            'id' => $post->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'body' => $post->body, // Konten HTML lengkap
            'image_url' => $post->image ? asset('images/blog/' . $post->image) : asset($this->defaultBlogImage),
            'category' => [
                'name' => $post->category->name,
                'slug' => $post->category->slug,
            ],
            'author' => [
                'name' => $post->user->name,
                'bio' => $post->user->bio, // Asumsi ada kolom bio di tabel users
                'avatar_url' => $post->user->avatar ? asset('images/users/avatars/' . $post->user->avatar) : asset($this->defaultAuthorAvatar), // Asumsi ada kolom avatar
            ],
            'published_at' => $post->published_at->toIso8601String(), // Format ISO untuk tag <time>
            'published_at_formatted' => $post->published_at->translatedFormat('j F Y'),
            // 'reading_time' => $this->calculateReadingTime($post->body), // Anda bisa buat fungsi ini
        ];

        // Mengambil artikel terkait (dari kategori yang sama, tidak termasuk artikel saat ini)
        $relatedPosts = Post::with('category:id,name,slug')
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'PUBLISHED')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get()
            ->map(fn ($related) => [
                'title' => $related->title,
                'slug' => $related->slug,
                'image_url' => $related->image ? asset('images/blog/' . $related->image) : asset($this->defaultBlogImage),
                'category_name' => $related->category->name,
            ]);

        return Inertia::render('Web/Blog/Show', [
            'post' => $transformedPost,
            'relatedPosts' => $relatedPosts,
        ]);
    }

    /**
     * Menampilkan artikel berdasarkan kategori.
     * PASTIKAN METHOD INI ADA DI DALAM CONTROLLER ANDA
     */
    public function category(Category $category) // Menggunakan Route Model Binding
    {
        // 1. Ambil semua kategori untuk sidebar
        $categories = Category::whereHas('posts', function ($query) {
                $query->where('status', 'PUBLISHED')->where('published_at', '<=', now());
            })
            ->withCount(['posts' => function ($query) {
                $query->where('status', 'PUBLISHED')->where('published_at', '<=', now());
            }])
            ->orderBy('name', 'asc')
            ->get(['id', 'name', 'slug']);
        
        // 2. Ambil artikel dari kategori yang dipilih dengan pagination
        $posts = Post::with(['user:id,name', 'category:id,name,slug'])
            ->where('category_id', $category->id)
            ->where('status', 'PUBLISHED')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(9) // Jumlah item per halaman untuk halaman kategori
            ->through(fn ($post) => $this->transformPostData($post)); // Gunakan transformer yang sama

        // 3. Kita bisa gunakan view yang sama dengan halaman utama blog (Index.vue)
        return Inertia::render('Web/Blog/Index', [
            'posts' => $posts,
            'categories' => $categories,
            'currentCategory' => $category, // Mengirim kategori saat ini untuk menampilkan judul/highlight
            'highlightedPosts' => collect(), // Kirim array kosong karena tidak ada highlight khusus di halaman kategori
        ]);
    }

    /**
     * Helper function untuk mentransformasi data post agar konsisten.
     */
    private function transformPostData(Post $post): array
    {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'excerpt' => $post->excerpt ?: Str::limit(strip_tags($post->body), 120),
            'image_url' => $post->image ? asset('images/blog/' . $post->image) : asset($this->defaultBlogImage), // Sesuaikan path
            'category' => $post->category ? [
                'name' => $post->category->name,
                'slug' => $post->category->slug
            ] : null,
            'author' => $post->user ? [
                'name' => $post->user->name,
                // 'avatar_url' => $post->user->avatar ? asset('images/avatars/'.$post->user->avatar) : '/images/avatars/default.png',
            ] : ['name' => 'Penulis Tamu'],
            'published_at_formatted' => Carbon::parse($post->published_at)->translatedFormat('j M Y'),
        ];
    }
}