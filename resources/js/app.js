/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.EventBus = new Vue();

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);

window.moment = require('moment');
// var moment = require('moment');
// moment().format();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('featured', require('./components/FeaturedComponent.vue').default);
Vue.component('larticles', require('./components/LatestArticlesComponent.vue').default);
Vue.component('articles', require('./components/ArticlesComponent.vue').default);
Vue.component('singlearticle', require('./components/ArticleComponent.vue').default);
Vue.component('comments', require('./components/CommentsComponent.vue').default);
Vue.component('commentsform', require('./components/CommentsFormComponent.vue').default);
Vue.component('newarticle', require('./components/NewArticleComponent.vue').default);
Vue.component('categories', require('./components/CategoriesComponent.vue').default);
Vue.component('category', require('./components/CategoryComponent.vue').default);
Vue.component('team', require('./components/TeamComponent.vue').default);
Vue.component('profile', require('./components/ProfileComponent.vue').default);
Vue.component('profileguest', require('./components/ProfileGuestComponent.vue').default);
Vue.component('users', require('./components/admin/UsersComponent.vue').default);
Vue.component('editarticle', require('./components/EditArticleFormComponent.vue').default);
Vue.component('edituser', require('./components/admin/EditUserComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
