<script setup>
    import BreezeNavLink from '@/Components/NavLink.vue';

    defineProps({
        categoryName: {
            type: String,
        },
        categorySlug: {
            type: String,
        },
        postTags: {
            type: Array,
            default: ['Singapore', 'Asia', 'World']
        },
        showViewAll: {
            type: Boolean,
            default: true
        }
    })

</script>

<template>
    <div class="container mx-auto py-5 md:px-2 lg:px-0">
        <div class="text-center md:flex md:justify-between" :class="{ 'px-4 pt-4': categoryName==='Contribution' }">
            <div class="flex flex-col items-center justify-center space-x-2 md:flex-row md:items-baseline">
                <h1 :class="{ 'text-white': categoryName==='Contribution' }" class="font-bold text-6xl lg:text-4xl leading-relaxed lg:leading-none">{{ categoryName }}</h1>
                <div>
                    <BreezeNavLink :class="{ 'text-white': categoryName==='Contribution' }" class="text-gray-700 uppercase hover:text-orange-500 leading-3" href="#"> {{ postTags[0] }} </BreezeNavLink>
                    <BreezeNavLink :class="{ 'text-white': categoryName==='Contribution' }" class="text-gray-700 uppercase hover:text-orange-500 leading-3 mx-1" href="#"> {{ postTags[1] }} </BreezeNavLink>
                    <BreezeNavLink :class="{ 'text-white': categoryName==='Contribution' }" class="text-gray-700 uppercase hover:text-orange-500 leading-3" href="#"> {{ postTags[2] }} </BreezeNavLink>
                </div>
            </div>
            <a v-if="showViewAll" :class="{ 'text-white': categoryName==='Contribution' }" class="text-gray-700 my-2 hover:text-orange-500 leading-3 text-lg md:text-md" :href='`/category/${categorySlug}`'>
                View All {{ categoryName }} <span class="ml-1 text-xl">▸</span>
            </a>
        </div>
    </div>
</template>
