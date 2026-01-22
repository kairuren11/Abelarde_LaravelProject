<x-layouts.app :title="__('Platforms')">
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
        transition: all 0.3s ease;
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
        transition: all 0.3s ease;
    }
    
    .cyberpunk-button:hover {
        background: linear-gradient(135deg, rgba(0, 255, 255, 0.3), rgba(255, 0, 255, 0.3));
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.6);
        transform: translateY(-2px);
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

        <div class="cyberpunk-card rounded-lg p-6 mb-6">
            <h2 class="text-lg font-semibold text-cyan-400 mb-4 neon-text">Add New Platform</h2>
            <form action="{{ route('platforms.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid gap-4 md:grid-cols-3">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-cyan-400">Platform Name</label>
                        <input type="text" name="platform_name" value="{{ old('platform_name') }}"
                                placeholder="Enter platform name" required
                                class="w-full cyberpunk-input rounded-lg px-4 py-2 text-sm">
                        @error('platform_name')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="cyberpunk-button px-5 py-2 rounded-lg text-sm font-medium">
                            Add Platform
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="cyberpunk-card rounded-lg p-6">
            <h2 class="mb-4 text-lg font-semibold text-cyan-400 neon-text">Platform List</h2>
            <div class="overflow-x-auto">
                <table class="w-full cyberpunk-table">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-center text-sm font-semibold">#</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">Platform Name</th>
                            <th class="px-4 py-3 text-center text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($platforms as $platform)
                            <tr id="platform-row-{{ $platform->id }}">
                                <td class="px-4 py-3 text-center text-sm">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 text-center text-sm text-cyan-300 font-medium">
                                    <span>{{ $platform->platform_name }}</span>
                                </td>
                                <td class="px-4 py-3 text-center text-sm">
                                    <button onclick="editPlatform({{ $platform->id }}, '{{ $platform->platform_name }}')"
                                             class="text-cyan-400 hover:text-cyan-300 font-medium neon-text" style="text-shadow: 0 0 5px rgba(0, 255, 255, 0.8);">
                                        Edit
                                    </button>
                                    <span class="mx-1 text-cyan-500">|</span>
                                    <form action="{{ route('platforms.destroy', $platform) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Are you sure? This will delete the platform.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-pink-400 hover:text-pink-300 font-medium" style="text-shadow: 0 0 5px rgba(255, 0, 255, 0.8);">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-8 text-center text-sm text-cyan-400">
                                    No platforms found. Add your first platform above!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="editPlatformModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 p-4">
    <div class="w-full max-w-2xl rounded-lg cyberpunk-card p-6">
        <h2 class="mb-4 text-lg font-semibold text-cyan-400 neon-text">Edit Platform</h2>
        <form id="editPlatformForm" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-medium text-cyan-400">Platform Name</label>
                    <input type="text" id="edit_platform_name" name="platform_name" required
                            class="w-full cyberpunk-input rounded-lg px-4 py-2 text-sm">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeEditPlatformModal()"
                        class="cyberpunk-button px-4 py-2 rounded-lg text-sm font-medium">
                    Cancel
                </button>
                <button type="submit"
                        class="cyberpunk-button px-4 py-2 rounded-lg text-sm font-medium">
                    Update Platform
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function editPlatform(id, platformName) {
        const modal = document.getElementById('editPlatformModal');
        const form = document.getElementById('editPlatformForm');
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        form.action = `/platforms/${id}`;
        document.getElementById('edit_platform_name').value = platformName;
    }
    
    function closeEditPlatformModal() {
        const modal = document.getElementById('editPlatformModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
    
    document.getElementById('editPlatformModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditPlatformModal();
        }
    });
</script>
</x-layouts.app>
