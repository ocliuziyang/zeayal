<template>

    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/dashboard" class="site_title"><i class="fa fa-paw"></i> <span>后台管理</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img :src="user.avatar" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ user.name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <Sidebar></Sidebar>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <Navbar :user="user"></Navbar>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <router-view></router-view>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

</template>

<script>
    import Navbar from './dashboard/layouts/Navbar.vue'
    import Sidebar from './dashboard/layouts/Sidebar.vue'
    export default {
        data () {

            return {
                user: {}
            }
        },
        computed: {
            count () {
                return this.$store.state.count
            }
        },
        methods: {
            increments() {

                this.$store.commit('increment')
            },
            cut () {
                this.$store.commit('cut')
            },

            fetchAdminInfo() {
                axios.get('users/adminInfo').then(response => {
                    this.user = response.data
                }).catch(error => {
                    console.log(error)
                })
            }
        },
        components: {Navbar, Sidebar},

        mounted () {
            this.fetchAdminInfo()
        }

    }
</script>