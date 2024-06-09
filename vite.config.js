import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
	plugins: [
		vue(),
		laravel({
			input: ['resources/css/app.scss', 'resources/js/app.ts'],
			refresh: true,
		}),
	],
	resolve: {
		alias: {
			'@': path.resolve(__dirname, 'resources/js'),
			'@pages': path.resolve(__dirname, 'resources/js/Pages'),
			'@shared': path.resolve(__dirname, 'resources/js/Shared'),
			'@css': path.resolve(__dirname, 'resources/css'),
		},
	},
});
