@extends('layouts.app')

@section('title', 'Покажи реакцию!')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <button
            id="heart"
            class="reaction-button"
        >
            ❤️
        </button>
        <button
            id="star"
            class="reaction-button"
        >
            ⭐
        </button>
        <button
            id="rocket"
            class="reaction-button"
        >
            🚀
        </button>
    </div>
@endsection

@section('script')
    <script type="module">
        function flyEmoji(emoji, button) {
            const rect = button.getBoundingClientRect();
            const flyEmoji = document.createElement('div');
            flyEmoji.innerText = emoji;
            flyEmoji.style.position = 'fixed';
            flyEmoji.style.left = `${rect.left + rect.width / 2}px`;
            flyEmoji.style.top = `${rect.top + rect.height / 2}px`;
            flyEmoji.style.transition = 'all 1s ease-out';
            flyEmoji.style.fontSize = '3rem';
            flyEmoji.style.pointerEvents = 'none';

            document.body.appendChild(flyEmoji);

            setTimeout(() => {
                flyEmoji.style.top = `${rect.top - rect.height}px`;
                flyEmoji.style.opacity = 0;
                flyEmoji.style.transform = 'translate(-50%, -50%) scale(2)';
            }, 10);

            setTimeout(() => {
                flyEmoji.remove();
            }, 1000);
        }

        window.Echo.channel('reaction')
            .listen('ReactedEvent', (e) => {
                flyEmoji(e.emoji, document.getElementById(e.buttonId));
            });

        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function() {
                window.axios.post('/reaction', {
                    buttonId: button.getAttribute('id'),
                    emoji: button.innerText,
                })
            });
        });
    </script>
@endsection
