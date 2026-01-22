<x-layouts.app :title="__('Trash')">
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
    
    .neon-text {
        text-shadow: 
            0 0 5px currentColor,
            0 0 10px currentColor,
            0 0 15px currentColor;
    }
    
    .cyberpunk-table {
        background: rgba(10, 10, 15, 0.9);
        backdrop-filter: blur(10px);
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
    
    .cyberpunk-table tr:hover {
        background: rgba(0, 255, 255, 0.05);
    }
</style>

<div class="cyberpunk-bg">
    <div class="cyberpunk-content p-6">
        @if(session('success'))
            <div class="mb-4 rounded-lg bg-green-900/30 border border-green-700 p-4 text-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-cyan-400 neon-text">🗑️ Trash</h1>
            <a href="{{ route('dashboard') }}" class="cyberpunk-button px-4 py-2 rounded-lg text-sm font-medium inline-block">
                ← Back to Dashboard
            </a>
        </div>

        <div class="cyberpunk-card rounded-lg p-6">
            @if($games->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full cyberpunk-table">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold">#</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Photo</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Title</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Developer</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Publisher</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Platform</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($games as $game)
                            <tr>
                                <td class="px-4 py-3 text-sm">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 text-sm">
                                    @if($game->photo)
                                        <img src="{{ asset('storage/games/' . $game->photo) }}" alt="{{ $game->title }}" class="h-10 w-10 rounded-full object-cover border-2 border-cyan-500/30">
                                    @else
                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-500 text-xs font-bold text-white border-2 border-cyan-500/30">
                                            {{ $game->getInitials() }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-cyan-300 font-medium">{{ $game->title }}</td>
                                <td class="px-4 py-3 text-sm">{{ $game->developer }}</td>
                                <td class="px-4 py-3 text-sm">{{ $game->publisher }}</td>
                                <td class="px-4 py-3 text-sm">{{ $game->platform->platform_name ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <form method="POST" action="{{ route('games.restore', $game->id) }}" class="inline" onsubmit="return confirm('Restore this game?');">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-400 hover:text-green-300 font-medium" style="text-shadow: 0 0 5px rgba(0, 255, 0, 0.8);">
                                            Restore
                                        </button>
                                    </form>
                                    <span class="mx-1 text-cyan-500">|</span>
                                    <form method="POST" action="{{ route('games.force-delete', $game->id) }}" class="inline" onsubmit="return confirm('Permanently delete this game? This cannot be undone!');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-pink-400 hover:text-pink-300 font-medium" style="text-shadow: 0 0 5px rgba(255, 0, 255, 0.8);">
                                            Delete Forever
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="py-8 text-center text-cyan-400">
                    <p class="text-lg">Trash is empty!</p>
                    <p class="text-sm">Deleted games will appear here.</p>
                </div>
            @endif
        </div>
    </div>
</div>
</x-layouts.app>
