<div x-data="permissionManager()" x-init="init()" class="space-y-4">

    {{-- Role Name --}}
    <div class="rounded-lg border border-neutral-200 bg-white p-5 dark:border-neutral-800 dark:bg-neutral-900">
        <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300" for="name">
            Role name
        </label>

        <input id="name" name="name" value="{{ old('name', $role?->name) }}" required
            class="h-11 w-full rounded-lg border border-neutral-300 px-4 text-sm text-neutral-800 focus:border-brand-500 focus:outline-none dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">

        @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    {{-- Global Select All --}}
    <div class="rounded-lg border border-neutral-200 bg-white p-5 dark:border-neutral-800 dark:bg-neutral-900">

        <label class="flex cursor-pointer items-center gap-3">

            <input type="checkbox" x-model="selectAll" @change="toggleAll()"
                class="rounded border-neutral-300 text-brand-600 focus:ring-brand-500">

            <span class="text-sm font-semibold text-neutral-800 dark:text-white">
                Select All Permissions
            </span>

        </label>

    </div>


    {{-- Permission Sections --}}
    @foreach ($permissions as $feature => $featurePermissions)
        <div class="permission-section rounded-lg border border-neutral-200 bg-white p-5 dark:border-neutral-800 dark:bg-neutral-900"
            data-section="{{ Str::slug($feature) }}">

            {{-- Section Header --}}
            <div class="mb-4 flex items-center justify-between">

                <h4 class="text-sm font-semibold uppercase text-neutral-700 dark:text-neutral-300">
                    {{ $feature }}
                </h4>

                <label class="flex cursor-pointer items-center gap-2 text-sm text-neutral-700 dark:text-neutral-300">

                    <input type="checkbox"
                        class="section-checkbox rounded border-neutral-300 text-brand-600 focus:ring-brand-500"
                        @change="toggleSection($event.target)">

                    <span>
                        Select All
                    </span>

                </label>

            </div>


            {{-- Permissions --}}
            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">

                @foreach ($featurePermissions as $permission)
                    <label class="flex cursor-pointer items-center gap-2 text-sm text-neutral-700 dark:text-neutral-300">

                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                            @checked(in_array($permission->name, old('permissions', $role?->permissions->pluck('name')->all() ?? []), true)) @change="permissionChanged($event.target)"
                            class="permission-checkbox rounded border-neutral-300 text-brand-600 focus:ring-brand-500">

                        <span>
                            {{ $permission->name }}
                        </span>

                    </label>
                @endforeach

            </div>

        </div>
    @endforeach
    <div class="flex items-center gap-3">
    <button type="submit" class="rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
        Save Role
    </button>
    <a href="{{ role_route('role.roles-permissions.index') }}" class="rounded-lg border border-neutral-300 px-4 py-2 text-sm text-neutral-700 dark:border-neutral-700 dark:text-neutral-300">
        Cancel
    </a>
</div>
</div>

<script>
    function permissionManager() {
        return {

            selectAll: false,

            init() {
                this.syncAllStates();
            },

            /**
             * Global Select All
             */
            toggleAll() {

                const checked = this.selectAll;

                document
                    .querySelectorAll('.permission-checkbox')
                    .forEach(checkbox => {
                        checkbox.checked = checked;
                    });

                document
                    .querySelectorAll('.section-checkbox')
                    .forEach(checkbox => {
                        checkbox.checked = checked;
                    });
            },


            /**
             * Section Select All
             */
            toggleSection(sectionCheckbox) {

                const section = sectionCheckbox.closest('.permission-section');

                const permissions = section.querySelectorAll(
                    '.permission-checkbox'
                );

                permissions.forEach(permission => {
                    permission.checked = sectionCheckbox.checked;
                });

                this.syncAllStates();
            },


            /**
             * Individual permission changed
             */
            permissionChanged(permission) {

                const section = permission.closest('.permission-section');

                const permissions = section.querySelectorAll(
                    '.permission-checkbox'
                );

                const sectionCheckbox = section.querySelector(
                    '.section-checkbox'
                );


                // Check if every permission in this section is selected
                const allChecked = [...permissions].every(
                    checkbox => checkbox.checked
                );

                sectionCheckbox.checked = allChecked;


                // Update global Select All
                this.syncGlobalState();
            },


            /**
             * Sync all section + global states
             */
            syncAllStates() {

                document
                    .querySelectorAll('.permission-section')
                    .forEach(section => {

                        const permissions = section.querySelectorAll(
                            '.permission-checkbox'
                        );

                        const sectionCheckbox = section.querySelector(
                            '.section-checkbox'
                        );

                        const allChecked = [...permissions].every(
                            checkbox => checkbox.checked
                        );

                        sectionCheckbox.checked = allChecked;

                    });

                this.syncGlobalState();
            },


            /**
             * Sync global Select All
             */
            syncGlobalState() {

                const permissions = document.querySelectorAll(
                    '.permission-checkbox'
                );

                this.selectAll =
                    permissions.length > 0 &&
                    [...permissions].every(
                        checkbox => checkbox.checked
                    );
            }

        }
    }
</script>
