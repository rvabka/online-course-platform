<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    courses: Object,
});
</script>

<template>
    <Head title="Kursy" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dostępne kursy
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Siatka kursów -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div
                        v-for="course in courses.data"
                        :key="course.id"
                        class="bg-white overflow-hidden shadow-sm rounded-lg hover:shadow-lg transition"
                    >
                        <!-- Miniaturka -->
                        <div class="h-48 bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                            <span class="text-white text-4xl">🎓</span>
                        </div>

                        <!-- Treść -->
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ course.level }}
                                </span>
                                <span class="text-sm text-gray-500">
                                    {{ course.duration_hours }}h
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-gray-800 mb-2">
                                {{ course.title }}
                            </h3>

                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ course.description }}
                            </p>

                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Instruktor:</p>
                                    <p class="text-sm font-semibold">{{ course.instructor.name }}</p>
                                </div>
                                <p class="text-2xl font-bold text-green-600">
                                    {{ course.price }} zł
                                </p>
                            </div>

                            <Link
                                :href="`/courses/${course.id}`"
                                class="mt-4 w-full block text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition"
                            >
                                Zobacz szczegóły
                            </Link>
                        </div>
                    </div>
                </div>

                <!-- Paginacja -->
                <div v-if="courses.links.length > 3" class="mt-8 flex justify-center space-x-2">
                    <Link
                        v-for="(link, index) in courses.links"
                        :key="index"
                        :href="link.url"
                        :class="[
                            'px-4 py-2 rounded',
                            link.active ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300',
                        ]"
                        v-html="link.label"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>