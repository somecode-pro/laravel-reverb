<template>
	<SectionWrapper>
		<div
			class="w-full max-w-xl rounded-lg shadow border bg-stone-800 border-stone-700"
		>
			<div class="p-6 space-y-4 sm:p-8">
				<h1
					class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl"
				>
					{{ companion.name }} ({{ companion.email }})
				</h1>
				<div class="space-y-4">
					<div
						ref="messagesRef"
						class="overflow-y-auto h-96 space-y-4"
					>
						<div
							v-for="message in messages"
							:key="message.id"
							class="flex"
							:class="{ 'justify-end': message.isOwn }"
						>
							<div
								class="w-3/4 p-4 rounded-lg shadow-md"
								:class="{
									'bg-stone-300': !message.isOwn,
									'bg-orange-500': message.isOwn,
									'text-white': message.isOwn,
									'text-stone-800': !message.isOwn,
								}"
							>
								<p>{{ message.message }}</p>
								<span
									class="text-xs"
									:class="{
										'text-stone-500': !message.isOwn,
										'text-orange-200': message.isOwn,
									}"
									>{{ message.createdAt }}</span
								>
							</div>
						</div>
					</div>
					<div>
						<input
							v-model="form.message"
							@keydown.enter.prevent="submit"
							type="text"
							id="message"
							placeholder="Введи свое сообщение.."
							class="w-full p-2.5 bg-stone-700 border border-stone-600 rounded-lg placeholder-stone-400 text-white focus:ring-primary-600 focus:border-primary-600 sm:text-sm"
						/>
						<p
							v-if="form.errors.message"
							class="mt-1 text-xs text-red-500"
						>
							{{ form.errors.message }}
						</p>
					</div>
					<div class="flex items-center justify-between">
						<button
							@click="submit"
							type="submit"
							class="px-5 py-2.5 text-sm font-medium text-center text-white rounded-lg bg-amber-700"
						>
							Отправить
						</button>
					</div>
				</div>
			</div>
		</div>
	</SectionWrapper>
	<Link
		href="/chats"
		class="fixed top-5 left-5 z-50 font-medium text-gray-400 hover:underline dark:text-primary-500"
		>К списку чатов</Link
	>
</template>

<script lang="ts" setup>
	import { onMounted, PropType, ref } from 'vue';
	import { usePage, useForm, Link } from '@inertiajs/vue3';
	import SectionWrapper from '@shared/Components/SectionWrapper.vue';
	import MessageData = App.Data.Chat.MessageData;
	import UserData = App.Data.User.UserData;
	import SendMessageData = App.Data.Chat.SendMessageData;

	const { chatId } = defineProps({
		messages: Array as PropType<MessageData[]>,
		chatId: Number,
		companion: Object as PropType<UserData>,
	});

	onMounted(() => {
		scrollToBottom();
	});

	const messagesRef = ref(null);

	const form = useForm(<SendMessageData>{
		message: '',
	});

	const submit = () => {
		form.post(`/chats/${chatId}/message`, {
			onSuccess: () => {
				form.reset();
				scrollToBottom();
			},
		});
	};

	const scrollToBottom = () => {
		if (messagesRef.value) {
			messagesRef.value.scrollTop = messagesRef.value.scrollHeight;
		}
	};
</script>
