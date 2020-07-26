import VueRouter from 'vue-router'
import Home from './Controllers/Home.vue'
import About from './Controllers/About.vue'
import Contact from './Controllers/Contact.vue'
import Project from './Controllers/Project.vue'

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/about',
        component: About
    },
    {
        path: '/contact',
        component: Contact
    },
    {
        path: '/project',
        component: Project
    }
]

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});