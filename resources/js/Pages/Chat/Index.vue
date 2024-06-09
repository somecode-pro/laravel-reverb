<template>
	<SectionWrapper>
		<div
			class="w-full max-w-2xl rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 bg-stone-800 border-stone-700"
		>
			<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
				<div class="flex justify-between items-center">
					<h2
						class="text-xl font-bold leading-tight tracking-tight md:text-2xl text-white"
					>
						Список чатов
					</h2>
				</div>
				<div class="space-y-2">
					<Link
						v-for="chat in chats"
						:key="chat.id"
						:href="`/chats/${chat.id}`"
						class="block p-4 rounded-lg border-orange-600 shadow bg-stone-900 hover:bg-stone-600"
					>
						<div class="font-medium text-white">
							{{ chat.user.name }} ({{ chat.user.email }})
						</div>
						<div class="text-sm text-gray-300">
							{{ chat.totalMessages }} сообщений
						</div>
					</Link>
				</div>
			</div>
		</div>
	</SectionWrapper>
</template>

<script lang="ts" setup>
	import { Link } from '@inertiajs/vue3';
	import SectionWrapper from '@shared/Components/SectionWrapper.vue';
	import { PropType } from 'vue';
	import ChatData = App.Data.Chat.ChatData;

	const { chats } = defineProps({
		chats: Array as PropType<ChatData[]>,
	});
</script>
