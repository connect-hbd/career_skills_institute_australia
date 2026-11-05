 @php
     use App\Helpers\MenuStudentPortal;

     $menuGroups = MenuStudentPortal::getMenuGroups();
 @endphp
 <div class="sticky top-24 space-y-5">

     <!-- ================================================= -->
     <!-- User Card -->
     <!-- ================================================= -->

     <div class="overflow-hidden lg:rounded-2xl lg:border border-neutral-200 bg-white">

         <!-- Card Header -->

         <div class="border-b border-neutral-100 bg-brand-500 p-4 hidden lg:block">

             <div class="mb-4 flex h-10 w-10 items-center  border border-neutral-500 justify-center overflow-hidden rounded-xl">

                 @if (auth()->user()->avatar)
                     <img src="{{ asset(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}"
                         class="h-full w-full object-cover">
                 @else
                     <span class="text-lg font-bold uppercase text-white ">
                         {{ Str::substr(auth()->user()->name, 0, 1) }}
                     </span>
                 @endif

             </div>

             <h2 class="text-lg font-bold tracking-tight text-white">
                 {{ auth()->user()->name }}
             </h2>

         </div>


         <!-- ================================================= -->
         <!-- Navigation -->
         <!-- ================================================= -->

         <div class="p-0 lg:p-4" x-data="{
             openSubmenus: {},
         
             init() {
                 this.initializeActiveMenus();
             },
         
             initializeActiveMenus() {
         
                 @foreach ($menuGroups as $groupIndex => $menuGroup)

                                @foreach ($menuGroup['items'] as $itemIndex => $item)

                                    @if (isset($item['subItems']))

                                        @foreach ($item['subItems'] as $subItem)

                                            @php
                                                $subItemUrl = MenuStudentPortal::itemUrl($subItem);
                                            @endphp

                                            if (
                                                this.isActive(
                                                    {{ \Illuminate\Support\Js::from($subItemUrl) }}
                                                )
                                            ) {
                                                this.openSubmenus[
                                                    '{{ $groupIndex }}-{{ $itemIndex }}'
                                                ] = true;
                                            } @endforeach
         
                 @endif
         
                 @endforeach
         
                 @endforeach
             },
         
             toggleSubmenu(groupIndex, itemIndex) {
         
                 const key = groupIndex + '-' + itemIndex;
         
                 const newState = !this.openSubmenus[key];
         
                 // Close all other submenus
                 if (newState) {
                     this.openSubmenus = {};
                 }
         
                 this.openSubmenus[key] = newState;
             },
         
             isSubmenuOpen(groupIndex, itemIndex) {
         
                 const key = groupIndex + '-' + itemIndex;
         
                 return this.openSubmenus[key] || false;
             },
         
             isAnyActive(paths) {
         
                 return Array.isArray(paths) &&
                     paths.some((path) => this.isActive(path));
             },
         
             isActive(path) {
         
                 if (!path || path === '#') {
                     return false;
                 }
         
                 let normalizedPath = path;
         
                 // Handle absolute URLs
                 if (path.includes('://')) {
         
                     try {
                         normalizedPath = new URL(path).pathname;
                     } catch (e) {
                         return false;
                     }
                 }
         
                 // Normalize trailing slash
                 normalizedPath = normalizedPath.replace(/\/+$/, '');
         
                 const current =
                     window.location.pathname.replace(/\/+$/, '');
         
                 return current === normalizedPath ||
                     current.startsWith(normalizedPath + '/');
             }
         }">

             <nav>

                 <div class="flex flex-col gap-5">

                     @foreach ($menuGroups as $groupIndex => $menuGroup)

                         <!-- ================================================= -->
                         <!-- Menu Group -->
                         <!-- ================================================= -->

                         <div>

                             <!-- Group Title -->

                             <h2
                                 class="mb-3 px-2 text-[11px] font-semibold uppercase
                                               leading-5 tracking-wider text-neutral-400 hidden">

                                 {{ $menuGroup['title'] }}

                             </h2>


                             <!-- Menu Items -->

                             <ul class="flex flex-col gap-1">

                                 @foreach ($menuGroup['items'] as $itemIndex => $item)

                                     @php
                                         $itemUrl = MenuStudentPortal::itemUrl($item);
                                     @endphp

                                     <li>

                                         @if (isset($item['subItems']))

                                             @php
                                                 $subItemUrls = collect($item['subItems'])
                                                     ->map(fn($subItem) => MenuStudentPortal::itemUrl($subItem))
                                                     ->filter(fn($url) => $url !== '#')
                                                     ->values()
                                                     ->all();
                                             @endphp


                                             <!-- ================================= -->
                                             <!-- Parent Menu -->
                                             <!-- ================================= -->

                                             <button type="button"
                                                 @click="toggleSubmenu(
                                                            {{ $groupIndex }},
                                                            {{ $itemIndex }}
                                                        )"
                                                 class="menu-item group w-full"
                                                 :class="isSubmenuOpen(
                                                         {{ $groupIndex }},
                                                         {{ $itemIndex }}
                                                     ) ||
                                                     isAnyActive(
                                                         {{ \Illuminate\Support\Js::from($subItemUrls) }}
                                                     ) ?
                                                     'menu-item-active' :
                                                     'menu-item-inactive'">

                                                 <!-- Icon -->

                                                 <span
                                                     :class="isSubmenuOpen(
                                                             {{ $groupIndex }},
                                                             {{ $itemIndex }}
                                                         ) ||
                                                         isAnyActive(
                                                             {{ \Illuminate\Support\Js::from($subItemUrls) }}
                                                         ) ?
                                                         'menu-item-icon-active' :
                                                         'menu-item-icon-inactive'">

                                                     {!! MenuStudentPortal::getIconSvg($item['icon']) !!}

                                                 </span>


                                                 <!-- Name -->

                                                 <span class="menu-item-text flex items-center gap-2">

                                                     {{ $item['name'] }}

                                                     @if (!empty($item['new']))

                                                         <span class="ml-auto menu-dropdown-badge"
                                                             :class="isAnyActive(
                                                                     {{ \Illuminate\Support\Js::from($subItemUrls) }}
                                                                 ) ?
                                                                 'menu-dropdown-badge-active' :
                                                                 'menu-dropdown-badge-inactive'">

                                                             new

                                                         </span>

                                                     @endif

                                                 </span>


                                                 <!-- Chevron -->

                                                 <svg class="ml-auto h-5 w-5 shrink-0 transition-transform duration-200"
                                                     :class="isSubmenuOpen(
                                                             {{ $groupIndex }},
                                                             {{ $itemIndex }}
                                                         ) ?
                                                         'rotate-180 text-brand-500' :
                                                         ''"
                                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                                     <path stroke-linecap="round" stroke-linejoin="round"
                                                         stroke-width="2" d="M19 9l-7 7-7-7" />

                                                 </svg>

                                             </button>


                                             <!-- ================================= -->
                                             <!-- Submenu -->
                                             <!-- ================================= -->

                                             <div x-show="
                                                            isSubmenuOpen(
                                                                {{ $groupIndex }},
                                                                {{ $itemIndex }}
                                                            )
                                                        "
                                                 x-cloak>

                                                 <ul class="mt-1 space-y-1 pl-9">

                                                     @foreach ($item['subItems'] as $subItem)

                                                         @php
                                                             $subItemUrl = MenuStudentPortal::itemUrl($subItem);
                                                         @endphp

                                                         <li>

                                                             <a href="{{ $subItemUrl }}" class="menu-dropdown-item"
                                                                 :class="isActive(
                                                                         {{ \Illuminate\Support\Js::from($subItemUrl) }}
                                                                     ) ?
                                                                     'menu-dropdown-item-active' :
                                                                     'menu-dropdown-item-inactive'">

                                                                 {{ $subItem['name'] }}


                                                                 <!-- Badges -->

                                                                 <span class="ml-auto flex items-center gap-1">

                                                                     @if (!empty($subItem['new']))

                                                                         <span
                                                                             :class="isActive(
                                                                                     {{ \Illuminate\Support\Js::from($subItemUrl) }}
                                                                                 ) ?
                                                                                 'menu-dropdown-badge menu-dropdown-badge-active' :
                                                                                 'menu-dropdown-badge menu-dropdown-badge-inactive'">

                                                                             new

                                                                         </span>

                                                                     @endif


                                                                     @if (!empty($subItem['pro']))

                                                                         <span
                                                                             :class="isActive(
                                                                                     {{ \Illuminate\Support\Js::from($subItemUrl) }}
                                                                                 ) ?
                                                                                 'menu-dropdown-badge-pro menu-dropdown-badge-pro-active' :
                                                                                 'menu-dropdown-badge-pro menu-dropdown-badge-pro-inactive'">

                                                                             pro

                                                                         </span>

                                                                     @endif

                                                                 </span>

                                                             </a>

                                                         </li>

                                                     @endforeach

                                                 </ul>

                                             </div>
                                         @else
                                             <!-- ================================= -->
                                             <!-- Simple Menu -->
                                             <!-- ================================= -->

                                             <a href="{{ $itemUrl }}" class="menu-item group"
                                                 :class="isActive(
                                                         {{ \Illuminate\Support\Js::from($itemUrl) }}
                                                     ) ?
                                                     'menu-item-active' :
                                                     'menu-item-inactive'">

                                                 <!-- Icon -->

                                                 <span
                                                     :class="isActive(
                                                             {{ \Illuminate\Support\Js::from($itemUrl) }}
                                                         ) ?
                                                         'menu-item-icon-active' :
                                                         'menu-item-icon-inactive'">

                                                     {!! MenuStudentPortal::getIconSvg($item['icon']) !!}

                                                 </span>


                                                 <!-- Name -->

                                                 <span class="menu-item-text flex items-center gap-2">

                                                     {{ $item['name'] }}

                                                     @if (!empty($item['new']))

                                                         <span
                                                             class="ml-auto inline-flex items-center rounded
                                                                           bg-brand-500 px-2 py-0.5 text-xs
                                                                           font-semibold text-white">

                                                             new

                                                         </span>

                                                     @endif

                                                 </span>

                                             </a>

                                         @endif

                                     </li>

                                 @endforeach

                             </ul>

                         </div>

                     @endforeach

                 </div>

             </nav>

         </div>

     </div>


     <!-- ========================================================= -->
     <!-- Trust / Privacy Card -->
     <!-- ========================================================= -->

     <div class="lg:rounded-2xl lg:border border-brand-100 lg:bg-brand-50/60 p-0 lg:p-5 border-t lg:border-t-0 mt-10 pt-4 lg:mt-0 lg:pt-0">

         <div class="flex gap-3">

             <div
                 class="flex h-9 w-9 shrink-0 items-center justify-center
                               rounded-lg bg-brand-100 text-brand-600">

                 <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                         d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.042-.133-2.052-.382-3.016z" />

                 </svg>

             </div>


             <div>

                 <h3 class="text-sm font-semibold text-neutral-800">
                     Your privacy matters
                 </h3>

                 <p class="mt-1 text-xs leading-5 text-neutral-500">
                     We are committed to handling personal information
                     responsibly and transparently.
                 </p>

             </div>

         </div>

     </div>

 </div>
