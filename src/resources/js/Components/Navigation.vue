<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
        default: false,
    },
    canRegister: {
        type: Boolean,
        default: false,
    },
    user: {
        type: Object,
        default: null,
    },
});
</script>

<template>
    <header id="header">
        <div class="header-logo">
            <img src="/header-logo.svg" alt="Logo">
        </div>
        <nav id="header-nav">
            <Link href="/">Home</Link>
            <a href="#pricing">Pricing</a>
            <Link v-if="canRegister" href="/register">Register</Link>
            <Link v-if="canLogin && !user" href="/login">Login</Link>
        </nav>
        <div id="header-login">
            <template v-if="user">
                <Link href="/dashboard" class="user-link">{{ user.name }}</Link>
            </template>
            <template v-else>
                <Link v-if="canLogin" href="/login">Sign in</Link>
                <Link v-if="canLogin" href="/login" id="login-btn">Login</Link>
            </template>
        </div>
    </header>
</template>

<style scoped>
.user-link {
    text-decoration: none;
    color: rgb(78, 78, 78);
    font-family: "lufga", sans-serif;
    font-size: 1.1vw;
    transition: all 0.5s ease;
}

.user-link:hover {
    color: rgb(0, 0, 0);
}
</style>