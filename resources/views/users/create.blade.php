<template>
    <div class="layout">
        <i-breadcrumb :style="{margin: '24px 24px'}">
            <i-breadcrumb-item>users</i-breadcrumb-item>
            <i-breadcrumb-item>create</i-breadcrumb-item>
        </i-breadcrumb>
        <i-content :style="{padding: '24px', minHeight: '280px', background: '#fff'}">
            <i-row type="flex" justify="start" align="middle" :gutter="16" v-for="(value,name) in info"  :style="{margin:'20px 0'}">
                <i-col span="2" :style="{textAlign:'right'}">{{name}}</i-col>
                <i-col span="6">
                    <i-input v-model="info[name]"></i-input>
                </i-col>
            </i-row>
            <i-row>
                <i-col span="6" offset="2" :style="{textAlign:'right'}">
                    <i-button type="success" @click="goSave">Save</i-button>
                    <i-button type="info" @click="goBack">Back</i-button>
                </i-col>
            </i-row>
        </i-content>
    </div>
</template>
<script type="text/javascript">
    module.exports = {
        data: function() {
            return {
                routeId: this.id,
                info:{
                                id:'',
                    phone:'',
                    password:'',
                    is_real_name:'',
                    balance:'',
                    nick_name:'',
                    invite_code:'',
                    deleted_at:'',
                    created_at:'',
                    updated_at:'',

                }
            }
        },
        props: ['id'],
        methods: {
            goBack: function() {
                this.$router.go(-1)
            },
            goSave: function() {
                this.axios
                    .post('/api/users/save',JSON.stringify(this.info))
                    .then(response=>{
                        Object.assign(this.info ,response.data.data)
                    })
            }
        }
    }
</script>