<template>
	<main>
		<slot />
		<button
			v-if="user"
			@click="router.post('/login/logout')"
			class="fixed top-5 right-5 z-50 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
		>
			Выйти
		</button>
	</main>
</template>

<script lang="ts" setup>
	import { computed } from 'vue';
	import { usePage, router } from '@inertiajs/vue3';

	const page = usePage();

	// @ts-ignore
	const user = computed(() => page.props.auth.user);
</script>

<style lang="scss" scoped></style>
