<style scoped>
    .layout-nav {
        width: 420px;
        margin: 0 auto;
        margin-right: 20px;
        color: white;
    }

    .layout-logo {
        border-radius: 3px;
        float: left;
    }
</style>
<template>
    <div>
        <i-layout>
            <i-header :style="{background:'#000'}">
                <i-menu mode="horizontal" theme="dark" active-name="1" :style="{background:'#000'}" >
                    <h2 class="layout-logo" style="color:white;">Title</h2>
                    <div class="layout-nav">
                    </div>
                </i-menu>
            </i-header>
            <i-layout>
                <i-sider hide-trigger :style="{ height: '100vh',background:'#fff'}">
                    <i-menu theme="light" width="auto" :active-name="getActiveName" :open-names="['1']">
                        <template v-for="item in menu" >
                            <i-menu-item v-if="typeof(item.sub_menu) == 'undefined'" :name="item.name">
                                <i-icon :type="item.icon"></i-icon>
                                <router-link :to="getRoutePath(item.name)" tag="span">{{item.title}}</router-link>
                            </i-menu-item>
                            <i-submenu v-if="typeof(item.sub_menu) != 'undefined'" name="1">
                                <template slot="title">
                                    <i-icon :type="item.icon"></i-icon>{{item.title}}
                                </template>
                                <i-menu-item v-for="sub in item.sub_menu" :name="sub.name">
                                    <router-link :to="getRoutePath(sub.name)" tag="span">{{sub.title}}</router-link>
                                </i-menu-item>
                            </i-submenu>
                        </template>
                    </i-menu>
                </i-sider>
                <i-layout :style="{padding: '0 24px 24px'}">
                    <router-view></router-view>
                </i-layout>
            </i-layout>
        </i-layout>
    </div>
</template>
<script>

    module.exports = {
        data: function () {
            return {
                // config global menu list
                menu:[{
                    icon: 'ios-people',
                    title: 'Menu',
                    sub_menu:[{
                        icon: 'ios-people',
                        title: 'labelss list',
                        name:'labelss_list'
                    },
{
                        icon: 'ios-people',
                        title: 'orderss list',
                        name:'orderss_list'
                    },
{
                        icon: 'ios-people',
                        title: 'treasures list',
                        name:'treasures_list'
                    },
{
                        icon: 'ios-people',
                        title: 'users list',
                        name:'users_list'
                    },
//-----menus append-----



]
                }],

                // config global routes
                routes: [{
                    path: '*',
                    redirect: {name: 'labelss_list'}
                },{
                    name: 'labelss_list',
                    path: '/labelss/list',
                    url: '/layout/render?path=/labelss/list'
                },
{
                    name: 'labelss_create',
                    path: '/labelss/create',
                    url: '/layout/render?path=/labelss/create'
                },
{
                    name: 'labelss_detail',
                    path: '/labelss/detail',
                    url: '/layout/render?path=/labelss/detail'
                },
{
                    name: 'labelss_edit',
                    path: '/labelss/edit',
                    url: '/layout/render?path=/labelss/edit'
                },
{
                    name: 'orderss_list',
                    path: '/orderss/list',
                    url: '/layout/render?path=/orderss/list'
                },
{
                    name: 'orderss_create',
                    path: '/orderss/create',
                    url: '/layout/render?path=/orderss/create'
                },
{
                    name: 'orderss_detail',
                    path: '/orderss/detail',
                    url: '/layout/render?path=/orderss/detail'
                },
{
                    name: 'orderss_edit',
                    path: '/orderss/edit',
                    url: '/layout/render?path=/orderss/edit'
                },
{
                    name: 'treasures_list',
                    path: '/treasures/list',
                    url: '/layout/render?path=/treasures/list'
                },
{
                    name: 'treasures_create',
                    path: '/treasures/create',
                    url: '/layout/render?path=/treasures/create'
                },
{
                    name: 'treasures_detail',
                    path: '/treasures/detail',
                    url: '/layout/render?path=/treasures/detail'
                },
{
                    name: 'treasures_edit',
                    path: '/treasures/edit',
                    url: '/layout/render?path=/treasures/edit'
                },
{
                    name: 'users_list',
                    path: '/users/list',
                    url: '/layout/render?path=/users/list'
                },
{
                    name: 'users_create',
                    path: '/users/create',
                    url: '/layout/render?path=/users/create'
                },
{
                    name: 'users_detail',
                    path: '/users/detail',
                    url: '/layout/render?path=/users/detail'
                },
{
                    name: 'users_edit',
                    path: '/users/edit',
                    url: '/layout/render?path=/users/edit'
                },
//-----routes append-----



]
            }
        },
        computed: {
            getActiveName: function() {
                    return this.$route.name
                }
        },
        methods: {
            getRoutePath: function(name) {
                var routes = this.routes
                for (var i in routes) {
                    if(name == routes[i].name) {
                        return routes[i].path
                    }
                }
                return ''
            }
        }
    }
</script>
