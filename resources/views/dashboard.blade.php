<x-layouts.app :title="__('Dashboard')">
<style>
    .cyberpunk-bg {
        position: relative;
        background: #000000;
        min-height: 100vh;
        overflow: hidden;
    }
    
    .cyberpunk-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            linear-gradient(90deg, rgba(0, 255, 255, 0.02) 0%, transparent 50%, rgba(255, 0, 255, 0.02) 100%),
            linear-gradient(0deg, rgba(0, 255, 255, 0.03) 0%, transparent 50%, rgba(255, 0, 255, 0.03) 100%),
            radial-gradient(circle at 20% 50%, rgba(0, 255, 255, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255, 0, 255, 0.05) 0%, transparent 50%);
        z-index: 0;
        will-change: opacity;
    }
    
    .cyberpunk-bg::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            linear-gradient(rgba(0, 255, 255, 0.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0, 255, 255, 0.06) 1px, transparent 1px);
        background-size: 50px 50px;
        opacity: 0.15;
        z-index: 0;
        transform: translateZ(0);
    }
    
    .cyberpunk-content {
        position: relative;
        z-index: 1;
    }
    
    .cyberpunk-card {
        background: rgba(10, 10, 15, 0.95);
        border: 1px solid rgba(0, 255, 255, 0.15);
        box-shadow: 
            0 0 20px rgba(0, 255, 255, 0.08),
            inset 0 0 20px rgba(0, 255, 255, 0.03);
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
        transform: translateZ(0);
    }
    
    .cyberpunk-card:hover {
        border-color: rgba(0, 255, 255, 0.3);
        box-shadow: 
            0 0 30px rgba(0, 255, 255, 0.15),
            inset 0 0 30px rgba(0, 255, 255, 0.08);
    }
    
    .cyberpunk-input {
        background: rgba(5, 5, 10, 0.9);
        border: 1px solid rgba(0, 255, 255, 0.25);
        color: #00ffff;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }
    
    .cyberpunk-input:focus {
        border-color: #00ffff;
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        outline: none;
    }
    
    .cyberpunk-input::placeholder {
        color: rgba(0, 255, 255, 0.5);
    }
    
    .cyberpunk-button {
        background: linear-gradient(135deg, rgba(0, 255, 255, 0.2), rgba(255, 0, 255, 0.2));
        border: 1px solid rgba(0, 255, 255, 0.5);
        color: #00ffff;
        text-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
        transition: background 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        transform: translateZ(0);
    }
    
    .cyberpunk-button:hover {
        background: linear-gradient(135deg, rgba(0, 255, 255, 0.3), rgba(255, 0, 255, 0.3));
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.6);
        transform: translateY(-2px) translateZ(0);
    }
    
    .neon-text {
        text-shadow: 
            0 0 5px currentColor,
            0 0 10px currentColor,
            0 0 15px currentColor;
    }
    
    .cyberpunk-table {
        background: rgba(10, 10, 15, 0.95);
        border: 1px solid rgba(0, 255, 255, 0.15);
    }
    
    .cyberpunk-table thead {
        background: rgba(0, 255, 255, 0.08);
        border-bottom: 2px solid rgba(0, 255, 255, 0.25);
    }
    
    .cyberpunk-table th {
        color: #00ffff;
        text-shadow: 0 0 5px rgba(0, 255, 255, 0.5);
    }
    
    .cyberpunk-table td {
        color: rgba(255, 255, 255, 0.9);
        border-bottom: 1px solid rgba(0, 255, 255, 0.08);
    }
    
    .cyberpunk-table tr {
        transition: background-color 0.15s ease;
    }
    
    .cyberpunk-table tr:hover {
        background: rgba(0, 255, 255, 0.05);
    }
</style>

