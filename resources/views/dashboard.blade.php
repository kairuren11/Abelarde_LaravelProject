
<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-2xl">

    @if(session('success'))
        <div class="rounded-lg bg-gradient-to-r from-emerald-900/30 to-emerald-900/20 border-l-4 border-emerald-500 p-4 text-emerald-300 shadow-sm">
            <div class="flex items-center">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="grid auto-rows-min gap-6 md:grid-cols-3">
            <div class="group relative overflow-hidden rounded-2xl border border-blue-900/40 bg-gradient-to-br from-slate-800 via-slate-800/80 to-blue-900/30 p-6 hover:shadow-2xl hover:shadow-blue-900/30 transition-all duration-300">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-blue-400">Total Games</p>
                        <h3 class="mt-3 text-4xl font-bold text-white">{{ $games->count() }}</h3>
                        <p class="mt-1 text-xs text-blue-400/60">Active in database</p>
                    </div>
                    <div class="rounded-full bg-gradient-to-br from-blue-600 to-blue-700 p-4 shadow-2xl shadow-blue-900/50">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl border border-purple-900/40 bg-gradient-to-br from-slate-800 via-slate-800/80 to-purple-900/30 p-6 hover:shadow-2xl hover:shadow-purple-900/30 transition-all duration-300">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-600/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-purple-400">Platforms</p>
                        <h3 class="mt-3 text-4xl font-bold text-white">{{ $platforms->count() }}</h3>
                        <p class="mt-1 text-xs text-purple-400/60">Gaming platforms</p>
                    </div>
                    <div class="rounded-full bg-gradient-to-br from-purple-600 to-purple-700 p-4 shadow-2xl shadow-purple-900/50">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.5a2 2 0 00-1 3.75A2.001 2.001 0 0113 15H9" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl border border-amber-900/40 bg-gradient-to-br from-slate-800 via-slate-800/80 to-amber-900/30 p-6 hover:shadow-2xl hover:shadow-amber-900/30 transition-all duration-300">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-600/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-amber-400">With Photos</p>
                        <h3 class="mt-3 text-4xl font-bold text-white">{{ $games->filter(fn($g) => $g->photo)->count() }}</h3>
                        <p class="mt-1 text-xs text-amber-400/60">Visual coverage</p>
                    </div>
                    <div class="rounded-full bg-gradient-to-br from-amber-600 to-amber-700 p-4 shadow-2xl shadow-amber-900/50">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>
                            @error('release_year')
                                <p class="mt-1 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Developer</label>
                            <input type="text" name="developer" value="{{ old('developer') }}" placeholder="Studio name" required class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 dark:placeholder-slate-500">
                            @error('developer')
                                <p class="mt-1 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Publisher</label>
                            <input type="text" name="publisher" value="{{ old('publisher') }}" placeholder="Publisher name" required class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 dark:placeholder-slate-500">
                            @error('publisher')
                                <p class="mt-1 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Platform</label>
                            <select name="platform_id" required class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100">
                                <option value="">Select a platform</option>
                                @foreach($platforms as $platform)
                                    <option value="{{ $platform->id }}" {{ old('platform_id') == $platform->id ? 'selected' : '' }}>
                                        {{ $platform->platform_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('platform_id')
                                <p class="mt-1 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Cover Photo</label>
                            <input type="file" name="photo" accept="image/jpeg,image/png" class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 dark:placeholder-slate-500">
                            <p class="mt-1 text-xs text-slate-600 dark:text-slate-400">JPG or PNG, Max 2MB</p>
                            @error('photo')
                                <p class="mt-1 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <button type="submit" class="w-full rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-3 text-sm font-semibold text-white transition-all hover:shadow-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500/50 active:scale-95">
                                + Add Game
                            </button>
                        </div>
                    </form>
                </div>

            <div class="mb-8 flex flex-col gap-4 rounded-2xl border border-slate-700/50 bg-gradient-to-br from-slate-800 to-slate-800/70 p-6 shadow-lg shadow-black/20 md:flex-row md:items-end md:gap-4">
                    <div class="flex-1">
                        <label class="mb-2 block text-sm font-semibold text-slate-300">Search & Filter</label>
                        <form method="GET" action="{{ route('games.index') }}" class="flex flex-col gap-3 md:flex-row md:gap-2">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title, developer..." 
                                   class="flex-1 rounded-lg border border-slate-600 bg-slate-900/50 px-4 py-2.5 text-sm text-white placeholder-slate-500 transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                            <select name="platform_id" class="rounded-lg border border-slate-600 bg-slate-900/50 px-4 py-2.5 text-sm text-white transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                                <option value="" class="bg-slate-900 text-white">All Platforms</option>
                                @foreach($platforms as $platform)
                                    <option value="{{ $platform->id }}" {{ request('platform_id') == $platform->id ? 'selected' : '' }} class="bg-slate-900 text-white">
                                        {{ $platform->platform_name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition-all hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-900/30 active:scale-95">
                                Search
                            </button>
                            <a href="{{ route('games.index') }}" class="rounded-lg border border-slate-600 bg-slate-900/50 px-5 py-2.5 text-sm font-semibold text-slate-300 transition-all hover:bg-slate-700 hover:shadow-sm">
                                Reset
                            </a>
                        </form>
                    </div>

                    <div class="flex flex-col gap-2 md:flex-row md:gap-2">
                        <a href="{{ route('games.export', array_filter(request()->query())) }}" class="rounded-lg bg-gradient-to-r from-emerald-600 to-emerald-700 px-5 py-2.5 text-center text-sm font-semibold text-white transition-all hover:shadow-lg hover:shadow-emerald-900/30 hover:from-emerald-700 hover:to-emerald-800 active:scale-95">
                            📊 Export PDF
                        </a>
                        <a href="{{ route('games.trash') }}" class="rounded-lg bg-gradient-to-r from-orange-600 to-orange-700 px-5 py-2.5 text-center text-sm font-semibold text-white transition-all hover:shadow-lg hover:shadow-orange-900/30 hover:from-orange-700 hover:to-orange-800 active:scale-95">
                            🗑️ Trash
                        </a>
                    </div>
                </div>

             
                <div class="flex-1 overflow-auto rounded-xl border border-slate-200 dark:border-slate-700">
                    <div class="mb-4 flex items-center justify-between px-6 pt-6">
                        <h2 class="text-xl font-bold text-slate-900 dark:text-slate-100">Game Library</h2>
                        <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">{{ $games->count() }} games</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-full">
                            <thead>
                                <tr class="border-b border-slate-200 bg-gradient-to-r from-slate-100 to-slate-50 dark:border-slate-700 dark:from-slate-800 dark:to-slate-900">
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 dark:text-slate-300">#</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 dark:text-slate-300">Photo</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 dark:text-slate-300">Title</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 dark:text-slate-300">Year</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 dark:text-slate-300">Developer</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 dark:text-slate-300">Publisher</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 dark:text-slate-300">Platform</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 dark:text-slate-300">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                @forelse($games as $game)
                                <tr class="transition-colors hover:bg-blue-50/50 dark:hover:bg-slate-800/50">
                                    <td class="px-6 py-4 text-sm font-medium text-slate-900 dark:text-slate-100">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        @if($game->photo)
                                            <img src="{{ asset('storage/games/' . $game->photo) }}" alt="{{ $game->title }}" class="h-12 w-12 rounded-lg object-cover ring-2 ring-slate-200 dark:ring-slate-700">
                                        @else
                                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 text-sm font-bold text-white ring-2 ring-slate-200 dark:ring-slate-700">
                                                {{ $game->getInitials() }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-slate-900 dark:text-slate-100">{{ $game->title }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-700 dark:text-slate-400">{{ $game->release_year }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-700 dark:text-slate-400">{{ $game->developer }}</td>
                                    <td class="px-6 py-4 text-sm text-slate-700 dark:text-slate-400">{{ $game->publisher }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="inline-block rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700 dark:bg-purple-900/30 dark:text-purple-400">{{ $game->platform->platform_name ?? 'N/A' }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <button
                                            class="font-semibold text-blue-600 transition-colors hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300"
                                            onclick="editGame('{{ $game->id }}', '{{ addslashes($game->title) }}', '{{ $game->release_year }}', '{{ addslashes($game->developer) }}', '{{ addslashes($game->publisher) }}', '{{ $game->platform_id }}')"
                                        >
                                            ✏️ Edit
                                        </button>
                                        <span class="mx-2 text-slate-400">·</span>
                                        <form method="POST" action="{{ route('games.destroy', $game) }}" class="inline" onsubmit="return confirm('Move to trash?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-semibold text-red-600 transition-colors hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">🗑️ Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="editGameModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 backdrop-blur-sm">
        <div class="w-full max-w-2xl overflow-y-auto rounded-2xl border border-slate-700/50 bg-gradient-to-br from-slate-900 to-slate-800 p-8 shadow-2xl shadow-black/80">
            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-2xl font-bold text-white">Edit Game</h2>
                <button onclick="closeEditGameModal()" class="text-slate-400 hover:text-slate-200">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form id="editGameForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-300">Title</label>
                        <input type="text" id="edit_title" name="title" required
                               class="w-full rounded-lg border border-slate-600 bg-slate-900/50 px-4 py-3 text-sm text-white transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-300">Release Year</label>
                        <input type="text" id="edit_release_year" name="release_year" required
                               class="w-full rounded-lg border border-slate-600 bg-slate-900/50 px-4 py-3 text-sm text-white transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-300">Developer</label>
                        <input type="text" id="edit_developer" name="developer" required
                               class="w-full rounded-lg border border-slate-600 bg-slate-900/50 px-4 py-3 text-sm text-white transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-300">Publisher</label>
                        <input type="text" id="edit_publisher" name="publisher" required
                               class="w-full rounded-lg border border-slate-600 bg-slate-900/50 px-4 py-3 text-sm text-white transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-300">Platform</label>
                        <select id="edit_platform_id" name="platform_id" required
                                class="w-full rounded-lg border border-slate-600 bg-slate-900/50 px-4 py-3 text-sm text-white transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                            <option value="" class="bg-slate-900 text-white">Select a platform</option>
                            @foreach($platforms as $platform)
                                <option value="{{ $platform->id }}" class="bg-slate-900 text-white">{{ $platform->platform_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-300">Cover Photo</label>
                        <input type="file" name="photo" accept="image/jpeg,image/png"
                               class="w-full rounded-lg border border-slate-600 bg-slate-900/50 px-4 py-3 text-sm text-white transition-all focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20">
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" onclick="closeEditGameModal()"
                            class="rounded-lg border border-slate-600 px-6 py-2.5 text-sm font-semibold text-slate-300 transition-all hover:bg-slate-700 hover:shadow-sm">
                        Cancel
                    </button>
                    <button type="submit"
                            class="rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-2.5 text-sm font-semibold text-white transition-all hover:shadow-lg hover:shadow-blue-900/30 hover:from-blue-700 hover:to-blue-800 active:scale-95">
                        Update Game
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editGame(id, title, release_year, developer, publisher, platformId) {
            document.getElementById('editGameModal').classList.remove('hidden');
            document.getElementById('editGameModal').classList.add('flex');
            document.getElementById('editGameForm').action = `/games/${id}`;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_release_year').value = release_year;
            document.getElementById('edit_developer').value = developer;
            document.getElementById('edit_publisher').value = publisher;
            document.getElementById('edit_platform_id').value = platformId || '';
        }

        function closeEditGameModal() {
            document.getElementById('editGameModal').classList.add('hidden');
            document.getElementById('editGameModal').classList.remove('flex');
        }
    </script>
</x-layouts.app>