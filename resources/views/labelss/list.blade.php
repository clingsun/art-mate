<template>
    <div class="layout">
        <i-breadcrumb :style="{margin: '24px 24px'}">
            <i-breadcrumb-item>labelss</i-breadcrumb-item>
            <i-breadcrumb-item>list</i-breadcrumb-item>
        </i-breadcrumb>
        <i-content :style="{padding: '24px', minHeight: '280px', background: '#fff'}">
            <i-row :style="{margin: '20px 0 '}" type="flex" justify="left">
                <i-col :style="{padding:'10px 0',textAlign:'right'}" span='6' v-for="value in search_fields">
                    {{value}}：
                    <i-input v-model="search_fields[value]" placeholder="" style="width: 200px"></i-input>
                </i-col>
            </i-row>
            <i-row>
                <i-col span="12" >
                    <i-button type="default" @click="invokeBatchDelete">Batch Delete</i-button>
                </i-col>
                <i-col span="12" :style="{textAlign:'right'}">
                    <i-button type="info" @click="invokeSearch">Search</i-button>
                    <i-button type="default" @click="invokeCreate">New</i-button>
                </i-col>
            </i-row>
            <br>
            <i-table :columns="col_list" :data="main_data"  @on-selection-change="table_selection_change">
                <template slot-scope="{row}" slot="detail_button">
                    <i-button type="info" size="small" @click="invokeView(row)">View</i-button>
                    <i-button type="info" size="small" @click="invokeDetail(row)">Detail</i-button>
                    <i-button type="info" size="small" @click="invokeEdit(row)">Edit</i-button>
                    <i-button type="defaut" size="small" @click="invokeDelete(row)">Delete</i-button>
                </template>
            </i-table>
            <i-page :styles="{margin:'20px'}" :total="pageTotal" :page-size="pageSize" show-elevator show-total  @on-change="invokeChangePage" ></i-page>
            <i-modal v-model="viewModal" :width="50" title="preview">
                <i-row type="flex" justify="start" align="middle" :gutter="16" v-for="(value, name) in viewModalData" :style="{margin:'5px 0'}">
                    <i-col span="6" :style="{textAlign:'right'}">{{name}}</i-col>
                    <i-col span="12">
                        <i-input v-model="value"></i-input>
                    </i-col>
                </i-row>
            </i-modal>
            <i-modal v-model="deleteModal" title="del">
                <p slot="header" style="color:#f60;text-align:center">
                    <i-icon type="ios-information-circle"></i-icon>
                    <span>Delete confirmation</span>
                </p>
                <div style="text-align:center">
                    <p>confirm delete?</p>
                    <p>The operation delete record from the database</p>
                </div>
                <div slot="footer">
                    <i-row type="flex" justify="end">
                        <i-col span="12">
                            <i-button type="info" size="large" long @click="deleteModal = false;deleteModalData = {}">Cancel</i-button>
                        </i-col>
                        <i-col span="4">
                            <i-button type="error" size="large" @click="invokeConfirmDelete(deleteModalData)" >Delete</i-button>
                        </i-col>
                    </i-row>
                </div>
            </i-modal>

            <i-modal v-model="batchDeleteModal" title="del">
                <p slot="header" style="color:#f60;text-align:center">
                    <i-icon type="ios-information-circle"></i-icon>
                    <span>Batch Delete confirmation</span>
                </p>
                <div style="text-align:center">
                    <p>confirm delete?</p>
                    <p v-for="(value, name) in batchDeleteModalData">{{value}}</p>
                    <p>The operation deletes records from the database</p>
                </div>
                <div slot="footer">
                    <i-row type="flex" justify="end">
                        <i-col span="12">
                            <i-button type="info" size="large" long @click="batchDeleteModal = false;batchDeleteModalData = {}">取消</i-button>
                        </i-col>
                        <i-col span="4">
                            <i-button type="error" size="large" @click="invokeConfirmBatchDelete()" >删除</i-button>
                        </i-col>
                    </i-row>
                </div>
            </i-modal>
        </i-content>
    </div>
</template>
<script type="text/javascript">
    module.exports = {
        data: function() {
            return {
                main_data: [],
                pageTotal:0,
                pageSize:0,
                viewModal:false,
                viewModalData:{},
                deleteModal:false,
                deleteModalData: {},
                batchDeleteModal:false,
                batchDeleteModalData:[],
                col_list: [
                    {type:'selection',width:60,align:'center'},
                                        {title:'id', key:'id'},
                    {title:'label_name', key:'label_name'},
                    {title:'deleted_at', key:'deleted_at'},
                    {title:'created_at', key:'created_at'},
                    {title:'updated_at', key:'updated_at'},

                    {title:'operate', slot:'detail_button', width: 250}
                ],
                routePage:this.page ?this.page : '',
                search_fields: [
                                    'id',
                    'label_name',
                    'deleted_at',
                    'created_at',
                    'updated_at',

                ]
            }
        },
        props: ['page'],
        methods: {
            tableData: function() {
                var pageStr = this.routePage ? '?page='+this.routePage : '';

                var search_list = {};
                for(var i in this.search_fields) {
                    if(this.search_fields[i]) {
                        search_list[i] = this.search_fields[i]
                    }
                }

                this.axios
                    .post('/api/labelss/list'+pageStr,JSON.stringify(search_list))
                    .then(response=>{
                        this.main_data = response.data.data.data,
                        this.pageTotal = response.data.data.total,
                        this.pageSize = response.data.data.per_page
                    })
            },
            invokeChangePage: function(page) {
                this.$router.push({query:{page:page}})
            },
            invokeSearch: function() {
                this.routePage = 1;
                this.tableData();
            },
            invokeDetail: function(row) {
                // console.info(this.$route)
                this.$router.push({path:'/labelss/detail',query:{id:row.id}})
            },
            invokeEdit: function(row) {
                this.$router.push({path:'/labelss/edit',query:{id:row.id}})
            },
            invokeCreate: function() {
                this.$router.push({path:'/labelss/create'})
            },
            invokeDelete: function(row) {
                // modal
                this.deleteModal=true
                this.deleteModalData = row
            },
            invokeConfirmDelete: function(row) {
                this.axios
                    .post('/api/labelss/delete',JSON.stringify({'id':row.id}))
                    .then(response=>{
                        this.deleteModal = false
                        this.deleteModalData = {}
                        this.tableData()
                    })
            },
            invokeView:function(row) {
                this.viewModal = true
                this.viewModalData = row
            },
            invokeBatchDelete: function() {
                if(this.batchDeleteModalData.length == 0) {
                    alert('Please select items first!');
                    return;
                }
                this.batchDeleteModal=true
            },
            invokeConfirmBatchDelete: function() {
                this.axios
                    .post('/api/labelss/batch_delete',JSON.stringify({'ids':this.batchDeleteModalData}))
                    .then(response=>{
                        this.batchDeleteModal = false
                        this.batchDeleteModalData = {}
                        this.tableData()
                    })
            },
            table_selection_change(rows) {
                this.batchDeleteModalData = []

                for (var i in rows) {
                    this.batchDeleteModalData.push(rows[i].id)
                }
            }
        },
        created: function() {
            this.tableData();
        },
        beforeRouteUpdate: function(to, from ,next) {
            this.routePage = to.query.page
            this.tableData();
            next()
        }
    }
</script>
