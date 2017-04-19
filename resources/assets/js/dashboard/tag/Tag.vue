<template>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Media Gallery <small> gallery design </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
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
                                            <a href="javascript:;" @click="showModal=true"><i class="fa fa-pencil"></i></a>
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

                    <Modal v-if="showModal" @close="showModal=false" @submit="submit()">

                        <h3 slot="header">编辑分类</h3>

                    </Modal>


                </div>
            </div>
        </div>
    </div>
</template>

<script>


    import Modal from '../../components/Modal.vue'

    export default {
        data () {
            return {
                tags:[],
                showModal: false
            }
        },
        components: {Modal},
        methods: {
            fetchTags () {
                axios.get('/tags').then(response => {
                    console.log(response)
                    this.tags = response.data.data
                }).catch(error => {

                })
            }
        },
        mounted () {
            this.fetchTags()
        }
    }

</script>