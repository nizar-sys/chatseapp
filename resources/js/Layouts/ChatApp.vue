<template>
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm expand-header">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-item flex-row ml-auto">

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </a>

                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <img src="/assets/img/90x90.jpg" class="img-fluid mr-2" alt="avatar">
                                <div class="media-body">
                                    <h5>{{ $page.props.auth.user.name }}</h5>
                                    <p>Project Leader</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="user_profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Profile</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="apps_mailbox.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>Inbox</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="auth_lockscreen.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Lock Screen</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <form @submit.prevent="logout">

                            <button :class="{ 'opacity-25': formLogout.processing }" :disabled="formLogout.processing" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                            </button>
                            </form>
                        </div>
                    </div>
                    
                </li>
            </ul>
        </header>
    </div>

    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="chat-section layout-top-spacing">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12">

                            <div class="chat-system">
                                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                                <div class="user-list-box">
                                    <div class="search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        <input type="text" id="search-input" class="form-control" placeholder="Search" @keyup="searchUser"/>
                                    </div>
                                    <div class="people">
                                        
                                        <person-comp v-for="(user, i) in userList" :name="user.name" :preview_chat="'Mulai pesan baru dengan ' + user.name" :time_chat="'00:00'" :key="i" @click.prevent="findChat" :data_chat="user.id"></person-comp>    

                                        <person-comp v-for="(chat, i) in chatList" :name="$page.props.auth.user.id == chat.to_id ? chat.from_user.name : chat.to_user.name" :preview_chat="chat.preview != null ? chat.preview.body : ''" :time_chat="chat.preview != null ? chat.preview.time : ''" :key="i" @click.prevent="findChat" :data_chat="chat.id"></person-comp>                          
                                    </div>
                                </div>
                                <div class="chat-box">

                                    <div class="chat-not-selected">
                                        <p> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Click User To Chat</p>
                                    </div>

                                    <div class="chat-box-inner">
                                        <div class="chat-meta-user">
                                            <div class="current-chat-user-name"><span><img src="/assets/img/90x90.jpg" alt="dynamic-image"><span class="name"></span></span></div>

                                            <div class="chat-action-btn align-self-center">
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-2">
                                                        <a class="dropdown-item" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-conversation-box">
                                            <div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll">
                                                <div v-for="(chat, i) in chatList" class="chat" :data-chat="chat.id">
                                                    <div class="" v-for="(message, i) in chat.child_message">

                                                    <div class="conversation-start" v-if="parseInt(message.day) > today.getDate()">
                                                        <span>{{message.day}}</span>
                                                    </div>
                                                    <div :class="message.sender_id == $page.props.auth.user.id ? 'bubble me' : 'bubble you'">
                                                        {{message.body}}
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="chat" v-for="(user, i) in userList" :data-chat="user.id" v-if="userList.length > 0">
                                                    <div class="conversation-start">
                                                        <span>Mulai Pesan baru dengan {{user.name}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-footer">
                                            <div class="chat-input">
                                                <form class="chat-form" action="javascript:void(0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                                    <input type="text" class="mail-write-box form-control" placeholder="Message" @keydown="sendMessage"/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
</template>

<script>
    import PersonComp from '@/Components/PersonComp.vue';
    export default {
        props: ['chat'],
        components:{
            PersonComp
        },
        data(){
            return {
                formLogout: this.$inertia.form({
                }),
                chatList: {},
                today: new Date(),
                userList: {},
            }
        },
        mounted(){
            this.chatList = this.$page.props.chat;
            $('.hamburger, .chat-system .chat-box .chat-not-selected p').on('click', function(event) {
                $(this).parents('.chat-system').find('.user-list-box').toggleClass('user-list-box-show')
            })
            this.listenNewMessage();
        },
        methods: {
            logout(){
                this.formLogout.post(this.route('logout'), {
                    onFinish: () => {
                        Snackbar.show({
                            pos: 'bottom-center',
                            showAction: false,
                            text: 'Logout Successfully',
                            backgroundColor: '#383838',
                            textColor: '#fff',
                            actionTextColor: '#fff',
                            hideDuration: 3000,
                            stack: false
                        });
                    }
                })
            },

            findChat(e){
                if(e.target.classList.contains('active')){
                    return false;
                }else{
                    var findChat = $(e.target).attr('data-chat');
                    this.listenMessage(findChat);
                    var personName = $(e.target).find('.user-name').text();
                    var personImage = $(e.target).find('img').attr('src');
                    var hideTheNonSelectedContent = $(e.target).parents('.chat-system').find('.chat-box .chat-not-selected').hide();
                    var showChatInnerContent = $(e.target).parents('.chat-system').find('.chat-box .chat-box-inner').show();

                    if (window.innerWidth <= 767) {
                        $('.chat-box .current-chat-user-name .name').html(personName.split(' ')[0]);
                    } else {
                        $('.chat-box .current-chat-user-name .name').html(personName);   
                    }
                    $('.chat-box .current-chat-user-name img').attr('src', personImage);
                    $('.chat').removeClass('active-chat');
                    $('.user-list-box .person').removeClass('active');
                    $('.chat-box .chat-box-inner').css('height', '100%');
                    $('.chat-box .overlay-phone-call').css('display', 'block');
                    $('.chat-box .overlay-video-call').css('display', 'block');
                    $(this).addClass('active');
                    $('.chat[data-chat = '+findChat+']').addClass('active-chat');
                }
                if ($(this).parents('.user-list-box').hasClass('user-list-box-show')) {
                    $(this).parents('.user-list-box').removeClass('user-list-box-show');
                }
                $('.chat-meta-user').addClass('chat-active');
                $('.chat-box').css('height', 'calc(100vh - 158px)');
                $('.chat-footer').addClass('chat-active');
                $('.mail-write-box .form-control').attr('data', findChat)
                $('#search-input').val('')
            },

            sendMessage(e){
                if(e.key === 'Enter') {
                    var chatInput = e.target;
                    var chatMessageValue = chatInput.value
                    if (chatMessageValue === '') { return; }
                    var chatId = $('.chat.active-chat').attr('data-chat');
                    var chatMessage = {
                        body: chatMessageValue,
                        sender_id: this.$page.props.auth.user.id,
                        message_id: chatId,
                        created_at: `${this.today.getFullYear()}-${this.today.getMonth() + 1}-${this.today.getDate()} ${this.today.getHours()}:${this.today.getMinutes()}:${this.today.getSeconds()}`,
                    }
                    if(chatMessage.message_id == undefined){
                        alert("Ulangi pilih pesan")
                        chatInput.value = '';
                    } else {
                        axios.post(this.route('chat.store'), chatMessage).then(response => {
                            this.chatList = response.data.data.chat;
                            this.listenMessage(chatMessage.message_id);
                            const getScrollContainer = document.querySelector('.chat-conversation-box');
                            getScrollContainer.scrollTop = getScrollContainer.scrollHeight;
                            chatInput.value = '';
                            this.userList = {};
                        }).catch(error => {
                            console.log(error);
                        });
                    }
                }
            },

            listenMessage(message_id){
                Echo.channel("getMessage"+message_id)
                .listen('.getMessage.'+message_id, (e) => {
                    this.chatList = e.data.chat;
                    const getScrollContainer = document.querySelector('.chat-conversation-box');
                    getScrollContainer.scrollTop = getScrollContainer.scrollHeight;
                });
            },

            searchUser(e) {
                var searchValue = e.target.value;
                if(searchValue == ''){
                    this.userList = {}
                    this.chatList = this.$page.props.chat;
                } else {
                    // filter chat
                    var filterChat = this.chatList.filter(chat => {
                        if(chat.from_user.name.toLowerCase().includes(searchValue.toLowerCase())){
                            return chat;
                        }
                    })
                    if(filterChat.length > 0){
                        this.chatList = filterChat;
                    } else {
                        axios.get('/user?search='+searchValue).then(response => {
                            this.userList = response.data.data;
                            this.chatList = this.$page.props.chat;
                        }).catch(error => {
                            console.log(error);
                        });
                    }
                }
            },

            listenNewMessage(){
                Echo.channel("newMessage."+this.$page.props.auth.user.id)
                .listen('.newMessage', (e) => {
                    this.chatList = e.data.chat;
                });
            }
        },

    }
</script>