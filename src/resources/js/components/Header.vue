<script setup>
const loggedIn = defineProps(['user']);
</script>

<template>
     <header class="py-6 bg-gray-100 shadow">
        <div class="container md:px-2 px-2 mx-auto">
            <nav class="flex gap-4 justify-between">
                <h2 class="text-xl-font-bold">
                    API Rest Countries
                </h2>
                <span class="text-gray-600">
                    Welcome, {{ loggedIn.user.given_name }} |
                    <a class="underline" href="logout">Logout</a>
                </span>
            </nav>
        </div>
    </header>
</template>