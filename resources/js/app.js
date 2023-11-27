import './bootstrap';
import { createApp } from 'vue'
import Post from './components/PostComponent.vue'

const post = createApp({});

post.component('post-component', Post);

post.mount('#app')
