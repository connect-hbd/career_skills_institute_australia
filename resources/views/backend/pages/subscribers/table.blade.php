@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;

    $collection = $items instanceof \Illuminate\Pagination\AbstractPaginator
        ? $items->getCollection()
        : collect($items);

    $tableRowData = $collection->map(function ($subscriber) {
        return [
            'id' => $subscriber->id,
            'email' => $subscriber->email,
        ];
    })->values();

    $role = request()->route('role');
@endphp

<div x-data="{
    tableRowData: {{ \Illuminate\Support\Js::from($tableRowData) }},
    subscriberDeleteUrlTemplate: {{ \Illuminate\Support\Js::from(route('role.subscribers.destroy', ['role' => $role, 'subscriber' => '__SUBSCRIBER__'])) }},
    showDeleteModal: false,
    rowToDelete: null,

    openDeleteModal(row) {
        this.rowToDelete = row;
        this.showDeleteModal = true;
    },

    closeDeleteModal() {
        this.showDeleteModal = false;
        this.rowToDelete = null;
    },

    confirmDelete() {
        if (!this.rowToDelete) return;
        this.$refs.deleteForm.submit();
    },
 
}" @keydown.escape.window="closeDeleteModal()">
        <form x-ref="deleteForm" :action="rowToDelete ? subscriberDeleteUrlTemplate.replace('__SUBSCRIBER__', rowToDelete.id) : '#'" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>

        <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-99999">
            <div class="absolute inset-0 bg-neutral-900/50" @click="closeDeleteModal()"></div>
            <div class="absolute inset-0 flex items-center justify-center p-4">
                <div class="w-full max-w-md rounded-xl bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-800 shadow-xl">
                    <div class="p-5">
                        <div class="text-base font-semibold text-neutral-800 dark:text-white/90">Delete subscriber?</div>
                        <div class="mt-1 text-sm text-neutral-600 dark:text-neutral-400">
                            This will permanently delete subscriber:
                            <span class="font-mono" x-text="rowToDelete ? rowToDelete.email : ''"></span>
                        </div>
                        <div class="mt-5 flex justify-end gap-3">
                            <button type="button" @click="closeDeleteModal()"
                                class="inline-flex items-center justify-center rounded-lg border border-neutral-300 dark:border-neutral-700 px-4 py-2 text-sm font-medium text-neutral-700 dark:text-neutral-200 hover:bg-neutral-50 dark:hover:bg-neutral-800">
                                Cancel
                            </button>
                            <button type="button" @click="confirmDelete()"
                                class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
        <div class="overflow-hidden rounded-xl border border-neutral-100 dark:border-white/5 bg-white">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-neutral-50 dark:bg-white/2 border-b border-neutral-100 dark:border-white/5">
                        <tr>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Id</th>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider">Email</th>
                            <th class="px-5 py-4 text-xs font-medium text-neutral-500 uppercase tracking-wider text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-100 dark:divide-white/5">
                        <template x-if="tableRowData.length === 0">
                            <tr>
                                <td colspan="7" class="px-5 py-10 text-center text-sm text-neutral-500 dark:text-neutral-400">
                                    No subscriber records found.
                                </td>
                            </tr>
                        </template>
                        <template x-for="row in tableRowData" :key="row.id">
                            <tr class="hover:bg-neutral-50/50 dark:hover:bg-white/1 transition-colors">
                                <td class="px-5 py-4">
                                    <span class="px-2 py-1 bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-400 rounded text-xs font-mono" x-text="row.id"></span>
                                </td>                              
                                <td class="px-5 py-4 text-sm text-neutral-500 dark:text-neutral-400" x-text="row.email"></td>                              
                               
                                <td class="px-5 py-4 text-right">
                                    <div class="flex justify-end gap-2">                                      
                                        <button type="button" @click="openDeleteModal(row)" class="p-2 text-neutral-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-all">
                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            
            @if ($items instanceof \Illuminate\Pagination\AbstractPaginator)
                <div class="px-5 py-4 border-t border-neutral-100 dark:border-white/5">
                    {{ $items->links() }}
                </div>
            @endif
        </div>
    
</div>
