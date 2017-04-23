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
                    <h2>分类管理 <small> 分类管理 </small></h2>

                    <button class="btn btn-primary pull-right" @click="showStoreModal=true">新建分类</button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="row">

                        <p>顶级分类和各级分类都在下面目录中</p>

                        <div class="col-md-55" v-for="tag in tags">
                            <div class="thumbnail">
                                <div class="image view view-first">
                                    <img style="width: 100%; display: block;" :src="tag.thumbnail" alt="image" />
                                    <div class="mask">
                                        <p>{{ tag.name }}</p>
                                        <div class="tools tools-bottom">
                                            <a href="#"><i class="fa fa-link"></i></a>
                                            <a href="javascript:;" @click="showEditTagModal(tag.id)"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:;" @click="deleteTag(tag.id)"><i class="fa fa-times"></i></a>
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
                    <modal v-if="showModal" @close="showModal=false">

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
                                <label>名称</label><span>*</span>
                                <input type="text" placeholder="输入名称" class="form-control" v-model="tag.name" required>
                            </div>

                            <div  class="form-group">
                                <label>注释</label>
                                <input type="text" placeholder="输入注释" class="form-control" v-model="tag.description">
                            </div>

                            <div class="form-group">
                                <label class="control-label">缩略图</label>
                                <div class="file-upload">
                                    <img :src="tag.thumbnail" alt="缩略图">
                                    <vue-file-upload url="/api/v1/uploadFile" @uploadStart="uploadStart" @uploaded="uploaded" @uploadFailed="uploadFailed"></vue-file-upload>
                                </div>
                            </div>
                        </form>

                        <div slot="footer">

                            <button class="btn btn-default pull-left" @click="showModal=false">取消</button>
                            <button class="btn btn-primary" @click="editTag()">确定</button>
                        </div>

                    </modal>
                    <!-- 编辑分类模态框./-->

                    <!-- 新建分类模态框 -->
                    <modal v-if="showStoreModal" @close="showStoreModal=false">

                        <h3 slot="header">新建分类</h3>

                        <form slot="body" class="form">

                            <div  class="form-group">
                                <label>父级分类</label>
                                <select v-model="tag.fid">
                                    <option value="0">顶级分类</option>
                                    <option v-for="option in tags" :value="option.id" v-if="option.fid==0">&nbsp;&nbsp;&nbsp;{{ option.name }}</option>
                                </select>
                            </div>

                            <div  class="form-group">
                                <label>名称</label><span> *</span>
                                <input type="text" placeholder="输入名称" class="form-control" v-model="tag.name" required>
                            </div>

                            <div  class="form-group">
                                <label>注释</label>
                                <input type="text" placeholder="输入注释" class="form-control" v-model="tag.description">
                            </div>

                            <div class="form-group">
                                <label class="control-label">缩略图</label>
                                <div class="file-upload">
                                    <img :src="tag.thumbnail" alt="缩略图">
                                    <vue-file-upload url="/api/v1/uploadFile" @uploadStart="uploadStart" @uploaded="uploaded" @uploadFailed="uploadFailed"></vue-file-upload>
                                </div>
                            </div>
                        </form>

                        <div slot="footer">
                            <button class="btn btn-default pull-left" @click="showStoreModal=false">取消</button>
                            <button class="btn btn-primary" @click="storeTag()">确定</button>
                        </div>

                    </modal>
                    <!-- 新建分类模态框./ -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>


    import Modal from '../../components/Modal.vue'
    import { show_stack_custom } from '../../vendor/notify'
    import VueFileUpload from '../../components/VueFileUpload.vue'
    import NProgress from 'nprogress'
    import swal from 'sweetalert2'

    export default {
        data () {
            return {
                tags:[],
                showModal: false,
                showStoreModal: false,
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
        watch: {
            // 利用监听showStoreModal 状态监听当打开模态框时，清空tag数据
            showStoreModal: function () {
                this.tag = {
                    fid: 0,
                    thumbnail: '/images/tag_default.gif'
                }
            }
        },
        methods: {

            fetchTags () {
                axios.get('/tags').then(response => {
                    this.tags = response.data.data
                })
            },

            showEditTagModal (id) {
                this.fetchTags()
                axios.get('tags/'+id+'/edit').then(response => {
                    this.tag = response.data
                    this.showModal = true
                })
            },

            // 创建分类
            storeTag () {
                let self = this
                  axios.post('tags', {
                      tag: this.tag
                  }).then(response => {

                      if (response.data.status === 1) {
                          self.fetchTags()
                          self.showStoreModal = false
                          show_stack_custom('success', response.data.message)
                      } else if (response.data.status === 0){
                          show_stack_custom('error', response.data.message)
                      } else if (response.data.status === -1) {

                          response.data.errors.forEach((error) => {
                              show_stack_custom('notify', error)
                          })
                      }
                  })
            },

            // 编辑 分类
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

            // 删除 tag 分类
            deleteTag (id) {
                let self = this
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function () {

                    axios.delete('tags/'+id).then(response => {

                        if (response.data.status === 1) {
                            swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            show_stack_custom('success', response.data.message)
                            self.fetchTags()
                        } else  {
                            show_stack_custom('notice', response.data.message)
                        }
                    })

                })

            },

            // 文件上传
            uploadStart () {
                NProgress.start()
            },

            uploaded (data) {
                if(data.status === 1) {
                    this.tag.thumbnail = data.message + '?imageView2/0/w/350'
                    show_stack_custom('success', '上传成功')
                } else  {
                    show_stack_custom('error', data.message)
                }
                NProgress.done()
            },

            uploadFailed (error) {
                if (error.status === 500) {
                    show_stack_custom('error', '上传图片应该小于10M')
                } else  {
                    show_stack_custom('error', '上传失败')
                }
                NProgress.done()
            }

        },
        mounted () {
            this.fetchTags()
        }
    }

</script>