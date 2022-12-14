<script setup>
    import { ref } from 'vue';
    import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
    import BreezeDropdown from '@/Components/Dropdown.vue';
    import BreezeDropdownLink from '@/Components/DropdownLink.vue';
    import BreezeNavLink from '@/Components/NavLink.vue';
    import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
    import Cart from '@/Utilities/Cart.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    const showingNavigationDropdown = ref(false);
</script>

<template>
    <nav class="bg-white border-b border-gray-100 shadow-lg">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <Link :href="route('dashboard')">
                            <BreezeApplicationLogo class="block h-9 w-auto" />
                        </Link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <BreezeNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </BreezeNavLink>
                        <BreezeNavLink :href="route('partners.index')" :active="route().current('partners.index') || route().current('partners.create') || route().current('partners.view') || route().current('partners.search')">
                            Partners
                        </BreezeNavLink>
                        <BreezeNavLink :href="route('events.index')" :active="route().current('events.*') || route().current('event.*') || route().current('event.profile')">
                            Events
                        </BreezeNavLink>
                        <BreezeNavLink :href="route('registration.index')" :active="route().current('registration.*')">
                            Registrations
                        </BreezeNavLink>
                        <BreezeNavLink :href="route('users.index')" :active="route().current('users.index')">
                            Users
                        </BreezeNavLink>
                        <BreezeNavLink :href="route('category.index')" :active="route().current('category.index') || route().current('category.view') || route().current('category.search')">
                            Categories
                        </BreezeNavLink>
                        <BreezeNavLink :href="route('settings')" :active="route().current('settings')">
                            Settings
                        </BreezeNavLink>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative ring-0">
                        <div class="flex">
                            <BreezeDropdown align="right" width="48" contentClasses="bg-white bg-opacity-80">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center p-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="lg:flex xl:flex sm:hidden">{{$page.props.auth.user ? $page.props.auth.user.niceName : "Hello Guest"}}</span>
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <template v-if="$page.props.auth.user">
                                        <span class="lg:hidden xl:hidden sm:flex px-4 py-2 text-gray-700 text-sm">
                                            <span class="italic mr-1">Hello</span>{{$page.props.auth.user ? $page.props.auth.user.niceName : "Hello Guest"}}
                                        </span>
                                        <BreezeDropdownLink :href="route('logout')" as="button" class="hover:bg-gray-100">My Profile</BreezeDropdownLink>
                                        <BreezeDropdownLink :href="route('logout')" method="post" as="button" class="border-t hover:bg-gray-100 border-gray-200">Log Out</BreezeDropdownLink>
                                    </template>
                                    <BreezeDropdownLink v-else :href="route('login')" as="button" class="hover:bg-gray-100">Log In</BreezeDropdownLink>

                                </template>
                            </BreezeDropdown>
                            <!-- Display cart -->
                            <Cart />
                        </div>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <BreezeResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</BreezeResponsiveNavLink>
                <BreezeResponsiveNavLink :href="route('partners.index')" :active="route().current('partners.index')">Partners</BreezeResponsiveNavLink>
                <BreezeResponsiveNavLink :href="route('events.index')" :active="route().current('events.index') || route().current('events.create')">Events</BreezeResponsiveNavLink>
                <BreezeResponsiveNavLink :href="route('registrants.index')" :active="route().current('registrants.index')">Registrations</BreezeResponsiveNavLink>
                <BreezeResponsiveNavLink :href="route('users.index')" :active="route().current('users.index')">Users</BreezeResponsiveNavLink>
                <BreezeResponsiveNavLink :href="route('category.index')" :active="route().current('category.index')">Categories</BreezeResponsiveNavLink>
                <BreezeResponsiveNavLink :href="route('settings')" :active="route().current('settings')">Settings</BreezeResponsiveNavLink>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800" v-if="$page.props.auth.user">{{ $page.props.auth.user.niceName }}</div>
                    <div class="font-medium text-sm text-gray-500" v-if="$page.props.auth.user">{{ $page.props.auth.user.email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">My Profile</BreezeResponsiveNavLink>
                    <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">Log Out</BreezeResponsiveNavLink>
                </div>
            </div>
        </div>
    </nav>
</template>
