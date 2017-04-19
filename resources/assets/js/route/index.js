import Router from 'vue-router'
import Vue from 'vue'
Vue.use(Router)

import Tag from '../dashboard/tag/Tag.vue'
import Post from '../dashboard/post/Post.vue'
import Home from '../dashboard/Home.vue'
const routes = [
    { path: '/', component: Home},
    { path: '/tags', component: Tag,
        children: [
            { path: '' }
        ]
    },
    { path: '/posts', component: Post}
]

export default new Router({
    base: '/dashboard/',
    routes
})