<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Messages</h2>
    
                <div
                    class="clearfix"
                    v-for="message in messages"
                >
                    @{{ message.user.name }}: @{{ message.message }}
                </div>
    
                <div class="input-group">
                    <input
                        type="text"
                        name="message"
                        class="form-control"
                        placeholder="Type your message here..."
                        v-model="newMessage"
                        @keyup.enter="sendMessage"
                    >
    
                    <button
                        class="btn btn-primary"
                        @click="sendMessage"
                    >
                        Send
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
