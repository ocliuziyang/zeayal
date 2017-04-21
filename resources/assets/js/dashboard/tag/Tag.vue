<style scoped>

    .file-upload img {
        max-width: 30%;
        height: auto;
        margin-bottom: 15px;
    }

</style>
<template>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Media Gallery <small> gallery design </small></h2>


                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="row">

                        <p>Media gallery design emelents</p>

                        <div class="col-md-55" v-for="tag in tags">
                            <div class="thumbnail">
                                <div class="image view view-first">
                                    <img style="width: 100%; display: block;" :src="tag.thumbnail" alt="image" />
                                    <div class="mask">
                                        <p>{{ tag.name }}</p>
                                        <div class="tools tools-bottom">
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="javascript:;" @click="showEditTagModal(tag.id)"><i class="fa fa-pencil"></i></a>
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="caption">
                                    <p>{{ tag.description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--编辑分类模态框-->
                    <modal v-if="showModal" @close="showModal=false" modal-style='modal-md'>

                        <h3 slot="header">编辑分类</h3>

                        <form slot="body" class="form">

                            <div  class="form-group">
                                <label>父级分类</label>
                                <select v-model="tag.fid">
                                    <option value="0">顶级分类</option>
                                    <option v-for="option in tags" :value="option.id" v-if="option.fid==0 && option.id != tag.id">&nbsp;&nbsp;&nbsp;{{ option.name }}</option>
                                </select>
                            </div>

                            <div  class="form-group">
                                <label>名称</label>
                                <input type="text" placeholder="输入名称" class="form-control" v-model="tag.name">
                            </div>

                            <div  class="form-group">
                                <label>注释</label>
                                <input type="text" placeholder="输入注释" class="form-control" v-model="tag.description">
                            </div>

                            <div class="form-group">
                                <label class="control-label">缩略图</label>
                                <div class="file-upload">
                                    <img :src="tag.thumbnail" alt="缩略图">
                                    <vue-file-upload url="/api/v1/uploadFile" @uploaded="uploaded"></vue-file-upload>
                                </div>
                            </div>
                        </form>

                        <div slot="footer">

                            <button class="btn btn-default pull-left" @click="showModal=false">取消</button>
                            <button class="btn btn-primary" @click="editTag()">确定</button>
                        </div>

                    </modal>
                    <!-- 编辑分类模态框./-->


                </div>
            </div>
        </div>
    </div>
</template>

<script>


    import Modal from '../../components/Modal.vue'
    import { show_stack_custom } from '../../vendor/notify'
    import VueFileUpload from '../../components/VueFileUpload.vue'

    export default {
        data () {
            return {
                tags:[],
                showModal: false,
                tag: {},
                csrf: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
        },
        components: {
            'modal': Modal,
            'vue-file-upload': VueFileUpload
        },
        methods: {
            fetchTags () {
                axios.get('/tags').then(response => {
                    this.tags = response.data.data
                })
            },

            showEditTagModal(id) {
                this.fetchTags()
                axios.get('tags/'+id+'/edit').then(response => {
                    this.tag = response.data
                    this.showModal = true
                })
            },

            editTag () {

                axios.post('tags/'+this.tag.id, {
                    _method: 'put',
                    tag: this.tag
                }).then(response => {
                    if (response.data.status === 1) {
                        this.fetchTags()
                        show_stack_custom('success', '更新分类')
                    } else {
                        show_stack_custom('error')
                    }
                    this.showModal = false
                })
            },

            uploaded(data) {
                if(data.status === 1) {
                    this.tag.thumbnail = data.message
                } else  {
                    show_stack_custom('error', data.message)
                }

            }

        },
        mounted () {
            this.fetchTags()
        }
    }

</script>