<div class="cyberpunk-bg">
    <div class="cyberpunk-content p-6">
    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 dark:bg-green-900/30 border border-green-200 dark:border-green-700 p-4 text-green-700 dark:text-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-4 rounded-lg bg-red-100 dark:bg-red-900/30 border border-red-200 dark:border-red-700 p-4 text-red-700 dark:text-red-300">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Statistic Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="rounded-lg p-6" style="background: rgba(5, 5, 10, 0.95); border: 1px solid rgba(0, 255, 255, 0.1); box-shadow: 0 0 15px rgba(0, 255, 255, 0.05), inset 0 0 15px rgba(0, 255, 255, 0.02);">
            <p class="text-xs font-medium text-cyan-400 mb-2">Total Games</p>
            <p class="text-4xl font-bold text-white neon-text" style="color: #00ffff;">{{ $games->count() }}</p>
        </div>
        <div class="rounded-lg p-6" style="background: rgba(5, 5, 10, 0.95); border: 1px solid rgba(0, 255, 255, 0.1); box-shadow: 0 0 15px rgba(0, 255, 255, 0.05), inset 0 0 15px rgba(0, 255, 255, 0.02);">
            <p class="text-xs font-medium text-cyan-400 mb-2">Active Platforms</p>
            <p class="text-4xl font-bold text-white neon-text" style="color: #00ffff;">{{ $platforms->count() }}</p>
        </div>
        <div class="rounded-lg p-6" style="background: rgba(5, 5, 10, 0.95); border: 1px solid rgba(0, 255, 255, 0.1); box-shadow: 0 0 15px rgba(0, 255, 255, 0.05), inset 0 0 15px rgba(0, 255, 255, 0.02);">
            <p class="text-xs font-medium text-cyan-400 mb-2">Games with Photos</p>
            <p class="text-4xl font-bold text-white neon-text" style="color: #00ffff;">{{ $games->whereNotNull('photo')->count() }}</p>
        </div>
    </div>

    {{-- Add New Game Form --}}
    <div class="cyberpunk-card rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold text-cyan-400 mb-4 neon-text">Add New Game</h2>
        <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter game title" required 
                           class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                    @error('title')
                        <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Release Year</label>
                    <input type="text" name="release_year" value="{{ old('release_year') }}" placeholder="Enter release year" required maxlength="4"
                           class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                    @error('release_year')
                        <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Developer</label>
                    <input type="text" name="developer" value="{{ old('developer') }}" placeholder="Enter developer" required 
                           class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                    @error('developer')
                        <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Publisher</label>
                    <input type="text" name="publisher" value="{{ old('publisher') }}" placeholder="Enter publisher" required 
                           class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                    @error('publisher')
                        <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Platform</label>
                    <select name="platform_id" required 
                            class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                        <option value="">Select a platform</option>
                        @foreach($platforms as $p) 
                            <option value="{{ $p->id }}" {{ old('platform_id') == $p->id ? 'selected' : '' }}>{{ $p->platform_name }}</option> 
                        @endforeach
                    </select>
                    @error('platform_id')
                        <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Photo (JPG/PNG, Max 2MB)</label>
                    <input type="file" name="photo" accept="image/jpeg,image/jpg,image/png" 
                           class="w-full cyberpunk-input rounded-lg px-3 py-2 text-xs">
                    @error('photo')
                        <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="pt-2">
                <button type="submit" class="cyberpunk-button px-6 py-2 rounded-lg text-sm font-medium">
                    Add Game
                </button>
            </div>
        </form>
    </div>

    {{-- Search, Filter, PDF & Trash --}}
    <div class="cyberpunk-card rounded-lg p-4 mb-6">
        <form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap gap-3 items-end mb-3">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-xs font-medium text-cyan-400 mb-1">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title, developer, or publisher..." 
                       class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
            </div>
            <div class="min-w-[150px]">
                <label class="block text-xs font-medium text-cyan-400 mb-1">Filter by Platform</label>
                <select name="platform_id" 
                        class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                    <option value="">All Platforms</option>
                    @foreach($platforms as $p) 
                        <option value="{{ $p->id }}" {{ request('platform_id') == $p->id ? 'selected' : '' }}>{{ $p->platform_name }}</option> 
                    @endforeach
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="cyberpunk-button px-4 py-2 rounded-lg text-sm font-medium">
                    Search
                </button>
                @if(request('search') || request('platform_id'))
                    <a href="{{ route('dashboard') }}" class="cyberpunk-button px-4 py-2 rounded-lg text-sm font-medium inline-block">
                        Clear
                    </a>
                @endif
            </div>
        </form>
        <div class="flex gap-2">
            <a href="{{ route('games.export', request()->query()) }}" 
               class="cyberpunk-button px-4 py-2 rounded-lg text-sm font-medium inline-block">
                📄 Export PDF
            </a>
            <a href="{{ route('games.trash') }}" 
               class="cyberpunk-button px-4 py-2 rounded-lg text-sm font-medium inline-block">
                🗑️ Trash ({{ \App\Models\Game::onlyTrashed()->count() }})
            </a>
        </div>
    </div>

    {{-- Game List Table --}}
    <div class="cyberpunk-card rounded-lg overflow-hidden">
        <div class="p-4 border-b border-cyan-500/30">
            <h2 class="text-lg font-semibold text-cyan-400 neon-text">Game List</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left cyberpunk-table">
                <thead>
                    <tr>
                        <th class="px-4 py-3 text-sm font-semibold">#</th>
                        <th class="px-4 py-3 text-sm font-semibold">Photo</th>
                        <th class="px-4 py-3 text-sm font-semibold">Title</th>
                        <th class="px-4 py-3 text-sm font-semibold">Release Year</th>
                        <th class="px-4 py-3 text-sm font-semibold">Developer</th>
                        <th class="px-4 py-3 text-sm font-semibold">Publisher</th>
                        <th class="px-4 py-3 text-sm font-semibold">Platform</th>
                        <th class="px-4 py-3 text-sm font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($games as $game)
                    <tr>
                        <td class="px-4 py-3 text-sm">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">
                            @if($game->photo)
                                <img src="{{ asset('storage/games/' . $game->photo) }}" alt="{{ $game->title }}" 
                                     class="h-10 w-10 rounded-full object-cover border-2 border-cyan-500/30">
                            @else
                                <div class="h-10 w-10 bg-blue-500 rounded-full flex items-center justify-center font-bold text-white text-xs border-2 border-cyan-500/30">
                                    {{ $game->getInitials() }}
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm font-medium text-cyan-300">{{ $game->title }}</td>
                        <td class="px-4 py-3 text-sm">{{ $game->release_year }}</td>
                        <td class="px-4 py-3 text-sm">{{ $game->developer }}</td>
                        <td class="px-4 py-3 text-sm">{{ $game->publisher }}</td>
                        <td class="px-4 py-3 text-sm">{{ $game->platform->platform_name ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm text-right">
                            <div class="flex gap-2 justify-end">
                                <button onclick="editGame({{ $game->id }}, '{{ addslashes($game->title) }}', '{{ addslashes($game->developer) }}', '{{ addslashes($game->publisher) }}', '{{ $game->release_year }}', {{ $game->platform_id }}, '{{ $game->photo }}')" 
                                        class="text-cyan-400 hover:text-cyan-300 font-medium neon-text" style="text-shadow: 0 0 5px rgba(0, 255, 255, 0.8);">
                                    Edit
                                </button>
                                <span class="text-cyan-500">|</span>
                                <form action="{{ route('games.destroy', $game) }}" method="POST" class="inline" 
                                      onsubmit="return confirm('Move this game to trash?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-pink-400 hover:text-pink-300 font-medium" style="text-shadow: 0 0 5px rgba(255, 0, 255, 0.8);">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-sm text-zinc-500 dark:text-zinc-400">
                            @if(request('search') || request('platform_id'))
                                No games found matching your search criteria.
                            @else
                                No games found. Add your first game above!
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Edit Game Modal --}}
<div id="editGameModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 p-4">
    <div class="w-full max-w-3xl rounded-lg cyberpunk-card p-6">
        <h2 class="text-xl font-semibold mb-4 text-cyan-400 neon-text">Edit Game</h2>
        <form id="editGameForm" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Title *</label>
                    <input type="text" id="edit_title" name="title" required 
                           class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Developer *</label>
                    <input type="text" id="edit_developer" name="developer" required 
                           class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Publisher *</label>
                    <input type="text" id="edit_publisher" name="publisher" required 
                           class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Release Year *</label>
                    <input type="text" id="edit_release_year" name="release_year" required maxlength="4"
                           class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Platform *</label>
                    <select id="edit_platform_id" name="platform_id" required 
                            class="w-full cyberpunk-input rounded-lg px-3 py-2 text-sm">
                        @foreach($platforms as $p) 
                            <option value="{{ $p->id }}">{{ $p->platform_name }}</option> 
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-cyan-400 mb-1">Photo (JPG/PNG, Max 2MB)</label>
                    <input type="file" id="edit_photo" name="photo" accept="image/jpeg,image/jpg,image/png" 
                           class="w-full cyberpunk-input rounded-lg px-3 py-2 text-xs">
                    <div id="current_photo" class="mt-2"></div>
                </div>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t border-cyan-500/30">
                <button type="button" onclick="closeEditModal()" 
                        class="cyberpunk-button px-4 py-2 rounded-lg text-sm font-medium">
                    Cancel
                </button>
                <button type="submit" 
                        class="cyberpunk-button px-4 py-2 rounded-lg text-sm font-medium">
                    Update Game
                </button>
            </div>
        </form>
    </div>
</div>

<script>
const storageGamesPath = '{{ asset("storage/games") }}';

function editGame(id, title, developer, publisher, releaseYear, platformId, photo) {
    const modal = document.getElementById('editGameModal');
    const form = document.getElementById('editGameForm');
    
    form.action = `/games/${id}`;
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_developer').value = developer;
    document.getElementById('edit_publisher').value = publisher;
    document.getElementById('edit_release_year').value = releaseYear;
    document.getElementById('edit_platform_id').value = platformId;
    
    const currentPhotoDiv = document.getElementById('current_photo');
    if (photo) {
        currentPhotoDiv.innerHTML = `<p class="text-xs text-cyan-400 mb-1">Current Photo:</p><img src="${storageGamesPath}/${photo}" alt="${title}" class="h-16 w-16 rounded-full object-cover border-2 border-cyan-500/30">`;
    } else {
        currentPhotoDiv.innerHTML = '<p class="text-xs text-cyan-400">No photo uploaded</p>';
    }
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeEditModal() {
    const modal = document.getElementById('editGameModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}

// Close modal on outside click
document.getElementById('editGameModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditModal();
    }
});
</script>
</x-layouts.app>
