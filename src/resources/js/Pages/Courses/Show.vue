<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    course: Object,
    isEnrolled: Boolean,
});

// Formularz zapisu na kurs
const form = useForm({});

const enroll = () => {
    form.post(`/courses/${props.course.id}/enroll`, {
        preserveScroll: true,
        onSuccess: () => {
            // Pokaż komunikat sukcesu
        },
    });
};
</script>

<template>
    <Head :title="course.title" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ course.title }}
                </h2>
                <Link
                    href="/courses"
                    class="text-sm text-blue-600 hover:underline"
                >
                    ← Powrót do listy
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Główna treść -->
                    <div class="lg:col-span-2">
                        <!-- Baner kursu -->
                        <div class="h-64 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center mb-6">
                            <span class="text-white text-6xl">🎓</span>
                        </div>

                        <!-- Opis -->
                        <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
                            <h3 class="text-2xl font-bold mb-4">O kursie</h3>
                            <p class="text-gray-700 leading-relaxed">
                                {{ course.description }}
                            </p>
                        </div>

                        <!-- Lista lekcji -->
                        <div class="bg-white shadow-sm rounded-lg p-6">
                            <h3 class="text-2xl font-bold mb-4">
                                Program kursu ({{ course.lessons.length }} lekcji)
                            </h3>
                            <div class="space-y-3">
                                <div
                                    v-for="lesson in course.lessons"
                                    :key="lesson.id"
                                    class="flex items-center justify-between p-4 border rounded hover:bg-gray-50"
                                >
                                    <div class="flex items-center space-x-3">
                                        <span class="text-2xl">📹</span>
                                        <div>
                                            <p class="font-semibold">{{ lesson.title }}</p>
                                            <p class="text-sm text-gray-500">
                                                {{ lesson.duration_minutes }} minut
                                            </p>
                                        </div>
                                    </div>
                                    <span
                                        v-if="isEnrolled"
                                        class="text-green-600 text-sm"
                                    >
                                        ✓ Dostępne
                                    </span>
                                    <span
                                        v-else
                                        class="text-gray-400 text-sm"
                                    >
                                        🔒 Zablokowane
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <div class="bg-white shadow-lg rounded-lg p-6 sticky top-6">
                            <div class="text-center mb-6">
                                <p class="text-4xl font-bold text-green-600 mb-2">
                                    {{ course.price }} zł
                                </p>
                                <p class="text-sm text-gray-500">
                                    Jednorazowa płatność
                                </p>
                            </div>

                            <!-- Przycisk zapisu -->
                            <button
                                v-if="!isEnrolled"
                                @click="enroll"
                                :disabled="form.processing"
                                class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 text-white font-bold py-3 px-4 rounded-lg transition"
                            >
                                {{ form.processing ? 'Zapisywanie...' : 'Zapisz się na kurs' }}
                            </button>

                            <div
                                v-else
                                class="w-full bg-green-100 text-green-800 font-semibold py-3 px-4 rounded-lg text-center"
                            >
                                ✓ Jesteś zapisany
                            </div>

                            <!-- Informacje o kursie -->
                            <div class="mt-6 space-y-4">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-600">Poziom:</span>
                                    <span class="font-semibold capitalize">{{ course.level }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-600">Czas trwania:</span>
                                    <span class="font-semibold">{{ course.duration_hours }}h</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-600">Lekcje:</span>
                                    <span class="font-semibold">{{ course.lessons.length }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-600">Instruktor:</span>
                                    <span class="font-semibold">{{ course.instructor.name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>