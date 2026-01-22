<x-layouts.app :title="__('Trash')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        @if(session('success'))
            <div class="rounded-lg bg-green-100 p-4 text-green-700 dark:bg-green-900/30 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-neutral-900 dark:text-neutral-100">🗑️ Trash</h1>
            <a href="{{ route('games.index') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-700">
                ← Back to Games
            </a>
        </div>

        <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
            <div class="p-6">
                @if($games->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-full">
                            <thead>
                                <tr class="border-b border-neutral-200 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900/50">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-300">#</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-300">Photo</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-300">Title</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-300">Developer</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-300">Publisher</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-300">Platform</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-300">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                                @foreach($games as $game)
                                <tr class="transition-colors hover:bg-neutral-50 dark:hover:bg-neutral-800/50">
                                    <td class="px-4 py-3 text-sm text-neutral-700 dark:text-neutral-300">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 text-sm text-neutral-700 dark:text-neutral-300">
                                        @if($game->photo)
                                            <img src="{{ asset('storage/games/' . $game->photo) }}" alt="{{ $game->title }}" class="h-10 w-10 rounded-full object-cover">
                                        @else
                                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-500 text-xs font-bold text-white">
                                                {{ $game->getInitials() }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm text-neutral-700 dark:text-neutral-300">{{ $game->title }}</td>
                                    <td class="px-4 py-3 text-sm text-neutral-700 dark:text-neutral-300">{{ $game->developer }}</td>
                                    <td class="px-4 py-3 text-sm text-neutral-700 dark:text-neutral-300">{{ $game->publisher }}</td>
                                    <td class="px-4 py-3 text-sm text-neutral-700 dark:text-neutral-300">{{ $game->platform->platform_name ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-sm text-neutral-700 dark:text-neutral-300">
                                        <form method="POST" action="{{ route('games.restore', $game->id) }}" class="inline" onsubmit="return confirm('Restore this game?');">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-green-600 transition-colors hover:text-green-700 dark:text-green-400 dark:hover:text-green-300">
                                                Restore
                                            </button>
                                        </form>
                                        <span class="mx-1 text-neutral-400">|</span>
                                        <form method="POST" action="{{ route('games.force-delete', $game->id) }}" class="inline" onsubmit="return confirm('Permanently delete this game? This cannot be undone!');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 transition-colors hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">
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
                    <div class="py-8 text-center text-neutral-500 dark:text-neutral-400">
                        <p class="text-lg">Trash is empty!</p>
                        <p class="text-sm">Deleted games will appear here.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
