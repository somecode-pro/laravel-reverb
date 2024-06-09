<template>
	<SectionWrapper>
		<div
			class="w-full rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 bg-stone-900 border-stone-700"
		>
			<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
				<h1
					class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
				>
					Вход
				</h1>
				<form
					@submit.prevent="form.post('/login')"
					class="space-y-4 md:space-y-6"
				>
					<div>
						<label
							for="email"
							class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
							>Электронная почта</label
						>
						<input
							v-model="form.email"
							type="email"
							name="email"
							id="email"
							class="border sm:text-sm rounded-lg focus:ring-primary-600 block w-full p-2.5 bg-stone-700 border-stone-600 placeholder-stone-400 text-white focus:ring-blue-500 dark:focus:border-blue-500"
							:class="{ 'border-red-500': form.errors.email }"
							placeholder="name@areaweb.su"
						/>
						<p
							v-if="form.errors.email"
							class="text-red-500 text-xs mt-1"
						>
							{{ form.errors.email }}
						</p>
					</div>
					<div>
						<label
							for="password"
							class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
							>Пароль</label
						>
						<input
							v-model="form.password"
							type="password"
							name="password"
							id="password"
							placeholder="••••••••"
							class="border sm:text-sm rounded-lg focus:ring-primary-600 block w-full p-2.5 bg-stone-700 border-stone-600 placeholder-stone-400 text-white focus:ring-blue-500 dark:focus:border-blue-500"
							:class="{
								'border-red-500': form.errors.password,
							}"
						/>
						<p
							v-if="form.errors.password"
							class="text-red-500 text-xs mt-1"
						>
							{{ form.errors.password }}
						</p>
					</div>
					<button
						@click="form.post('/login')"
						type="submit"
						class="w-full text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-amber-700"
					>
						Войти
					</button>
					<p
						v-if="false"
						class="text-sm font-light text-gray-500 dark:text-gray-400"
					>
						Нет учетной записи?
						<a
							href="#"
							class="font-medium text-primary-600 hover:underline dark:text-primary-500"
							>Создай!</a
						>
					</p>
				</form>
			</div>
		</div>
	</SectionWrapper>
</template>

<script lang="ts" setup>
	import { useForm } from '@inertiajs/vue3';
	import SectionWrapper from '@shared/Components/SectionWrapper.vue';

	const { error } = defineProps({ error: String });

	const form = useForm({
		email: 'user@example.com',
		password: 'password',
	});
</script>
